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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'required|string',
            'name' => 'required|string',
            'second_name' => 'required|string',
            'maiden_name' => 'string|nullable',
            'birthday_at' => 'required|date_format:Y-m-d',
            'room' => 'int',
            'email' => 'required|string',
            'password' => 'required|string|min:8|max:255'
        ];
    }
}
