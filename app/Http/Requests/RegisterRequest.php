<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ! Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', "string", "min:4", "max:32"],
            're_password' => ['required', 'same:password'],
        ];
    }

    public function messages(): array
    {
        return [
            "required" => "Bạn không được bỏ trống!",
            "email" => "Email không hợp lệ !",
            "string" => "Vui lòng nhập các kí tự hợp lệ !",
            "min:4" => "Yêu cầu lớn hơn 4 kí tự",
            "max:32" => "Yêu cầu nhỏ hơn 32 kí tự",
            "unique" => "Email đã tồn tại, vui lòng chọn email khác !",
            "same" => "Mật khẩu không khớp !",
        ];
    }
}
