<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmpleadoRequest extends FormRequest
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

        'Nombre'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
        'Apellidos'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
        //'password'=> 'required|confirmed|min:5|max:20',
        //'password'=> ['required','confirmed','min:5|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],//esta validacion funciona, proporciona exelemte seguridad con un simbolo,mayuscula,minuscula y un numero. regex son expresiones regulares.

        'password'=> ['required','confirmed','min:5|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],//debe contener un numero, minuscula y mayuscula
        'Telefono'=> 'required|digits:10',
        'email' =>'required|max:50|unique:empleado,email',
        'Direccion'=>['required','max:35'],
        'roles'=>'required'
        ];
    }
}
