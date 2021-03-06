<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaterialbibliotecaRequest extends FormRequest
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
            
            'codigo'=>'required|max:25|unique:materialbiblioteca,Codigo_libro',
            'Codigo_ISBN'=>'required|max:25',
            'Titulo'=>'required|max:65',
            'Fecha' => 'required',
            'Edicion'=>'required|max:20',
            'id_editorial' => 'required',
            'id_baja' => 'required',
            'id_tipoDeMaterial' => 'required',
            'autores' => 'required',
            'temaDelmaterial' => 'required',
            'carreras' => 'required',
            'estado' => 'required'
        ];
    }
}
