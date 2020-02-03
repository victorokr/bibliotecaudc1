<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialbiblioteca_prestamo extends Model
{
    protected $table = 'materialbiblioteca_prestamo';
    protected $primaryKey = 'id_materialBibliotecaPrestamo';
    protected $fillable   = ['id_prestamo','id_materialBiblioteca'];

    public $timestamps = false;
}
