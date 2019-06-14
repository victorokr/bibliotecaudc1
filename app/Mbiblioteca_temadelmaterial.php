<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mbiblioteca_temadelmaterial extends Model
{
    protected $table = 'mbiblioteca_temadelmaterial';
    protected $fillable = ['id_mbibliotecaTemadelmaterial','id_materialBiblioteca','id_temaDelMaterial'];
}
