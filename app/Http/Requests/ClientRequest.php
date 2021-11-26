<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'zip' => 'required|min:8|max:8',
            'opinion' => 'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => '必須項目です',
            'last_name.required' => '必須項目です',
            'email.required' => '必須項目です',
            'email.email' => 'メールアドレスの形式で入力してください',
            'address.required' => '必須項目です',
            'zip.required' => '必須項目です',
            'zip.min' => '「-(ハイフン)」込みの半角数字8文字で入力してください',
            'zip.max' => '「-(ハイフン)」込みの半角数字8文字で入力してください',
            'opinion.required' => '必須項目です',
            'opinion.max' => '120文字までしか入力できません',
        ];
    }
}
