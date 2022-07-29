<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'imae_url' => 'required|max:191',
        ];
    }

    public function messages()
    {
        return [
            'imae_url.required' => '必須項目です。',
            'imae_url.max' => '最大191文字まで',
            'imae_url.unique' => 'すでに登録されています。',
        ];
    }
}
