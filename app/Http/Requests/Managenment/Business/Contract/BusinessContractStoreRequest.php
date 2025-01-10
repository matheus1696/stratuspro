<?php

namespace App\Http\Requests\Managenment\Business\Contract;

use Illuminate\Foundation\Http\FormRequest;

class BusinessContractStoreRequest extends FormRequest
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
            'number_process_bidding' => 'required|string|min:8|max:9',
            'number_auction' => 'required|string|min:8|max:9',
            'number_price_registration' => 'required|string|min:8|max:9',
            'number_price_record_document' => 'required|string|min:8|max:9',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'start_date' => 'required|date',
            'period' => 'required|in:6,12,24,36,48',
            'status_id' => 'required',
        ];
    }
}
