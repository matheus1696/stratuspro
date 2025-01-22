<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WarehouseStockControlUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'code' => [
                'required',
                'min:6',
                Rule::unique('warehouse_stock_controls')->ignore($this->warehouse_stock_control),
            ],
            'title' => [
                'required',
                Rule::unique('warehouse_stock_controls')->ignore($this->warehouse_stock_control),
            ],
            'establishment_id' => 'required',
        ];
    }
}
