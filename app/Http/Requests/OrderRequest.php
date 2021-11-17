<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'approval' => 'required',
            'offer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните имя',
            'phone.required' => 'Заполните номер телефона',
            'email.required' => 'Заполните email',
            'email.email' => 'Введите корректный адрес электронной почты',
            'approval.required' => 'Подтвердите согласие на обработку персональных данных',
            'offer.required' => 'Подтвердите согласие c Договором публичной оферты'
        ];
    }
}
