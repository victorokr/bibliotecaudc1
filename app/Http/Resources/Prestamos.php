<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Materialbiblioteca as MaterialResource;

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
          "tipoDePrestamo" => $this->tipoDePrestamo,
          "Fecha_prestamo" => $this->Fecha_prestamo,
          "Fecha_devolucion" => $this->Fecha_devolucion,
          "estado" => isset($this->estado) ? [
            "id_estado"=> $this->id_estado,
            "estado" => $this->estado->Estado 
          ] : null,
          "empleado" => isset($this->empleado) ? [
            "id_empleado" => $this->id_empleado,
            "empleado_email" =>  $this->empleado->email,
            "empleado_nombre" => $this->empleado->Nombre
          ] : null,
          "diasRetrasados" => isset($this->diasRetrasados) ? $this->diasRetrasados : 0,
          "debe" =>  isset($this->debe) ? $this->debe : 0,
          "materiales" => MaterialResource::collection($this->materialBibliotecas()->get())
        ];
    }
}
