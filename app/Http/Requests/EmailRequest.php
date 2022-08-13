<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_name' => 'required',
            'user_email' => 'required',
            'mail_title' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'user_name.required' => '宛名は必須項目です。',
            'user_email.required' => '宛先は必須項目です。',
            'mail_title.required' => 'タイトルは必須項目です。',
        ];
    }
}
