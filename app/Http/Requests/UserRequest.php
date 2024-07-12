<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
            'role_id' => 'required|integer|exists:role,id',
            'status' => 'required|integer',
        ];

        // Kiểm tra xem route có chứa tham số id không
        if ($this->route()->hasParameter('id')) {
            $id = $this->route('id');
            // Thêm quy tắc unique nếu $id tồn tại
            $rules['email'] .= ',' . $id;
        }

        return $rules;
    }
}
