<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SaleBillRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'GET':
            case 'DELETE': {
                return [
                    'id'=>'required|exists:sale_bills,id'
                ];
            }
            case 'POST': {
                return [
                    'bill_number' => ['required', Rule::unique('sale_bills')],
                    'client_id' => ['required','exists:clients,id'],
                    'bill_discount' => ['nullable','numeric'],
                    'bill_tax' => ['nullable','numeric'],
                    'bill_total' => ['required','numeric'],
                    'discount' => ['nullable','numeric'],
                    'tax' => ['nullable','numeric'],
                    'quantity'=> ['required','numeric'],
                    'product_id' => ['required','exists:products,id'],
                    'stock_id' => ['required','exists:stocks,id'],
                    'total' => ['required','numeric'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'bill_number' =>['required',Rule::unique('sale_bills')->ignore($this->salebill->id)],
                    'client_id' => ['required','exists:clients,id'],
                    'bill_discount' => ['nullable','numeric'],
                    'bill_tax' => ['nullable','numeric'],
                    'bill_total' => ['required','numeric'],
                    'discount' => ['nullable','numeric'],
                    'tax' => ['nullable','numeric'],
                    'quantity'=> ['required','numeric'],
                    'product_id' => ['required','exists:products,id'],
                    'stock_id' => ['required','exists:stocks,id'],
                    'total' => ['required','numeric']
                ];
            }
            default:
                break;
        }
    }


}
