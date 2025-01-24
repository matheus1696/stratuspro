<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseMovimentEntryStoreRequest extends FormRequest
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
            'supplier' => 'required|string|max:255',
            'invoice_number' => 'required|string|max:255',
            'supplier_number' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:warehouse_products,id',
            'financial_block_id' => 'required|exists:company_financial_blocks,id',
        ];
    }
}
