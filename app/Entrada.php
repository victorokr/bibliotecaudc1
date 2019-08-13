<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table      = 'entrada';
    protected $primaryKey = 'id_entrada';
    protected $fillable   = ['Entrada'];
}
