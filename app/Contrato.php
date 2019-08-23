<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo_de_contrato;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $primaryKey = 'id_contrato';
    protected $fillable = ['Jornada','PeriodoDePrueba','Salario','FechaInicio','id_tipoDeContrato','id_cargo','id_empleado','id_empresa'];



    public function tipoDeContrato()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla tipo de contrato
    {
        return $this->belongsTo('App\Tipo_de_contrato','id_tipoDeContrato');
    }


    public function cargo()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla cargo
    {
        return $this->belongsTo('App\Cargo','id_cargo');
    }


    public function empleado()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla empleado
    {
        return $this->belongsTo('App\Empleado','id_empleado');
    }


    public function empresa()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla empresa
    {
        return $this->belongsTo('App\Empresa','id_empresa');
    }

    
    //busqueda con campo llave foranea
    public function scopeContract($query, $contratoEmpleado)
    {
        if($contratoEmpleado)
        return $query->whereHas("empleado", function ($query) use ($contratoEmpleado){
            $query->where('Nombre','LIKE', "%$contratoEmpleado%");
        });
    }


}
