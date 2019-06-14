<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema_del_material extends Model
{
    protected $table = 'tema_del_material';
    protected $primaryKey = 'id_temaDelMaterial';
    protected $fillable = ['Area'];
}
