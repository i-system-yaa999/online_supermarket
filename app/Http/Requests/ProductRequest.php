<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // 'product_name' => 'required|max:191|unique:products,name,' . $this->input('product_id') . ',id',
            'product_name' => 'required|max:191',
            'product_area_id' => 'required',
            'product_genre_id' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_image_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => '名前は必須項目です。',
            'product_name.max' => '最大191文字です。',
            'product_name.unique' => 'この名前はすでに登録されています。',
            'product_area_id.required' => '産地を選択してください。',
            'product_genre_id.required' => '売り場を選択してください。',
            'product_price.required' => '価格は必須項目です。',
            'product_description.required' => '説明文は必須項目です。',
            'product_image_id.required' => '画像は必須項目です。',
        ];
    }
}
