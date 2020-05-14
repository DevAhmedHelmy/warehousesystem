<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequeset extends FormRequest
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
             'name' =>['required', 'string', 'max:255','unique:users,name,'.$id],
             'email' =>['required', 'string', 'email', 'max:255' ,'unique:users,email,'.$id],
             'roles' => 'required'
         ];


        // you can also customize your validation for different methods as below

        switch ($this->method()){
            case 'POST':
                return [
                    'password' => ['required', 'string', 'min:8', 'confirmed']

                ];
            break;
            case 'PATCH':
                return [
                    'password' => 'confirmed'
                ];
            break;
            default:
                return [];
            break;
        }
    }
}
