<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\validation\Rule;


class UpdateEmpleadoRequest extends FormRequest
{

    protected $route;
    public function __construct(Route $route)
    {
        $this->route = $route;
    }



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
      // $email= Validator::make($data, [
        //      'email'=> [
          //          'required',
            //         Rule::unique('empleado')->ignore($user->id),
              //   ]
             //]);
        

        return [
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
            'Apellidos'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
            //'email'=> $email,
            //'email' =>'required|unique:empleado,email,'.$this->route('empleado'),
            //'email' =>['required','email','max:50',Rule::unique('empleado')->ignore($this->user)],
            //'email' =>['required','email','max:50',Rule::unique('empleado')->ignore($this->route('empleado'))],
            //'email' =>'required|unique:empleado,email,'.$id,'id_empleado',
            //'email' =>['required','email','max:50',Rule::unique('empleado')->ignore($this->id)],
            // 'email' =>'required|unique:empleado,email,'.$this->empleado,'id_empleado',
            //'email' => Rule::unique('empleado')->ignore($id,'id_empleado'),
            //'email' =>'required|unique:empleado,email',

            'password'=> ['required','confirmed','min:5|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],//debe contener un numero, minuscula y mayuscula
            'Telefono'=> 'required|digits:10',
            'Direccion'=>['required','max:35'],
            'roles'=>'required'
        ];
    }
}
