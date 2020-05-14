<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequeset extends FormRequest
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
             'name' =>['required', 'string', 'max:255','unique:roles,name,'.$id],
             'permission' => 'required'
         ];
    }
}
