<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|unique:tasks,name',
            'status_id' => 'required|integer',
            'description' => 'nullable|string',
            'created_by_id' => 'integer',
            'assigned_to_id' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => ':attribute с таким именем уже существует',
            'status_id.required' => 'Это обязательное поле',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Задача',
        ];
    }
}
