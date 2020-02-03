<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo_ubicacion extends Model
{
    protected $table = 'prestamo_ubicacion';
    protected $primaryKey = 'id_prestamoUbicacion';
    protected $fillable   = ['id_prestamo','id_ubicacion'];
    public $timestamps = false;
}
