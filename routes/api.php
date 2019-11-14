<?php

use Illuminate\Http\Request;
use App\Materialbiblioteca;
use App\Prestamos;
use App\Consultante_biblioteca;
use App\Http\Resources\ConsultantebibliotecaCollection;
use App\Http\Resources\MaterialbibliotecaCollection;
use App\Http\Resources\PrestamosCollection;
use App\Materialbiblioteca_prestamo;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request)
{
    return $request->user();
});

Route::get('material', function()
{
  try {
    return new MaterialbibliotecaCollection(Materialbiblioteca::all());
  } catch (Exception $e) {
    return response()->json(["message" => $e->getMessage(), "data" => []], 400);
  }
})->middleware ('auth:api');

Route::post('create/prestamo', function(Request $request)
{
  try {

  $prestamo = Prestamos::create($request->all());
  return response()->json (
    [
      "id_prestamo" => $prestamo->id_prestamo,
      "message" => "Prestamo creado satisfactoriamente",
      "data" => [$prestamo] 
    ],201);
}
catch (Exception $e) {
  return response()->json(["message" => $e->getMessage(), "data" => []], 400);
}
})->middleware ('auth:api');

Route::post('create/prestamomaterial', function(Request $request) {
  try {
    $prestamo_material = Materialbiblioteca_prestamo::create($request->all());
    return response()->json (
      [
        "message" => "Prestamo Material Biblioteca creado satisfactoriamente",
        "data" => [$prestamo_material]
      ],
      201
    );
  } catch (Exception $e) {
    return response()->json(["message" => $e->getMessage(), "data" => []], 400);
  }
})->middleware ('auth:api');

// auth consultante
Route::get('auth/consultante', function(Request $request)
{
  if (Auth::guard('consultants')->attempt($request->only('email','password'),$request->filled('remember')))
  {
    $id_consultante = Auth::guard('consultants')->user()->id_consultanteBiblioteca;
    $consultante = new ConsultantebibliotecaCollection (Consultante_biblioteca::where('id_consultanteBiblioteca', $id_consultante)->get());
    return response()->json($consultante, 200);
  } else {
    return response()->json(["message" => "login de consultante incorrecto", "data" => []], 404);
  }
})->middleware ('auth:api');


Route::get('consultante/prestamos', function(Request $request)
{
  if (!$request->has('id_consultante')) {
    return response()->json(["message" => "parametro 'id_consultante' requerido"], 400);
  } else {
      try {
        return new PrestamosCollection (Prestamos::where('id_consultanteBiblioteca', $request->id_consultante)->get());
      } catch (Exception $e) {
        return response()->json(["message" => $e->getMessage(), "data" => []], 400);
      }
  }

})->middleware ('auth:api');

