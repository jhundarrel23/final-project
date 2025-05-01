<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'    => 'required_without:username|email', // Only required if username is not provided
            'username' => 'required_without:email|string|max:255', // Only required if email is not provided
            'password' => 'required',
        ];
    }
}
