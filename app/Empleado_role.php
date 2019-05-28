<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_role extends Model
{
    protected $table = 'empleado_role';
    protected $fillable = ['id_empleado_role','id_empleado','id_role'];
}
