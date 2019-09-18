<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $fillable = ['Estado'];

     public function materialBibliotecas()
    {
        return $this->belongsToMany('App\Estado','estado_materialbiblioteca','id_materialBiblioteca','id_estado');
    }

    public function prestamo()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla prestamo
    {
        return $this->hasMany('App\Prestamos','id_prestamo');
    }

}
