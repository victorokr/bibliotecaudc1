<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_de_contrato extends Model
{
    protected $table = 'tipo_de_contrato';
    protected $primaryKey = 'id_tipoDeContrato';
    protected $fillable = ['Tipo'];


    public function contrato()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Contrato','id_contrato');
    }






    
}
