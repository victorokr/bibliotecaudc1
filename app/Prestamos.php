<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $table = 'prestamo';
    protected $primaryKey = 'id_prestamo';
    protected $fillable = ['Fecha_prestamo','Fecha_devolucion','id_tipoDePrestamo','id_consultanteBiblioteca','id_empleado','id_estado'];


    public function tipoDePrestamo()
    {
        return $this->belongsTo('App\Tipodeprestamo','id_tipoDePrestamo');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Empleado','id_empleado');
    }


    public function consultanteBiblioteca()
    {
        return $this->belongsTo('App\Consultante_biblioteca','id_consultanteBiblioteca');
    }


    public function estado()
    {
        return $this->belongsTo('App\Estado','id_estado');
    }


    public function materialBibliotecas()
    {
        return $this->belongsToMany('App\Materialbiblioteca','materialbiblioteca_prestamo','id_prestamo','id_materialBiblioteca');
    }


    public function novedades()
    {
        return $this->belongsToMany('App\Novedad','prestamo_novedad','id_prestamo','id_novedad');
    }


    public function sanciones()
    {
        return $this->belongsToMany('App\Sancion','sancion_prestamo','id_prestamo','id_sancion');
    }


     public function ubicaciones()
    {
        return $this->belongsToMany('App\Ubicacion','prestamo_ubicacion','id_prestamo','id_ubicacion');
    }




    // Query Scope metodos para busquedas codigo,autor,nombre
    public function scopeCodigo($query, $codigoisbn)
    {
        if($codigoisbn)
        return $query->whereHas("materialBiblioteca", function ($query) use ($codigoisbn){
    	$query->where('Codigo_ISBN','LIKE',"%$codigoisbn%");
    		});
    }

    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
        return $query->whereHas("materialBiblioteca", function ($query) use ($titulo){
        $query->where('Titulo','LIKE',"%$titulo%");
        	});

    }

    public function scopeEstado($query, $estado)
    {
        if($estado)
        return $query->whereHas("materialBiblioteca", function ($query) use ($estado){
        $query->where('Estado','LIKE',"%$estado%");
            });

    }

    // public function scopeAutor($query, $autor)
    // {
    //     if($autor)
    //     return $query->whereHas("autores", function ($query) use ($autor){
    //         $query->where('Nombre','LIKE', "%$autor%");
    //     });
    // }
    
}
