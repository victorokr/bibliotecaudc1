<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada_mbiblioteca extends Model
{
    protected $table = 'Entrada_mbiblioteca';
    protected $primaryKey = 'id_entrada_mbiblioteca';
    protected $fillable = ['id_materialBiblioteca','id_entrada'];
  
}
