<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodeprestamo extends Model
{
    protected $table = 'tipo_de_prestamo';
    protected $primaryKey = 'id_tipoDePrestamo';
    protected $fillable = ['tipoDePrestamo'];
}
