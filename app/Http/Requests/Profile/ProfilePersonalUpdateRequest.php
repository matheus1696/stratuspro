<?php

namespace App\Http\Requests\Profile;

use App\Rules\ProfileRequestBirthdayDateFormat;
use Illuminate\Foundation\Http\FormRequest;

class ProfilePersonalUpdateRequest extends FormRequest
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
            'name' => 'nullable|min:1|max:50',
            'cpf' => 'nullable|cpf|formato_cpf',
            'registration' => 'nullable|min:9|max:10',
            'birthday' => ['nullable', 'date', new ProfileRequestBirthdayDateFormat],
            'contact_1' => 'nullable|celular_com_ddd',
            'contact_2' => 'nullable|celular_com_ddd',
        ];
    }
}
