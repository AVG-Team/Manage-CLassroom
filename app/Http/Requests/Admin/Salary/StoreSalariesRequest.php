<?php

namespace App\Http\Requests\Admin\Salary;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalariesRequest extends FormRequest
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
            'teacher_id' => 'required|exists:users,uuid',
            'default_salary_id' => 'required|exists:default_salary,id',
            'bonus' => 'nullable|numeric',
            'payday' => 'nullable|date_format:d/m/Y',
            'note' => 'nullable|string',
            'status' => 'nullable|in:0,1,2',
        ];
    }

    public function messages(): array
    {
        return [
            'teacher_id.required' => 'Mã giáo viên là bắt buộc.',
            'teacher_id.exists' => 'Mã giáo viên đã chọn không hợp lệ.',
            'default_salary_id.required' => 'Lương là bắt buộc.',
            'default_salary_id.exists' => 'Lương cơ bản đã chọn không hợp lệ.',
            'bonus.numeric' => 'Thưởng phải là một số.',
            'payday.date_format' => 'Ngày lương không khớp với định dạng d/m/Y.',
            'note.string' => 'Ghi chú phải là một chuỗi.',
            'status.in' => 'Trạng thái đã chọn không hợp lệ.',
        ];
    }
}
