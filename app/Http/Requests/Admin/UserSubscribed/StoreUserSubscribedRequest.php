<?php

namespace App\Http\Requests\Admin\UserSubscribed;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserSubscribedRequest extends FormRequest
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
            'user_id' => 'required|exists:users,uuid',
            'code_classroom' => 'required|exists:classrooms,code_classroom',
            'note' => 'nullable|string|max:255',
            'status' => 'nullable|in:0,1,2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'Vui lòng nhập ID người dùng',
            'user_id.exists' => 'ID người dùng không tồn tại',
            'code_classroom.required' => 'Vui lòng nhập mã lớp học',
            'code_classroom.exists' => 'Mã lớp học không tồn tại',
            'note.string' => 'Ghi chú phải là một chuỗi',
            'note.max' => 'Ghi chú không được vượt quá 255 ký tự',
            'status.in' => 'Trạng thái không hợp lệ',
        ];
    }
}
