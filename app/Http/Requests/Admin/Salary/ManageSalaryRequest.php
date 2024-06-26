<?php

namespace App\Http\Requests\Admin\Salary;

use App\Rules\DefaultSalaryRule;
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
            'type' => ["nullable", "in:0,1"],
            'search' => ["nullable", "string"],
            'status' => ["nullable", "in:-1,0,1,2"],
            'month' => ["nullable", "integer", "min:-1", "max:12"],
            'year' => ["nullable", "integer", 'max:' . date('Y')],
            'default_salary' => ["nullable",  new DefaultSalaryRule()],
            'has_bonus' => ["nullable", "in:0,1,-1"],
        ];
    }
}
