<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'name.required' => '必ずご記入ください。',
            'email.required'  => '必ずご記入ください。',
            'password.required'  => '必ずご記入ください。',
            'password.min'  => '８文字以上で入力してください。',
        ];
    }
}
