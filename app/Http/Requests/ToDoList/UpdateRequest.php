<?php

namespace App\Http\Requests\ToDoList;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'content' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны быть строкового типа',
        ];
    }
}
