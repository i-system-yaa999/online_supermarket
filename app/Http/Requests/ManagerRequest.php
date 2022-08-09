<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Manager;

class ManagerRequest extends FormRequest
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
            'user_id' => 'required|unique:managers,user_id',
            'genre_id' => 'required|unique:managers,genre_id',
            // uniqueを使用する場合は下記に置き換える
            // input()が取得できない
            // 'user_id' => 'required|unique:managers,user_id,' . $this->manager_id . ',id',
            // 'user_id' => ['required', Rule::unique(Manager::class)->ignore($this->manager_id)],
            // 'user_id' => ['required', Rule::unique('managers')->ignore($this->manager_id)],
            // 'genre_id' => 'required|unique:managers,genre_id,' . $this->input('manager_id') . ',id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => '担当者を選択してください。',
            'user_id.unique' => 'この担当者は、すでに登録されています。',
            'genre_id.required' => '売り場を選択してください。',
            'genre_id.unique' => 'この売り場には担当者が登録されています。',
        ];
    }
}
