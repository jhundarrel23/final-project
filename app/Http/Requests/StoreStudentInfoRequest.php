<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can modify this logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_id' => 'required|string|max:255|unique:student_info,student_id,NULL,id,user_id,' . auth()->id(),
            'course_category_id' => 'required|exists:course_categories,id',
            'year_level' => 'nullable|in:1st year,2nd year,3rd year,4th year',
            'dob' => 'required|date',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'civil_status' => 'nullable|in:single,married,other',
            'first_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
        ];
    }
}
