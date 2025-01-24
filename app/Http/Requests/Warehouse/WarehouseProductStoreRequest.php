<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseProductStoreRequest extends FormRequest
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
            //
            'title' => 'required|unique:warehouse_products',
            'description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:warehouse_product_categories,id',
            'barcode' => 'required|string|max:255|unique:warehouse_products'
        ];
    }
}
