<?php

namespace App\Http\Requests\Managenment\Business\Contract;

use Illuminate\Foundation\Http\FormRequest;

class BusinessContractItemUpdateRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:20|max:255',
            'unit_id' => 'required|exists:configuration_measurement_units,id',
            'supplier_id' => 'required|exists:business_contract_suppliers,id',
            'unit_price' => 'required|numeric|min:0.01',
            'financialBlock.*' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'financialBlock.*.required' => 'O valor é obrigatório.',
            'financialBlock.*.min' => 'O valor deve ser maior que 0.',
        ];
    }
}
