<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
            'email' => ["required", "email"],
            'password' => ["required", "string", "min:4", "max:50"],
            'remember' => ["nullable"],
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
        ];
    }
}
