<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:99',
            'category_id' => 'required|exists:categories,id',
            'photos.*' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:4096',
        ];
    }
}
