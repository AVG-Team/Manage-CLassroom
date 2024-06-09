<?php

namespace App\Http\Requests\Admin\Classroom;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'grade' => ['required', 'integer', 'min:1', 'max:12'],
            'subject_id' => ['required', 'integer', 'min:1'],
            'teacher_id' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'capacity' => ['required', 'integer', 'min:1'],
            'price' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là một chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là một chuỗi ký tự.',
            'grade.required' => 'Khối lớp là bắt buộc.',
            'grade.integer' => 'Khối lớp phải là một số nguyên.',
            'grade.min' => 'Khối lớp phải lớn hơn hoặc bằng 1.',
            'grade.max' => 'Khối lớp phải nhỏ hơn hoặc bằng 12.',
            'subject_id.required' => 'Mã môn học là bắt buộc.',
            'subject_id.integer' => 'Mã môn học phải là một số nguyên.',
            'subject_id.min' => 'Mã môn học phải lớn hơn hoặc bằng 1.',
            'teacher_id.required' => 'Mã giáo viên là bắt buộc.',
            'teacher_id.string' => 'Mã giáo viên phải là một chuỗi ký tự.',
            'image.image' => 'Hình ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các định dạng sau: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 5120KB.',
            'capacity.required' => 'Sức chứa là bắt buộc.',
            'capacity.integer' => 'Sức chứa phải là một số nguyên.',
            'capacity.min' => 'Sức chứa phải lớn hơn hoặc bằng 1.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn hoặc bằng 0.',
        ];
    }
}
