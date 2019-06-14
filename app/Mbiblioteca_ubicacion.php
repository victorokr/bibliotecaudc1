<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mbiblioteca_ubicacion extends Model
{
    protected $table = 'mbiblioteca_ubicacion';
    protected $fillable = ['id_mbiblioteca_ubicacion','id_materialBiblioteca','id_ubicacion'];
}
