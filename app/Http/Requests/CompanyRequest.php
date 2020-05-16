<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                    'id'=>'required|exists:companies,id'
                ];
            }
            case 'POST': {
                return [
                    'name' => 'required|unique:companies,name',
                    'code' => 'required|unique:companies,code',

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|unique:companies,name,'.$this->company->id.',id',
                    'code' => 'required|unique:companies,code,'.$this->company->id.',id',
                ];
            }
            default:
                break;
        }
    }
}
