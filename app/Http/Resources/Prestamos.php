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
          "estado" => [
            "id_estado"=> $this->id_estado,
            "estado" => isset ($this->estado) ? $this->estado: null
          ],
          "empleado" => [
            "id_empleado" => $this->id_empleado,
            "empleado_email" => isset($this->empleado) ? $this->empleado->email: null,
            "empleado_nombre" => isset($this->Nombre) ? $this->empleado->Nombre: null
          ],
          "diasRetrasados" => isset($this->diasRetrasados) ? $this->diasRetrasados : 0,
          "debe" =>  isset($this->debe) ? $this->debe : 0
          

        ];
    }
}
