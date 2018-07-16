<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserInformation extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'name' => 'required',
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|min:8|max:15|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[@&!$*^#%]).*$/',
                        'image' => 'mimes:jpeg,bmp,png|required',
                        'birthday' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name'=>'required',
                        'email'=>'required|string|email|max:255|unique:users,'.$this->segment(2),
                        'birthday'=>'mimes:jpeg,bmp,png|required'
                    ];
                }
            default:break;
        }
    }
}
