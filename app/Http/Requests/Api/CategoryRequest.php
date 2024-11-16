<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends ApiRequest
{
    // Правило авторизации
    public function authorize(): bool
    {
        return true;
    }

    // Правила валидации данных
    public function rules(): array
    {
        return [
            'name' => 'required|max:64',
        ];
    }

    // Кастомные сообщения об ошибках валидации
    public function messages(): array
    {
        return [

            'name.required' => 'Название категории не должно быть пустым',
            'name.max' => 'Название категории не должно превышать 64 символа',
        ];
    }
}
