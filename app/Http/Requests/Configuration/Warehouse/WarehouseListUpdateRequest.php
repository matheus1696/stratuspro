<?php

namespace App\Http\Requests\Configuration\Warehouse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WarehouseListUpdateRequest extends FormRequest
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
            'code' => [ 'required', 'min:6', Rule::unique('warehouse_lists')->ignore($this->warehouse) ],
            'title' => [ 'required', Rule::unique('warehouse_lists')->ignore($this->warehouse) ],
            'type_id' => 'required',
            'establishment_id' => 'required',
        ];
    }
}
