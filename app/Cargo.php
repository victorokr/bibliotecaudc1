<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $primaryKey = 'id_cargo';
    protected $fillable = ['Cargo'];


    public function contrato()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Contrato','id_contrato');
    }

    
}
