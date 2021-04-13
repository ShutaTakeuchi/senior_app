<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherContactRequest extends FormRequest
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
            'content' => 'max:255'
        ];
    }

    public function messages() {
        return [
            'content.max' => '255文字以内でご記入ください。',
        ];
    }
}
