<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Prestamos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
          "id_prestamo" => $this->id_prestamo,
          "id_consultanteBiblioteca" => $this->id_consultanteBiblioteca,
          "Fecha_prestamo" => $this->Fecha_prestamo,
          "Fecha_devolucion" => $this->tipoDePrestamo,
          "estado" => isset($this->estado) ? [
            "id_estado"=> $this->id_estado,
            "estado" => $this->estado 
          ] : null,
          "empleado" => isset($this->empleado) ? [
            "id_empleado" => $this->id_empleado,
            "empleado_email" =>  $this->empleado->email,
            "empleado_nombre" => $this->empleado->Nombre
          ] : null,
          "diasRetrasados" => isset($this->diasRetrasados) ? $this->diasRetrasados : 0,
          "debe" =>  isset($this->debe) ? $this->debe : 0
          
        ];
    }
}
