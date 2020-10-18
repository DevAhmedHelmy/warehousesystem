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

    public function common_rules(){
        return [
            'client_id' => ['required','exists:clients,id'],
            'bill_discount' => ['nullable','numeric'],
            'bill_tax' => ['nullable','numeric'],
            'bill_total' => ['required','numeric'],
            'discount.*' => ['nullable','numeric'],
            'tax.*' => ['nullable','numeric'],
            'quantity.*'=> ['required','numeric'],
            'product_id.*' => ['required','exists:products,id'],
            'stock_id' => ['required','exists:stocks,id'],
            'total.*' => ['required','numeric'],
            'bill_type' => ['required']
        ];
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

                return  array_merge(
                    ['bill_number' => ['required', Rule::unique('sale_bills')]],
                    $this->common_rules()
                );
            }


            case 'PUT':
            case 'PATCH': {
                return array_merge(
                    ['bill_number' =>['required',Rule::unique('sale_bills')->ignore($this->salebill)]],
                    $this->common_rules()
                );
            }
            default:
                break;
        }
    }


}
