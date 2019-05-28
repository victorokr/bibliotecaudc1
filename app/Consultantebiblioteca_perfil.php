<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultantebiblioteca_perfil extends Model
{
    protected $table = 'consultantebiblioteca_perfil';
    protected $fillable = ['id_consultanteBibliotecaPerfil','id_perfil','id_consultanteBiblioteca'];
}
