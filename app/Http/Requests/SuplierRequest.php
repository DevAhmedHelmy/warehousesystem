<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SuplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'nullable|string',
            'tax_number' => 'nullable',
            'type' => ['required',Rule::in(['supplier', 'client'])],
            'user_type' => ['required',Rule::in(['cash', 'installment','checks'])],
            'company_id' => 'required|exists:companies,id',
            'balance' => 'nullable'
        ];
    }
}
