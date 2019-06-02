<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_consultanteBiblioteca extends Model
{
    protected $table = 'role_consultantebiblioteca';
    protected $primaryKey = 'id_roleConsultanteBiblioteca';
    protected $fillable = ['id_role','id_consultanteBiblioteca'];
}
