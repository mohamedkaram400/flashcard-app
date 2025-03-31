<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlashCardRequest extends FormRequest
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
            'question'      => ['required', 'string', 'max:500'],
            'answer'        => ['required', 'string', 'max:1000'],
            'category_id'   => ['required', 'integer', 'exists:categories,id'],
            'difficulty'    => ['required', 'in:easy,medium,hard'], 
            'hint'          => ['nullable', 'string', 'max:255'],
            'tagIds'        => ['nullable', 'array'],
            'tagIds.*'      => ['nullable', 'exists:tags,id'],
        ];
    }
}
