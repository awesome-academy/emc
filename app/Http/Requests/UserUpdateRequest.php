<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'string|max:255',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'birthdate' => 'nullable|date|before:' . date('d-m-Y'),
            'address' => 'max:100',
            'phone' => 'numeric|regex:/^([0-9]*)$/|min:9',
        ];
    }
}
