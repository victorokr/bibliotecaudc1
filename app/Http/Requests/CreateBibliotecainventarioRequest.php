<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBibliotecainventarioRequest extends FormRequest
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

            'Codigo_libro'=>'required|max:25|unique:materialbiblioteca,Codigo_libro',
            'NumeroDePaginas'=>'required|numeric|min:2',
        ];
    }
}
