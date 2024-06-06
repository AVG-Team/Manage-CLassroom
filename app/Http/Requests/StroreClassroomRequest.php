<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroreClassroomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        const RULES = 'required|string|max:255';
        return [
            'title' => self::RULES,
            'description' => self::RULES,
            'code_classroom' => self::RULES,
            'image_path' => self::RULES,
            'status' => self::RULES,
            'price' => 'required|integer',
            'category_id' => 'required|integer',
        ];
    }
}
