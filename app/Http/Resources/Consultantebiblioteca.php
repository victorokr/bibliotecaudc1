<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Consultantebiblioteca extends JsonResource
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
           "id_consultanteBiblioteca" => $this->id_consultanteBiblioteca,
           "Nombre"    => $this->Nombre,
           "Apellidos" => $this->Apellidos,
           "Documento" => $this->Documento,
           "Telefono"  => $this->Telefono,
           "Direccion" => $this->Direccion,
           "email"     => $this->email,
           "lugarDeResidencia"     => $this->lugarDeResidencia,
           "institucion_universidad" => [
              "id_institucionUniversidad" => isset ($this->institucionUniversidad) ? $this->institucionUniversidad->id_institucionUniversidad,
              "institucion_Universidad" => isset ($this->institucionUniversidad) ? $this->institucionUniversidad->institucion_Universidad
           ],
           "facultad" => [
             "id_facultad"=> isset($this->facultad)? $this->facultad->id_facultad,
             "facultad"=> isset($this->facultad)? $this->facultad->facultad
           ]
        ];
    }
}
