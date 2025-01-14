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
        return [
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string',
            'unit_id' => 'required|exists:configuration_measurement_units,id',
            'unit_price' => 'required|numeric|min:0',
            'quantity_adm' => 'nullable|numeric|min:0',
            'quantity_atb' => 'nullable|numeric|min:0',
            'quantity_mac' => 'nullable|numeric|min:0',
            'quantity_vepd' => 'nullable|numeric|min:0',
            'quantity_vsan' => 'nullable|numeric|min:0',
        ];
    }
}
