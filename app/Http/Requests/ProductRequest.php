<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $id = request('id') ?: 'NULL'; //To identify if request is for add or edit just take autoincremented id parameter form request.

        return [
            'code' =>['required', 'string', 'max:255','unique:products,code,'.$id],
            'name' =>['required', 'string', 'max:255','unique:products,name,'.$id],
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'category_id' => 'required|exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'unit_id' => 'required|exists:units,id'
         ];


        // you can also customize your validation for different methods as below

        switch ($this->method()){

            case 'DELETE':
                return [
                    'id'=>'required|exists:products,id',
                ];
            break;
            default:
                return [];
            break;
        }
    }
}
