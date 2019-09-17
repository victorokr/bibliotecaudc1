<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;
use App\Autor;
use App\Tema_del_material;
use App\Baja;
use App\Tipodematerial;
use App\Carrera;
use App\Ubicacion;
use App\Materialbiblioteca;
use App\Estado_materialbiblioteca;
use App\Estado;
use App\Http\Requests\UpdateMaterialbibliotecaRequest;
use App\Http\Requests\CreateMaterialbibliotecaRequest;
use Illuminate\Validation\Rule;

class MaterialbibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
    $this->middleware('auth:employes');//este middleware protege la ruta de usuarios sin autenticar


    $this->middleware('roles:Empleado');  
    }

    public function index(Request $request)
    {

        $temaLibro  = $request->get('Tema');
        $titulo     = $request->get('Titulo');
        $autor      = $request->get('autores');

        $materialBibliotecas = Materialbiblioteca::orderBy('id_materialBiblioteca','DESC')
        ->tema($temaLibro)//codigo es el nombre del metodo en el modelo, pero sin scope
        ->titulo($titulo)
        ->autor($autor)
        ->paginate(4);

        return view('materialbiblioteca.index', compact('materialBibliotecas') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $editoriall = Editorial::pluck('Editorial','id_editorial');//'campo','id'
        // $autoress = Autor::pluck('Nombre','id_autor');
        // $temaa = Tema_del_material::pluck('Area','id_temaDelMaterial');
        // $bajaa = Baja::pluck('Baja','id_baja');
        // $tipoDeMateriall = Tipodematerial::pluck('Tipo_de_material','id_tipoDeMaterial');
        // $carreraa = Carrera::pluck('Carrera','id_carrera');
        // $ubicacionn = Ubicacion::pluck('Sede','id_ubicacion');
        // $estadoo = Estado::pluck('Estado','id_estado');
        // //$codigoEjemplar = estadoMaterialBibliotecas::pluck('codigo','id_estadoMaterialBiblioteca');

        // return view('materialbiblioteca.create', compact('materialBibliotecas','editoriall','autoress','temaa','bajaa','tipoDeMateriall','carreraa','ubicacionn','estadoo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMaterialbibliotecaRequest $request)
    {
       //return $request->all(); 
       // $materialBibliotecas = \App\Materialbiblioteca::create( $request->all() );
       // $materialBibliotecas->autores()->attach($request->autores);
       // $materialBibliotecas->ubicaciones()->attach($request->ubicaciones);
       // $materialBibliotecas->carreras()->attach($request->carreras);
       // $materialBibliotecas->temaDelmaterial()->attach($request->temaDelmaterial);
       // $materialBibliotecas->estado()->attach($request->estado);
   

       // return redirect()->route('biblioteca.index', compact('materialBibliotecas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $ejemplaress = \App\Estado_materialbiblioteca::all();
        // return view('materialbiblioteca.show',compact('ejemplaress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materialBibliotecas = \App\Materialbiblioteca::findOrFail($id);
      

       
        $editoriall = Editorial::pluck('Editorial','id_editorial');//'campo','id'
        $autoress = Autor::pluck('Nombre','id_autor');
        $temaa = Tema_del_material::pluck('Area','id_temaDelMaterial');
        $bajaa = Baja::pluck('Baja','id_baja');
        $tipoDeMateriall = Tipodematerial::pluck('Tipo_de_material','id_tipoDeMaterial');
        $carreraa = Carrera::pluck('Carrera','id_carrera');
        $ubicacionn = Ubicacion::pluck('Sede','id_ubicacion');
        $estadoo = Estado::pluck('Estado','id_estado');
        
        return view('materialbiblioteca.edit', compact('materialBibliotecas','editoriall','autoress','temaa','bajaa','tipoDeMateriall','carreraa','ubicacionn','estadoo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialbibliotecaRequest $request, $id)
    {
         $this->validate(request(), ['Codigo_libro' =>['required','string','max:25',Rule::unique('materialbiblioteca')->ignore($id,'id_materialBiblioteca')]]);
        
        $materialBibliotecas = \App\Materialbiblioteca::findOrFail($id);
        $materialBibliotecas->autores()->sync($request->autores);
        $materialBibliotecas->ubicaciones()->sync($request->ubicaciones);
        $materialBibliotecas->carreras()->sync($request->carreras);
        $materialBibliotecas->temaDelmaterial()->sync($request->temaDelmaterial);  
        $materialBibliotecas->estado()->sync($request->estado);

        $materialBibliotecas->update($request->all());
        return redirect()->route('biblioteca.index')->with('infoUpdateMaterialBiblioteca','Material actualizado');//se coloca la llave info para lanzar mensage de se actualizo correctamente, la llave se activara con boostrack en el formulario edit de listaempleados
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materialBibliotecas = \App\Materialbiblioteca::findOrFail($id);
        $materialBibliotecas->delete();
        
        //return redirect()->route('empleados.index', compact('listaempleados'));//empleados.index, se verifica el comando php artisan r:l para poder redireccionar con index
        return back()->with('infoDeleteMaterial','Material eliminado');
    }
}
