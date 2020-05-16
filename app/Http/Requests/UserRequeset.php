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
        switch ($this->method())
        {
            case 'GET':
            case 'DELETE': {
                return [
                    'id'=>'required|exists:users,id'
                ];
            }
            case 'POST': {
                return [
                    'name' =>['required', 'string', 'max:255','unique:users'],
                    'email' =>['required', 'string', 'email', 'max:255' ,'unique:users'],
                    'password' => ['required','min:8','confirmed'],
                    'roles' => 'required',
                    'job' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|unique:users,name,'.$this->user->id.',id',
                    'code' => 'required|unique:users,email,'.$this->user->id.',id',
                    'password' => 'confirmed',
                    'roles' => 'required',
                    'job' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                ];
            }
            default:
                break;
        }

    }
}
