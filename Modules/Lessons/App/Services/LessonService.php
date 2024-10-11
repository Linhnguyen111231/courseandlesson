<?php

namespace Modules\Lessons\App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Lessons\App\Models\Lesson;

class LessonService
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

            $lesson = new Lesson();
            $video = $request->input('video');
            $imageFile = $request->file('image');
            
            $lesson->title = $request->input('title');
            $lesson->description = $request->input('description');
            $lesson->course_id = $request->input('course_id');
            $slug = Str::slug($request->input('title'));
            $lesson->slug = $slug;

            
            //neu co duration thi luu k thi phai phan nhanh video
            if (is_string($video)) {
                $lesson->video_url = $video;
                $apiKey = env('YOUTUBE_API_KEY');
                $videoId = Str::after($video, 'embed/');
                $url = "https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$videoId&key=$apiKey";
                $response = Http::get($url);
                if ($response->successful()) {
                    $contentDetails = $response->json()['items'][0]['contentDetails'];
                    $duration = $contentDetails['duration'];
                    $formattedDuration = $this->convertIsoDuration($duration);
        
                   $lesson->duration = $formattedDuration;
                }
            } elseif ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $compressedVideo =  $this->processImageOrVideo($videoFile,'images',$width,$height);
                // $path = $request->file('video')->store('videos');
                // $lesson->duration = $this->getDuration($path);
                $lesson->duration = $request->input('duration');

                $lesson->video_url = $compressedVideo;
            }
            $compressedImage = $this->processImageOrVideo($imageFile,'images',$width,$height);
            $lesson->image_url = $compressedImage;
            $lesson->save();
            return $this->responseDesign('Lesson Added Successfully');
        } catch (\Throwable $th) {
            return $th;
        }
    }
    private function convertIsoDuration($isoDuration)
    {
        $interval = new \DateInterval($isoDuration);

        $hours = $interval->h;
        $minutes = $interval->i;
        $seconds = $interval->s;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
