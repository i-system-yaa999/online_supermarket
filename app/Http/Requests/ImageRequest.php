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
            'image_url' => 'required|max:191|unique:images,url,' . $this->input('image_id') . ',id',
        ];
    }

    public function messages()
    {
        return [
            'image_url.required' => '画像は必須項目です。',
            'image_url.max' => '最大191文字まで',
            'image_url.unique' => 'すでに登録されています。',
        ];
    }
}
