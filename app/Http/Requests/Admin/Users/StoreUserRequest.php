<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'integer', 'min:0', 'max:2'],
            'gender' => ['required', 'integer', 'min:0', 'max:1'],
            'phone' => ['required', 'string', 'max:11', 'min:8'],
            'address' => ['nullable', 'string', 'max:255'],
            'check_generate_password' => ['nullable', 'boolean'],
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
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Tên phải là chuỗi',
            'name.max' => 'Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.string' => 'Email phải là chuỗi',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'role.required' => 'Vai trò không được để trống',
            'role.integer' => 'Vai trò phải là số nguyên',
            'role.min' => 'Vai trò không được nhỏ hơn 0',
            'role.max' => 'Vai trò không được lớn hơn 2',
            'gender.required' => 'Giới tính không được để trống',
            'gender.integer' => 'Giới tính phải là số nguyên',
            'gender.min' => 'Giới tính không được nhỏ hơn 0',
            'gender.max' => 'Giới tính không được lớn hơn 1',
            'phone.string' => 'Số điện thoại phải là chuỗi',
            'phone.max' => 'Số điện thoại không được quá 11 ký tự',
            'phone.min' => 'Số điện thoại phải có ít nhất 8 ký tự',
            'address.string' => 'Địa chỉ phải là chuỗi',
            'address.max' => 'Địa chỉ không được quá 255 ký tự',
        ];
    }
}
