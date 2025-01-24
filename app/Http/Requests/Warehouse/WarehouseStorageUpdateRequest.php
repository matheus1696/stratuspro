<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WarehouseStorageUpdateRequest extends FormRequest
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
            'code' => [ 'required', 'min:6', Rule::unique('warehouse_storages')->ignore($this->warehouse_storage) ],
            'title' => [ 'required', Rule::unique('warehouse_storages')->ignore($this->warehouse_storage) ],
            'type_id' => 'required',
            'establishment_id' => 'required',
        ];
    }
}
