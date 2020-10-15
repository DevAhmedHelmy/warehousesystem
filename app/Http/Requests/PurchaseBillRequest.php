<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PurchaseBillRequest extends FormRequest
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
                    'id'=>'required|exists:purchase_bills,id'
                ];
            }
            case 'POST': {
                return [
                    'bill_number' => ['required', Rule::unique('purchase_bills')],
                    'supplier_id' => ['required','exists:clients,id'],
                    'bill_discount' => ['nullable'],
                    'bill_tax' => ['nullable'],
                    'bill_total' => ['required'],
                    'discount' => ['nullable'],
                    'tax' => ['nullable'],
                    'quantity'=> ['required'],
                    'product_id' => ['required','exists:products,id'],
                    'stock_id' => ['required','exists:stocks,id'],
                    'total' => ['required'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'bill_number' =>['required',Rule::unique('purchase_bills')->ignore($this->purchasebill->id)],
                    'supplier_id' => ['required','exists:suppliers,id'],
                    'bill_discount' => ['nullable'],
                    'bill_tax' => ['nullable'],
                    'bill_total' => ['required'],
                    'discount' => ['nullable'],
                    'tax' => ['nullable'],
                    'quantity'=> ['required'],
                    'product_id' => ['required','exists:products,id'],
                    'stock_id' => ['required','exists:stocks,id'],
                    'total' => ['required']
                ];
            }
            default:
                break;
        }
    }
}
