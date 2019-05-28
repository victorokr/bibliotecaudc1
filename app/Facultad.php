<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';
    protected $primaryKey = 'id_facultad';
    protected $fillable = ['facultad'];


    public function consultanteBiblioteca()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Consultante_biblioteca','id_consultanteBiblioteca');
    }
}
