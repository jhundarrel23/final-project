<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can add custom authorization logic if needed.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'       => 'required|string|email|max:255|unique:users', // Only require email
            'username'    => 'required|string|max:255|unique:users',  // If you use username as a required field
            'password'    => 'required|string|min:6|confirmed',  // Password is still required
            // Optional fields, remove or adjust as per your need:
            // 'first_name'  => 'nullable|string|max:255',
            // 'middle_name' => 'nullable|string|max:255',
            // 'last_name'   => 'nullable|string|max:255',
        ];
    }
}
