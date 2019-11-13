<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_materialbiblioteca extends Model
{
    protected $table = 'estado_materialbiblioteca';
    protected $primaryKey = 'id_estadoMaterialBiblioteca';
    protected $fillable = ['id_estado','id_materialBiblioteca'];

    

    // public function materialBiblioteca()
    // {
    //     return $this->belongsTo('App\Materialbiblioteca','id_materialBiblioteca');
    // }

    public function estadoMaterial()
    {
        return $this->belongsTo('App\Estado','id_estado');
    }

}
