<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'birth_date' => 'sometimes|date',
            'national_code' => 'sometimes|string|digits:10',
            'phone_number' => 'sometimes|string|digits:11|unique:users,phone_number,' . $this->id,
            'email' => 'sometimes|email|unique:users,email,' . $this->id,
            'gender' => 'sometimes|in:male,female',
        ];
    }
}
