<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'product_id' => 'required',
            'evaluation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => '商品を選択してください。',
            'evaluation.required' => '評価数は必須項目です。',
        ];
    }
}
