<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'name' => 'required',
            'tel' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => '登録しているお名前を入力してください。',
            'tel.required'  => '登録している電話番号を入力してください。',
        ];
    }
}
