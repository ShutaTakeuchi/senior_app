<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content' => 'required|between:0,50'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '必ず入力してください。',
            'content.between' => '0〜50文字の間で入力してください。'
        ];
    }
}
