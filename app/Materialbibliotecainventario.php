<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialbibliotecainventario extends Model
{
    protected $table = 'materialbiblioteca';
    protected $primaryKey = 'id_materialBiblioteca';
    protected $fillable = ['Codigo_libro','Codigo_ISBN','Titulo','Fecha','Edicion','id_editorial','id_baja','id_tipoDeMaterial'];


    // public function editorial()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla editorial
    // {
    //     return $this->belongsTo('App\Editorial','id_editorial');
    // }

    public function baja()
    {
        return $this->belongsTo('App\Baja','id_baja');
    }

    public function tipoDeMaterial()
    {
        return $this->belongsTo('App\Tipodematerial','id_tipoDeMaterial');
    }

    public function entradas()
    {
        return $this->belongsToMany('App\Entrada','entrada_mbiblioteca','id_materialBiblioteca','id_entrada');//el primero pertenece a la tabla pivot, 2do a la tabla empleado para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla role.
    }

    public function salidas()
    {
    	return $this->belongsToMany('App\Salida','mbiblioteca_salida','id_materialBiblioteca','id_salida');
    }

    // public function carreras()
    // {
    // 	return $this->belongsToMany('App\Carrera','carrera_mbiblioteca','id_materialBiblioteca','id_carrera');
    // }


    public function estado()
    {
        return $this->belongsToMany('App\Estado','estado_materialbiblioteca','id_materialBiblioteca','id_estado');
    }


    public function ubicaciones()
    {
    	return $this->belongsToMany('App\Ubicacion','mbiblioteca_ubicacion','id_materialBiblioteca','id_ubicacion');
    }


    // public function estadoMaterialBibliotecas()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla estado_materialbiblioteca
    // {
    //     return $this->hasOne('App\Estado_materialbiblioteca','id_estadoMaterialBiblioteca');
    // }


    // public function prestamos()
    // {
    //     return $this->belongsToMany('App\Prestamos','materialbiblioteca_prestamo','id_materialBiblioteca','id_prestamo');
    // }



    // Query Scope metodos para busquedas codigo,autor,nombre
    public function scopeCodigo($query, $codigoLibro)
    {
        if($codigoLibro)
        return $query->where('Codigo_libro','LIKE',"%$codigoLibro%");
    }

    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
        return $query->where('Titulo','LIKE',"%$titulo%");
    }

    public function scopeUbicacion($query, $ubicacion)
    {
        if($ubicacion)
        return $query->whereHas("ubicaciones", function ($query) use ($ubicacion){
            $query->where('Sede','LIKE', "%$ubicacion%");
        });
    }


    public function scopeUbica($query)
    {
        
        return $query->whereHas("ubicaciones", function ($query){
            $query->where('Sede','=', 3);
        });
    }

    public function sedetresCount()
    {
    	$sedetres = $this->ubica()->count();
    	return $sedetres;
    }



    
    public function scopeUbica2($query)
    {
        
        return $query->whereHas("ubicaciones", function ($query){
            $query->where('Sede','=', 2);
        });
    }

    public function sededosCount()
    {
    	$sedeDos = $this->ubica2()->count();
    	return $sedeDos;
    }




    public function scopeUbica1($query)
    {
        
        return $query->whereHas("ubicaciones", function ($query){
            $query->where('Sede','=', 1);
        });
    }

    public function sedeunoCount()
    {
    	$sedeUno = $this->ubica1()->count();
    	return $sedeUno;
    }


    public function totalBiblioteca()
    {
    	$sedetres = $this->ubica()->count();
    	$sedeDos  = $this->ubica2()->count();
    	$sedeUno  = $this->ubica1()->count();
    	$total    = $sedetres+$sedeDos+$sedeUno;
    	return $total;
    }
    
}
