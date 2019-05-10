<?php

namespace App\Http\Controllers;
use DB;
use App\Mensajecontacto;
use App\Http\Requests\CreateMessageRequest;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response




     */

    function __construct()
    {
        $this->middleware('auth', ['except' =>['create' , 'store']]); //protege la ruta mensajes, solo se muestra haciendo login, se le paso employes como parametro para que no bloquie la ruta mensajes despues de hacer login

        //$this->middleware('roles:Empleado', ['except' =>['create','store']]);//protege la ruta mensages dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link
    }


    //Nota: todo el controlador utiliza eloquent
    public function index()
    {
       //$messages = DB::table('mensajecontacto')->get(); //forma como se hace sin eloquent



        $messages = Mensajecontacto::all(); /*usando eloquent que se creo por consola con nombre de la tabla de la base de datos, pero la primera letra en mayuscula y en singular. Agregar import*/


        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(CreateMessageRequest $request) //CreateMessageRequest le pasa las validaciones de cajas de texto al metodo store.

    {
        //guardar mensaje
        //return $request
        //return $request ->all();

        //redireccionar
        //return $request ->input("nombre");
        


       // DB::table('mensajecontacto') -> insert([

         //   "nombre" => $request->input('nombre'),
           // "email" => $request->input('email'),
           // "telefono" => $request->input('telefono'),
           // "mensaje" => $request->input('mensaje'),


        //]);

        //$mensajecontacto = new Mensajecontacto;
        //$mensajecontacto->nombre = $request->input('nombre');
        //$mensajecontacto->email = $request->input('email');
        //$mensajecontacto->telefono = $request->input('telefono');
        //$mensajecontacto->mensaje = $request->input('mensaje');
        //$mensajecontacto->save();

        Mensajecontacto::create($request->all()); //se utiliza el metodo create directamente en el modelo, y por parametro se le pasa todo el request. Request es un objeto http. Mensajecontacto con M mayuscula, es la clase eloquent.


        //redireccionar
        return redirect() ->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        //$messages = DB::table('mensajecontacto') -> where('id_mensajeContacto', $id) ->first();


        $messages = Mensajecontacto::findOrFail($id); //la variable messages es igual al modelo Mensajecontacto, con el metodo findOrFail,  por parametro recibe el id para encontrarlo o mostrara un error controlado

        return view('messages.show', compact('messages'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    public function edit($id)
    {
        //$messages = DB::table('mensajecontacto') -> where('id_mensajeContacto', $id) ->first();

        $messages = Mensajecontacto::findOrFail($id);




        return view('messages.edit', compact('messages'));
    }







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */







    public function update(CreateMessageRequest $request, $id) //CreateMessageRequest le pasa las validaciones de cajas de texto al metodo update.
    {
        //primero actualizar mensaje
       // DB::table('mensajecontacto') -> where('id_mensajeContacto', $id) ->update([

            
         //   "nombre" => $request->input('nombre'),
           // "email" => $request->input('email'),
            //"telefono" => $request->input('telefono'),
           // "mensaje" => $request->input('mensaje'),

        //]);

        Mensajecontacto::findOrFail($id)->update($request->all());

        //luego redireccionar
        return redirect()->route('mensajes.index');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */






    public function destroy($id)
    {
       // return "eliminando el mensaje con el id" . $id; Esta linea comprueva si se esta eliminando con el id correspondiente

        //DB::table('mensajecontacto')-> where('id_mensajeContacto', $id)->delete();


        Mensajecontacto::findOrFail($id)->delete(); //se busca el mensaje con ($id), si no lo encuentra, devuelve el error 404, y si lo encuentra, se llama al metodo delete.


        return redirect()->route('mensajes.index');

    }
}
