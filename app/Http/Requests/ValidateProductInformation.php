<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductInformation extends FormRequest
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
                    'name'=>'required|unique:products,name',
                    'sku'=>'required|unique:products,sku',
                    'image'=>'mimes:jpeg,bmp,png'
                ];
            }
        case 'PUT':
        case 'PATCH':
            {
                return [
                    'name'=>'required|unique:products,name,'.$this->segment(2),
                    'sku'=>'required|unique:products,sku,'.$this->segment(2),
                    'image'=>'mimes:jpeg,bmp,png'
                ];
            }
        default:break;
    }
}
}
