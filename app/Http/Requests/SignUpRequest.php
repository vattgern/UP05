<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Вы не заполнили ваше ФИО',
            'name.string' => 'Заполните поле строкой',
            'email.required' => 'Вы не заполнили почту',
            'email.email' => 'Поле должно быть почтой (@, .com, .ru и т.д)',
            'email.unique' => 'Данная почта занята',
            'password.required' => 'Вы не заполнили пароль',
            'password.min' => 'Пароль должен быть не менее 8 символов',
            'password.confirmed' => 'Пароли должны совпадать'
        ];
    }
}
