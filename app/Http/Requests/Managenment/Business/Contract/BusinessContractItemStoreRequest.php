<?php

namespace App\Http\Requests\Managenment\Business\Contract;

use Illuminate\Foundation\Http\FormRequest;

class BusinessContractItemStoreRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:20|max:255',
            'unit_id' => 'required|exists:configuration_measurement_units,id',
            'supplier_id' => 'required|exists:business_contract_suppliers,id',
            'unit_price' => 'required|numeric|min:0.01',
        ];

        // Adiciona a validação de quantidade apenas se ela foi informada
        if ($this->has('quantity_adm')) { $rules['quantity_adm'] = 'required|numeric|min:1';}
        if ($this->has('quantity_atb')) { $rules['quantity_atb'] = 'required|numeric|min:1';}
        if ($this->has('quantity_mac')) { $rules['quantity_mac'] = 'required|numeric|min:1';}
        if ($this->has('quantity_vepd')) { $rules['quantity_vepd'] = 'required|numeric|min:1';}
        if ($this->has('quantity_vsan')) { $rules['quantity_vsan'] = 'required|numeric|min:1';}

        return $rules;
    }
}
