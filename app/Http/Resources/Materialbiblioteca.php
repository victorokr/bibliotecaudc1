<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Materialbiblioteca extends JsonResource
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
              'id_materialBiblioteca' =>$this->id_materialBiblioteca,
              'Codigo_ISBN' => $this->Codigo_ISBN,
              'Titulo' => $this->Titulo,
              'NumeroDePaginas' => $this->NumeroDePaginas,
              'estado' => $this->estado->first() !== null ? $this->estado->first()->Estado : 'Desconocido',
              'sede' => $this->ubicaciones
            ];
    }
}
