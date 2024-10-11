<?php

namespace Modules\Courses\App\Services;

use Modules\Courses\App\Models\Course;
use Illuminate\Support\Str;
class CourseService
{
    public function responseDesign($message)  {
        return [
            'status'=>200,
            'message'=>$message,
        ];
    }
    public function processImageOrVideo($file, $folder, $width, $height){
        $path =  cloudinary()->upload($file->getRealPath(), [
            'folder' => $folder,
            'resource_type' => 'auto',
            'transformation' => [
                'width' => $width,
                'height' => $height,
                'crop' => 'fill'
            ]
        ])->getSecurePath();
        return $path;
    }
    public function create($request)
    {
        try {
            $width = 400;
            $height = 400;

            $course = new Course();
            $video = $request->input('video');
            $imageFile = $request->file('image');
            $course->title = $request->input('title');
            $course->duration = $request->input('duration');
            $course->tags = $request->input('tags');
            $course->description = $request->input('description');
            $course->price = $request->input('price');
            $course->status = $request->input('status') == 'no' ? 0 : 1;
            $slug = Str::slug($request->input('title'));
            $course->slug = $slug;
            
            if (is_string($video)) {
                $course->video_url = $video;
            } elseif ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $compressedVideo =  $this->processImageOrVideo($videoFile,'images',$width,$height);

                $course->video_url = $compressedVideo;
            }
            $compressedImage = $this->processImageOrVideo($imageFile,'images',$width,$height);
            $course->image_url = $compressedImage;
            $course->save();
            $skillIds = $request->input('skills');
            $course->skills()->sync($skillIds);
            return $this->responseDesign('Course Added Successfully');
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
