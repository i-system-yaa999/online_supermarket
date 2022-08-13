<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'user_id' => 'required',
            'order_id' => 'required|unique:deliveries,order_id,' . $this->input('order_id') . ',id',
            'date' => 'required',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ユーザーは必須項目です。',
            'order_id.required' => 'オーダー番号は必須項目です。',
            'order_id.unique' => 'すでに登録されています。',
            'date.required' => '日付は必須項目です。',
            'number.required' => '配達便番号は必須項目です。',
        ];
    }
}
