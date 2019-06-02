<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmpleadoRequest;
use App\Http\Requests\CreateEmpleadoRequest;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;
use App\Role;

class ListaempleadosController extends Controller
{
    protected $route;//metodo para que funcione la validacion de email con .$this->route('empleado') poe el momento no se esta usando esa linea de codigo en el metodo update
    public function route( $route)
    {
        $this->route = $route;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
       $this->middleware('auth:employes'); //protege la ruta lista empleados, solo se muestra haciendo login, se le paso employes como parametro para que no bloquie la ruta lista empleados despues de hacer login

        $this->middleware('roles:Administrador', ['except' =>['edit','update']]);//protege la ruta gestionempleados dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link
    }



    public function index()
    {
        $listaempleados = \App\Empleado::all();

        return view('listaempleados.index', compact('listaempleados') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id_role');//esta linea le pasa los roles actuales al form edit, el metodo pluck recupera todos los valores de una clave dada

        return view('listaempleados.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateEmpleadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        $listaempleados = \App\Empleado::create( $request->all() );
        $listaempleados->roles()->attach($request->roles);
        return redirect()->route('empleados.index', compact('listaempleados'));
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
        $listaempleados = \App\Empleado::findOrFail($id);

        //$this->authorize('edit',$listaempleados);//politica

        $roles = Role::pluck('display_name', 'id_role');//esta linea le pasa los roles actuales al form edit, el metodo pluck recupera todos los valores de una clave dada

        return view('listaempleados.edit', compact('listaempleados','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpleadoRequest $request, $id)
    {

        //$this->validate(request(), ['email' => Rule::unique('empleado')->ignore($id,'id_empleado')]);
        //$email= ['email' =>'required|unique:empleado,email,'.$this->route('empleado')];
        $this->validate(request(), ['email' =>['required','email','max:50',Rule::unique('empleado')->ignore($id,'id_empleado')]]);

        //return $request->all(); //linea para ver que se esta enviando desde el formulario

        $listaempleados = \App\Empleado::findOrFail($id);

       //$this->authorize('update',$listaempleados);//polici

       $listaempleados->roles()->sync($request->roles);//el metodo sync evita duplicaciones en la tabla pivote de roles al seleccionar los checkbox en el formulario

        $listaempleados->update($request->all());
        return back()->with('info','Empleado actualizado');//se coloca la llave info para lanzar mensage de se actualizo correctamente, la llave se activara con boostrack en el formulario edit de listaempleados
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaempleados = \App\Empleado::findOrFail($id); 

        //$this->authorize('destroy',$listaempleados);

        $listaempleados->delete();
        
        //return redirect()->route('empleados.index', compact('listaempleados'));//empleados.index, se verifica el comando php artisan r:l para poder redireccionar con index
        return back()->with('infoDelete','Empleado eliminado');

    }
}
