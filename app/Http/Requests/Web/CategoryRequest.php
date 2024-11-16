<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'min:1|max:64',
        ];
    }

    // Кастомные сообщения об ошибках валидации
    public function messages(): array
    {
        return [
            'name.min' => 'Название категории не должно быть пустым',
            'name.max' => 'Название категории не должно превышать 64 символа',
        ];
    }
}
