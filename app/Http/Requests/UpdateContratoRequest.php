<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContratoRequest extends FormRequest
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
            
            'Jornada'=>'required|regex:/^[\pL\s\-]+$/u|max:21',
            'PeriodoDePrueba'=> ['required','max:20'],
            'Salario'=> 'required|regex:/^\d{1,3}(?:\.\d\d\d)*(?:,\d{1,2})?$/|max:21', //permite puntos de mil 1.200.000
            //'fechacontrato'=>'required|date|date_format:Y-m-d',
            //'tipoDeContrato'=>['required'],
            //'tipoDeCargo'=>['required']
        ];
    }
}
