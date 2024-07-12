<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStatusRequest extends FormRequest
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
            'name' => 'required|max:255',
        ];

        // Kiểm tra nếu có $id được truyền vào từ route
        if ($this->route()->hasParameter('id')) {
            $id = $this->route('id');
            // Thêm quy tắc unique nếu $id tồn tại
            $rules['name'] .= '|unique:task_status,name,' . $id;
        } else {
            // Quy tắc unique mà không có $id (thêm mới)
            $rules['name'] .= '|unique:task_status,name';
        }

        return $rules;
    }
}
