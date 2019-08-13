<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
    protected $table = 'baja';
    protected $primaryKey = 'id_baja';
    protected $fillable = ['Baja','Fecha'];

    public function materialbiblioteca()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla materialbiblioteca
    {
        return $this->hasOne('App\Materialbiblioteca','id_materialBiblioteca');
    }
}
