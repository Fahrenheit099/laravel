<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'             => 'required|max:20',
            'email'            => 'email:rfc,dns|unique:App\Models\User,email|required',
            'password'         => 'required|min:8|max:20|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:8|max:20',
        ];
    }
}
