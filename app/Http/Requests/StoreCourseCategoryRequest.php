<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can implement authorization logic if needed.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_name' => 'required|string|max:255',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'course_name.required' => 'The course name is required.',
            'course_name.string' => 'The course name must be a valid string.',
            'course_name.max' => 'The course name must not exceed 255 characters.',
        ];
    }
}
