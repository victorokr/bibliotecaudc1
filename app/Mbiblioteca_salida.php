<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mbiblioteca_salida extends Model
{
    protected $table = 'mbiblioteca_salida';
    protected $primaryKey = 'id_mbibliotecaSalida';
    protected $fillable = ['id_materialBiblioteca','id_salida'];
}
