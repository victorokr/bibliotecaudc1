<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


     public function temaDelMaterial()
    {
        return $this->belongsToMany('App\Tema_del_material','prestamo_temamaterial','id_prestamo','id_temaDelMaterial');
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

    public function scopeSolicitante($query, $nombreSolicitante)
    {
        if($nombreSolicitante)
        return $query->whereHas("consultanteBiblioteca", function ($query) use ($nombreSolicitante){
            $query->where('Nombre','LIKE', "%$nombreSolicitante%");
        });
    }


    public function calcularDiasDeSancion()
    {
        // $fechaActual = new \DateTime();
        $fechaFin     = ($this->Fecha_devolucion);
        $diasRetrasados = '0';

        $fechaActual     = Carbon::now();
        $fechaExpiracion = Carbon::parse($fechaFin);
        $diasDiferencia  = $fechaActual->diffInDays($fechaExpiracion);
        if ($fechaExpiracion > $fechaActual) {
            return $diasRetrasados;
        }
        else{
            return $diasDiferencia;
        }
        
    }

    public function montoHaPagar()
    {
        $diasRetrasados = $this->calcularDiasDeSancion();
        $valorPorDia    = '2000';
        $valorTotal     = $diasRetrasados*$valorPorDia;
        
        return $valorTotal;
    }

    public function printDays()
    {   $ceroDias       = '0';
        
            return $ceroDias;  
    }

    public function diasEstado()
    {
        $diasRetrasados = $this->calcularDiasDeSancion();
        $diasSinMulta   = $this->printDays();
        $estadoPrestamo = ($this->id_estado);

        if ($estadoPrestamo === 2) {
            return $diasRetrasados;
        }
        else{
            return $diasSinMulta;
        }

    }

    public function valor()
    {   $sinMulta       = '0';
        $valor          = $this->montoHaPagar();
        $estadoPrestamo = ($this->id_estado);

        if ($estadoPrestamo === 2) {
            return $valor;
        }
        else{
            return $sinMulta;
        }
    }
    
}
