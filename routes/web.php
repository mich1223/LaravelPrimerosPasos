<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TestController; //importar controlador testcontroller

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

Route::get('/bienvenida', function () {
    return view('welcome');
});
Route::get('/contacto', function () {
    return view('contacto');
})-> name('contacto');

Route::get('/', [App\Http\Controllers\TestController::class, 'test']);



Route::get('/custom', function(){
    $msj2= "Mensaje desde el servidor *-* ";
    
    //return view('custom',['msj'=> $msj2, "edad"=> "15"]);  //envia a la vista custom la variable msj que toma el valor de msj2 ... pueden enviarse cualquier tipo de variables, objetos
    //version corta
    $data = ['msj'=> $msj2, "edad"=> "15"];
    return view('custom', $data);

});
