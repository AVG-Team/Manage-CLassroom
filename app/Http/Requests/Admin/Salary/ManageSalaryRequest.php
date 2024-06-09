<?php

namespace App\Http\Requests\Admin\Salary;

use Illuminate\Foundation\Http\FormRequest;

class ManageSalaryRequest extends FormRequest
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
            'page' => ["nullable", "integer"],
            'per_page' => ["nullable", "integer"],
            'search' => ["nullable", "string"],
            'status' => ["nullable", "in:0,1,2"],
            'month' => ["nullable", "integer"],
            'year' => ["nullable", "integer"],
        ];
    }
}
