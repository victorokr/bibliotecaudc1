<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_de_consultante extends Model
{
    protected $table = 'tipo_de_consultante';
    protected $primaryKey = 'id_tipoDeConsultante';
    protected $fillable = ['tipoDeConsultante'];


    public function consultanteBiblioteca()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Consultante_biblioteca','id_consultanteBiblioteca');
    }
}
