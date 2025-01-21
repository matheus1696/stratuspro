<?php

namespace App\Http\Requests\Configuration\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyEstablishmentStoreRequest extends FormRequest
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
            'code' => 'required|min:6|unique:company_establishments',
            'title' => 'required|unique:company_establishments',
            'address' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'financial_block_id' => 'required',
        ];
    }
}
