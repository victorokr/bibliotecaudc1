<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodematerial extends Model
{
    protected $table = 'tipo_de_material';
    protected $primaryKey = 'id_tipoDeMaterial';
    protected $fillable = ['Tipo_de_material'];

    public function materialbiblioteca()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla materialbiblioteca
    {
        return $this->hasMany('App\Materialbiblioteca','id_materialBiblioteca');
    }
}
