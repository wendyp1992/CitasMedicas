<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacientes;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(['status'=>'ok','data'=>Pacientes::all()], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //Instanciamos la clase Pacientes
      /*   $paciente = new Pacientes;
         //Declaramos el nombre con el nombre enviado en el request
         $paciente->dni = $request->dni;
         $paciente->first_name = $request->first_name;
         $paciente->second_name = $request->second_name;
         $paciente->surnames = $request->surnames;
         $paciente->email = $request->email;
         $paciente->phone = $request->phone;
         $paciente->birthdate = $request->birthdate;
         //Guardamos el cambio en nuestro modelo
         $paciente->save();*/
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
        return Pacientes::where('identificador', $id)->get();
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
