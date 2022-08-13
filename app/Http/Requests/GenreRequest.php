<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'genre_name' => 'required|max:20|unique:genres,name,' . $this->input('genre_id') . ',id',
        ];
    }

    public function messages()
    {
        return [
            'genre_name.required' => '必須項目です。',
            'genre_name.max' => '最大20文字まで',
            'genre_name.unique' => 'すでに登録されています。',
        ];
    }
}
