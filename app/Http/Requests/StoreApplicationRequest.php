<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Set to true unless using policies
    }

    public function rules(): array
    {
        return [
            'student_info_id' => 'required|exists:student_info,id',
            'monthly_income' => 'nullable|numeric',
            'address' => 'required|string|max:255',
            'school_year' => 'nullable|string|max:100',
            'remarks' => 'nullable|string',

            'guardians' => 'required|array|min:1',
            'guardians.*.relation' => 'required|in:father,mother,guardian',
            'guardians.*.given_name' => 'required|string',
            'guardians.*.middle_name' => 'nullable|string',
            'guardians.*.family_name' => 'required|string',
            'guardians.*.occupation' => 'nullable|string',
        ];
    }
}
    