<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialbiblioteca extends Model
{
    protected $table = 'materialbiblioteca';
    protected $primaryKey = 'id_materialBiblioteca';
    protected $fillable = ['Codigo_libro','Codigo_ISBN','Titulo','Fecha','Edicion','id_editorial','id_baja','id_tipoDeMaterial'];


    public function editorial()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla editorial
    {
        return $this->belongsTo('App\Editorial','id_editorial');
    }

    public function baja()
    {
        return $this->belongsTo('App\Baja','id_baja');
    }

    public function tipoDeMaterial()
    {
        return $this->belongsTo('App\Tipodematerial','id_tipoDeMaterial');
    }

    public function autores()
    {
        return $this->belongsToMany('App\Autor','autor_materialbiblioteca','id_materialBiblioteca','id_autor');//el primero pertenece a la tabla pivot, 2do a la tabla empleado para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla role.
    }

    public function temaDelmaterial()
    {
    	return $this->belongsToMany('App\tema_del_material','mbiblioteca_temadelmaterial','id_materialBiblioteca','id_temaDelMaterial');
    }

    public function carreras()
    {
    	return $this->belongsToMany('App\Carrera','carrera_mbiblioteca','id_materialBiblioteca','id_carrera');
    }


    public function estado()
    {
        return $this->belongsToMany('App\Estado','estado_materialbiblioteca','id_materialBiblioteca','id_estado');
    }


    public function ubicaciones()
    {
    	return $this->belongsToMany('App\Ubicacion','mbiblioteca_ubicacion','id_materialBiblioteca','id_ubicacion');
    }


    public function estadoMaterialBibliotecas()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla estado_materialbiblioteca
    {
        return $this->hasOne('App\Estado_materialbiblioteca','id_estadoMaterialBiblioteca');
    }


    public function prestamos()
    {
        return $this->belongsToMany('App\Prestamos','materialbiblioteca_prestamo','id_materialBiblioteca','id_prestamo');
    }



    // Query Scope metodos para busquedas codigo,autor,nombre
    public function scopeCodigo($query, $codigoisbn)
    {
        if($codigoisbn)
        return $query->where('Codigo_ISBN','LIKE',"%$codigoisbn%");
    }

    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
        return $query->where('Titulo','LIKE',"%$titulo%");
    }

    public function scopeAutor($query, $autor)
    {
        if($autor)
        return $query->whereHas("autores", function ($query) use ($autor){
            $query->where('Nombre','LIKE', "%$autor%");
        });
    }

}
