<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('empleados/area', 'AreaempleadosController@empleado');//redirec login


//Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
Auth::routes(['verify'=> true,'register' => false]);

 // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


 // Password Reset Routes consultantes
Route::get('consultante/password/reset', 'consultante\ConsultanteForgotPasswordController@showLinkRequestForm')->name('consultante.password.request');

Route::post('consultante/password/email', 'consultante\ConsultanteForgotPasswordController@sendResetLinkEmail')->name('consultante.password.email');

Route::get('consultante/password/reset/{token}', 'consultante\ConsultanteResetPasswordController@showResetForm')->name('consultante.password.reset');

Route::post('consultante/password/reset', 'consultante\ConsultanteResetPasswordController@reset')->name('consultante.password.update');


//rutas del menu de navegacion navbar
Route::get( '/', ['as'=> 'home','uses' => 'pagesController@home']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('saludos/{nombre?}', ['as' => 'saludos' ,'uses' => 'pagesController@saludo'])->where( 'nombre', "[A-Za-z]+");
Route::resource('mensajes', 'MessagesController'); //remplaza todas las rutas que usa el crud de mensajes

Route::resource('lista/contratos', 'ListacontratosController');
Route::resource('lista/empleados', 'ListaempleadosController');//->middleware('revalidate');
Route::resource('lista/consultantes', 'ListaconsultantesController');
Route::resource('material/biblioteca', 'MaterialbibliotecaController');
Route::resource('ejemplares', 'EjemplaresController');
Route::resource('editorial', 'EditorialController');
Route::resource('autor', 'AutorController');
Route::resource('prestamo/consultante', 'PrestamoController');
Route::resource('prestamos', 'PrestamosController');

//rutas segundo login
Route::get('consultantes/login', 'ConsultantesController@showLoginForm');
Route::post('consultantes/login','ConsultantesController@login');
Route::get('logout', 'ConsultantesController@logout');
Route::get('consultantes/area', 'AreaconsultantesController@consultante');



