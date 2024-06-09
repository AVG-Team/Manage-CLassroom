<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string','max:255'],
            'description' => ['required', 'string'],
            'name_file_upload' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'char', 'max:36'],
            'classroom_id' => ['required', 'integer', 'max:20'],
        ];
    }
}
