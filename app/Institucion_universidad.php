<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion_universidad extends Model
{
    protected $table = 'institucion_universidad';
    protected $primaryKey = 'id_institucionUniversidad';
    protected $fillable = ['institucion_Universidad'];


    public function consultanteBiblioteca()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Consultante_biblioteca','id_consultanteBiblioteca');
    }
}
