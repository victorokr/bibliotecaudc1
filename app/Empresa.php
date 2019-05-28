<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $primaryKey = 'id_empresa';
    protected $fillable = ['Empresa','Nif','Direccion'];

    public function contrato()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Contrato','id_contrato');
    }

    
}
