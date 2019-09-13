<?php

namespace App\Imports;

use App\Materialbibliotecainventario;
use Maatwebsite\Excel\Concerns\ToModel;

class MaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Materialbibliotecainventario([
            
            'Codigo_libro'       => $row[0],
            'Codigo_ISBN'        => $row[1],
            'Titulo'             => $row[2],
            'Edicion'            => $row[3],
            'NumeroDePaginas'    => $row[4],
            'id_baja'            => $row[5],
            'id_tipoDeMaterial'  => $row[6],

        ]);
    }
}
