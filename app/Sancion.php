<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    protected $table = 'sancion';
    protected $primaryKey = 'id_sancion';
    protected $fillable = ['diasTranscurridos'];
}
