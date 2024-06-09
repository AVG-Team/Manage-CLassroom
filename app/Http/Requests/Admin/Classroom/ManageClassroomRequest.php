<?php

namespace App\Http\Requests\Admin\Classroom;

use Illuminate\Foundation\Http\FormRequest;

class ManageClassroomRequest extends FormRequest
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
            'per_page' => ['nullable', 'integer', 'min:1'],
            'status' => ['nullable', 'integer', 'min:-1'],
            'search_type' => ['nullable', 'integer', 'in:-1,0,1,2'],
            'search' => ['nullable', 'string'],
            'grade' => ['nullable', 'integer', 'min:-1', 'max:12'],
            'subject' => ['nullable', 'integer', 'min:-1'],
        ];
    }
}
