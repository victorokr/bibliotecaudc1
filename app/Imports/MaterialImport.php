<?php

namespace App\Imports;

use Illuminate\Http\Request;
use App\Materialbibliotecainventario;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MaterialImport implements ToModel, WithHeadingRow, WithValidation 
{
    protected  $request;

    function __construct(Request $request)
    {
        //dd($request->input());
        $this->request = $request;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // 

        // buscar id editorial en base
        $editorial = \App\Editorial::where ('Editorial', $row['editorial'])->first();
        // si no existe crearla y buscar id del editorial creado
        if (!isset($editorial)) {
            $editorial = \App\Editorial::create(['Editorial' => $row['editorial']]);
        } 

        $autor = \App\Autor::where ('Nombre', $row['autor'])->first();        
        // si no existe crearla y buscar id del editorial creado
        if (!isset($autor)) {
            $autor = \App\Autor::create(['Nombre' => $row['autor']]);
        }

        $material = \App\Materialbibliotecainventario::create([
            'Codigo_libro'       => $row['codigolibro'],
            'Codigo_ISBN'        => $row['codigoisbn'],
            'Titulo'             => $row['titulo'],
            'Edicion'            => $row['edicion'],
            'NumeroDePaginas'    => $row['numerodepaginas'],
            'id_editorial'       => $editorial->id_editorial,
            'id_baja'            => $row[8] = '6',
            'id_tipoDeMaterial'  => $row[9] = $this->request->input('id_tipoDeMaterial')
        ]);

        //Insertamos el libro del autor 
        \App\Autor_materialbiblioteca::create([
            'id_autor' => $autor->id_autor,
            'id_materialBiblioteca' => $material->id_materialBiblioteca 
        ]);
        
        $sede = \App\Ubicacion::where('Sede', $row['sede'])->first();
        \App\Mbiblioteca_ubicacion::create(['id_ubicacion' => $sede->id_ubicacion, 'id_materialBiblioteca' => $material->id_materialBiblioteca]);

        
        $entrada = \App\Entrada::find($this->request->input('entradas'))->first();
        \App\Entrada_mbiblioteca::create(['id_entrada' => $entrada->id_entrada, 'id_materialBiblioteca' => $material->id_materialBiblioteca]);

         $estado = \App\Estado::where('Estado', 'Disponible')->first();
        \App\Estado_materialbiblioteca::create(['id_estado' => $estado->id_estado, 'id_materialBiblioteca' => $material->id_materialBiblioteca]);

        $salida = \App\Salida::where('salida', 'Sin Traslados')->first();
        \App\Mbiblioteca_salida::create(['id_salida' => $salida->id_salida, 'id_materialBiblioteca' => $material->id_materialBiblioteca]);

          // if ($row['codigolibro'] == 19) {
          //   dump($editorial);
          //   dump($material);
          //   exit;
          // }
    }

    public function rules(): array
    {
     return [
           // Can also use callback validation rules
          'codigolibro' => function($attribute, $value, $onFailure) {
                   $material =  \App\Materialbibliotecainventario::where('Codigo_libro', $value)->first();
                   if (isset($material)) {
                        $onFailure("El codigo de material $value ya existe");
                   }
               }
            ,
            'sede' => function($attribute, $value, $onFailure) {
                   $sede =  \App\Ubicacion::where('Sede', $value)->first();
                   if (!isset($sede)) {
                        $onFailure("La sede $value no existe");
                   }
               }
         ];
     }
}
