<?php
use App\Pacientes;
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

Route::get('/', function () {
    //DATOS DE PRUEBA
/*
    $paciente= new Pacientes();
    $paciente->dni="0803968098";
    $paciente->first_name="ANDRES";
    $paciente->second_name="JOSE";
    $paciente->surnames="PERALES MORENO";
    $paciente->email="andres.perales@gmail.com";
    $paciente->phone="0969867061";
    $paciente->birthdate="1990-01-05";
    $paciente->doctor="MARIA ANTONIETA DE LOS ANGELES";
    $paciente->save();*/
    //buscar y eliminar
    /*$paciente=  Pacientes::find(2);
    $paciente->delete();*/
    return view('welcome');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//pruebas
Route::get('category', function () {
    return 'Category page content';
});

Route::get('category/sf', function () {
    return 'Ciencia Ficcion page content';
});

Route::get('category/{parameter}', function ($parameter) {
    return $parameter . '  page content';
});