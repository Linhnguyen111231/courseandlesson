<?php

namespace Modules\Skills\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequests extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'skill_name'=>'required'
        ];
    }
    public function messages() {
        return [
            'skill_name.required' => 'Mật khẩu không được để trống!',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
