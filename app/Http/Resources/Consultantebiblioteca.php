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
           "institucion_universidad" => isset ($this->institucionUniversidadd) ? [
              "id_institucionUniversidad" => $this->institucionUniversidadd->id_institucionUniversidad,
              "institucion_Universidad" => $this->institucionUniversidadd->institucion_Universidad
           ] : null,
           "facultad" => isset($this->facultadd) ? [
             "id_facultad"=> $this->facultadd->id_facultad,
             "facultad"=> $this->facultadd->facultad
           ] : null
        ];
    }
}
