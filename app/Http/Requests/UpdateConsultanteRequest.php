<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultanteRequest extends FormRequest
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
        return [
            //validaciones con expresiones regulares
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
            'Apellidos'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
            'Documento'=> ['required','digits_between:8,10','min:8|max:10'],
            'Telefono'=> 'required|digits:10',
            'Direccion'=>['required','max:35'],
            'password'=> ['required','confirmed','min:5|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],//debe contener un numero, minuscula y mayuscula
            'lugarDeResidencia'=>'required|regex:/^[\pL\s\-]+$/u|max:40',
            'perfiles'=>'required'
            
        ];
    }
}
