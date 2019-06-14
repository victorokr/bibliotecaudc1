<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor_materialbiblioteca extends Model
{
    protected $table = 'autor_materialbiblioteca';
    protected $fillable = ['id_autormBiblioteca','id_autor','id_materialBiblioteca'];
}
