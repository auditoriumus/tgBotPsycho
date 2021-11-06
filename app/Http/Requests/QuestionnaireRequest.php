<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireRequest extends FormRequest
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
            'name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'approval' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните имя',
            'last_name.required' => 'Заполните фамилию',
            'phone.required' => 'Заполните номер телефона',
            'email.required' => 'Заполните email',
            'email.email' => 'Введите корректный адрес электронной почты',
            'approval.required' => 'Подтвердите согласие на обработку персональных данных'
        ];
    }
}
