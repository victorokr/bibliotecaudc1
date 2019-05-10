<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajecontacto extends Model /*laravel busca en BD el mismo nombre que se asigno en eloquent, pero en minuscula y singular*/
{
    protected $table = 'mensajecontacto'; //se le indica a eloquent a que tabla insertar, esto evita buscar nombres  en plural de tablas en la BD 

   // protected $table = 'consultante_biblioteca';

    protected $primaryKey = 'id_mensajeContacto'; //se le dice a la clase el id, sin esta linea sale error column not found



    protected $fillable = ['nombre','email','telefono','mensaje'];//evita la asignacion masiva, inserta solo a los campos especificados de la tabla.

    

}
