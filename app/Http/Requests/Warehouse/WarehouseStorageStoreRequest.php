<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseStorageStoreRequest extends FormRequest
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
            'code' => 'required|min:6|unique:warehouse_storages',
            'title' => 'required|unique:warehouse_storages',
            'type_id' => 'required',
            'establishment_id' => 'required',
        ];
    }
}
