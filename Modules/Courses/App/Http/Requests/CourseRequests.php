<?php

namespace Modules\Courses\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequests extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'tags' => 'required',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric',
            'description' => 'required',
            // 'video' => 'required|mimes:mp4,avi,mkv',
            'video' => 'required',
            'status' => 'required',
            'skills' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống!',
            'image.required' => 'Hình ảnh không được để trống!',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpg, jpeg, png.',
            'tags.required' => 'Tags không được để trống!',
            'duration.required' => 'Thời gian học không được để trống!',
            'duration.numeric' => 'Thời gian học phải là một số!',
            'price.required' => 'Giá không được để trống!',
            'price.numeric' => 'Giá phải là một số!',
            'price.min' => 'Giá không được nhỏ hơn 0!',
            'description.required' => 'Mô tả không được để trống!',
            'video.required' => 'Video không được để trống!',
            // 'video.mimes' => 'Video phải có định dạng: mp4, avi, mkv.',
            'status.required' => 'Trạng thái không được để trống!',
            'skills.required' => 'Kỹ năng không được để trống!',
        ];
    }
}
