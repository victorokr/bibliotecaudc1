<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera_mbiblioteca extends Model
{
    protected $table = 'carrera_mbiblioteca';
    protected $fillable = ['id_carrera_mbiblioteca','id_materialBiblioteca','id_carrera'];
}
