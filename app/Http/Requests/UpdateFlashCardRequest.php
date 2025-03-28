<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFlashCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question'      => ['sometimes', 'string', 'max:500'], 
            'answer'        => ['sometimes', 'string', 'max:1000'],
            'category_id'   => ['sometimes', 'nullable', 'integer', 'exists:categories,id'],
            'difficulty'    => ['sometimes', 'in:easy,medium,hard'], 
            'hint'          => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }
}
