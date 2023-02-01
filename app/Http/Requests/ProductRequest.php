<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'description' => 'required',
            'price' => 'required|numeric'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Название товара обезательна для заполнения',
            'name.string' => 'Название товара должно быть строкой',
            'description.required' => 'Описание обезательна для заполнения',
            'price.required' => 'Цена товара обезательна для заполнения',
            'price.numeric'=> 'Цена товара должна быть числовым значением'
        ];
    }
}
