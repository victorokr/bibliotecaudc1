<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salida;
use App\Entrada;
use App\Baja;
use App\Tipodematerial;
use App\Ubicacion;
use App\Materialbibliotecainventario;
use App\Estado_materialbiblioteca;
use App\Estado;
use App\Editorial;
use App\Autor;
use App\Tema_del_material;
use App\Carrera;
use App\Http\Requests\CreateBibliotecainventarioRequest;
use App\Http\Requests\UpdateBibliotecainventarioRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class BibliotecainventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
    $this->middleware('auth:employes');//este middleware protege la ruta de usuarios sin autenticar


    $this->middleware('roles:jefeDeInventario');  
    }



    public function index(Request $request)
    {

        $codigoLibro = $request->get('Codigo_libro');
        $titulo      = $request->get('Titulo');
        $ubicacion   = $request->get('ubicaciones');

        $materialBibliotecas = Materialbibliotecainventario::orderBy('id_materialBiblioteca','DESC')
        ->codigo($codigoLibro)//codigo es el nombre del metodo en el modelo, pero sin scope
        ->titulo($titulo)
        ->ubicacion($ubicacion)
        ->paginate(4);

        //consulta libros sede 3
         //$totalSedes= Materialbibliotecainventario::ubica()->get();
        //$consultaMaterial= Materialbibliotecainventario::all()->sedetresCount();
       
        
        return view('materialbibliotecainventario.index', compact('materialBibliotecas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDeMateriall = Tipodematerial::pluck('Tipo_de_material','id_tipoDeMaterial');
        $bajaa = Baja::pluck('Baja','id_baja');
        $entradass = Entrada::pluck('Entrada','id_entrada');
        $salidass = Salida::pluck('Salida','id_salida');//'campo','id'
        $ubicacionn = Ubicacion::pluck('Sede','id_ubicacion');
        $estadoo = Estado::pluck('Estado','id_estado');
        $editoriall = Editorial::pluck('Editorial','id_editorial');
        $autoress = Autor::pluck('Nombre','id_autor');
        $temaa = Tema_del_material::pluck('Area','id_temaDelMaterial');
        $carreraa = Carrera::pluck('Carrera','id_carrera');
      

        return view('materialbibliotecainventario.create', compact('tipoDeMateriall','entradass','bajaa','tipoDeMateriall','ubicacionn','estadoo','salidass','editoriall','autoress','temaa','carreraa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBibliotecainventarioRequest $request)
    {
       //return $request->all(); 
       $materialBibliotecas = Materialbibliotecainventario::create([
           "Codigo_libro" => $request->input('Codigo_libro'),
           "Codigo_ISBN"  => $request->input('Codigo_ISBN'),
           "Titulo"       => $request->input('Titulo'),
           "Fecha"        => $request->input('Fecha'),
           "Edicion"      => $request->input('Edicion'),
           "id_editorial" => $request->input('id_editorial'),
           "id_baja"      => '6',
           "id_tipoDeMaterial" => $request->input('id_tipoDeMaterial'),
       ]);


       //$estadoBaja = Materialbibliotecainventario::create(['id_baja' => 6]);
       $materialBibliotecas->entradas()->attach($request->entradas);
       $materialBibliotecas->salidas()->attach($request->salidas);
       $materialBibliotecas->ubicaciones()->attach($request->ubicaciones);
       $materialBibliotecas->estado()->attach(1);
       $materialBibliotecas->autores()->attach($request->autores);
       $materialBibliotecas->temaDelmaterial()->attach($request->temaDelmaterial);
       $materialBibliotecas->carreras()->attach($request->carreras);

       return redirect()->route('inventario.index', compact('materialBibliotecas'))
       ->with('infoCreateMaterialBiblioteca','Material agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materialBibliotecas = \App\Materialbibliotecainventario::findOrFail($id);
      

       
        $tipoDeMateriall = Tipodematerial::pluck('Tipo_de_material','id_tipoDeMaterial');
        $bajaa = Baja::pluck('Baja','id_baja');
        $entradass = Entrada::pluck('Entrada','id_entrada');
        $salidass = Salida::pluck('Salida','id_salida');//'campo','id'
        $ubicacionn = Ubicacion::pluck('Sede','id_ubicacion');
        $estadoo = Estado::pluck('Estado','id_estado');
        $editoriall = Editorial::pluck('Editorial','id_editorial');
        $autoress = Autor::pluck('Nombre','id_autor');
        $temaa = Tema_del_material::pluck('Area','id_temaDelMaterial');
        $carreraa = Carrera::pluck('Carrera','id_carrera');

        return view('materialbibliotecainventario.edit', compact('materialBibliotecas','entradass','bajaa','tipoDeMateriall','ubicacionn','estadoo','salidass','editoriall','autoress','temaa','carreraa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateBibliotecainventarioRequest $request, $id)
    {
        $this->validate(request(), ['Codigo_libro' =>['required','string','max:25',Rule::unique('materialbiblioteca')->ignore($id,'id_materialBiblioteca')]]);

        $materialBibliotecas = \App\Materialbibliotecainventario::findOrFail($id);
        $materialBibliotecas->entradas()->sync($request->entradas);
        $materialBibliotecas->salidas()->sync($request->salidas);
        $materialBibliotecas->ubicaciones()->sync($request->ubicaciones);  
        $materialBibliotecas->estado()->sync($request->estado);
        $materialBibliotecas->autores()->sync($request->autores);
        $materialBibliotecas->temaDelmaterial()->sync($request->temaDelmaterial);
        $materialBibliotecas->carreras()->sync($request->carreras);

        $materialBibliotecas->update($request->all());
        return redirect()->route('inventario.index')->with('infoUpdateMaterialBiblioteca','Material actualizado');//se coloca la llave info para lanzar mensage de se actualizo correctamente, la llave se activara con boostrack en el formulario edit de listaempleados
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materialBibliotecas = \App\Materialbibliotecainventario::findOrFail($id);
        $materialBibliotecas->delete();
        
        //return redirect()->route('empleados.index', compact('listaempleados'));//empleados.index, se verifica el comando php artisan r:l para poder redireccionar con index
        return back()->with('infoDeleteMaterial','Material eliminado');
    }
}
