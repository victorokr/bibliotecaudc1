<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
    public function rules()/*una clase para validar en caso de tener muchas cajas*/
    {
        return [
            'nombre'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
            'email' =>['required','email'],
            'mensaje'=> ['required','min:5|max:200'],
            'telefono'=> 'required|digits:10'
        ];
    }
}
