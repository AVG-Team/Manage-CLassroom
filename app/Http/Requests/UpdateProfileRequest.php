<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if ($this->birthday) {
            // Chuyển đổi từ dd/mm/YYYY sang YYYY-mm-dd
            $birthday = \DateTime::createFromFormat('d/m/Y', $this->birthday);
            if ($birthday) {
                $this->merge([
                    'birthday' => $birthday->format('Y-m-d'),
                ]);
            }
        }
    }

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
        return [
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'before:today'],
            'phone' => ['required', 'string', 'max:12', 'min:8'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['required', 'boolean'],
            'password' => ['nullable', "string", "min:4", "max:32"],
            'old_password' => ['nullable', "different:password"],
            're_password' => ['required_with:password', 'same:password'],
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
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not be greater than 255 characters',
            'birthday.required' => 'Birthday is required',
            'birthday.date' => 'Birthday must be a date',
            'phone.required' => 'Phone is required',
            'phone.string' => 'Phone must be a string',
            'phone.max' => 'Phone must not be greater than 12 characters',
            'phone.min' => 'Phone must not be less than 8 characters',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must not be greater than 255 characters',
        ];
    }
}
