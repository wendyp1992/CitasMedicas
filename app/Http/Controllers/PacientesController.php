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
        $paciente = new Pacientes;
         //Declaramos el nombre con el nombre enviado en el request
         $paciente->dni = $request->dni;
         $paciente->first_name = $request->first_name;
         $paciente->second_name = $request->second_name;
         $paciente->surnames = $request->surnames;
         $paciente->email = $request->email;
         $paciente->phone = $request->phone;
         $paciente->birthdate = $request->birthdate;
         $paciente->doctor = $request->doctor;

         //Guardamos el cambio en nuestro modelo
         $paciente->save();
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
        return Pacientes::where('id', $id)->get();
       
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
        // Comprobamos si el fabricante que nos están pasando existe o no.
		$paciente=Pacientes::find($id);

		// Si no existe ese fabricante devolvemos un error.
		if (!$paciente)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
			// En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un paciente con ese código.'])],404);
		}		

        // Listado de campos recibidos teóricamente.
         $dni = $request->input('dni');
         $first_name = $request->input('first_name');
         $second_name = $request->input('second_name');
         $surnames = $request->input('surnames');
         $email = $request->input('email');
         $phone = $request->input('phone');
         $birthdate = $request->input('birthdate');

		// Necesitamos detectar si estamos recibiendo una petición PUT o PATCH.
		// El método de la petición se sabe a través de $request->method();
		if ($request->method() === 'PATCH')
		{
			// Creamos una bandera para controlar si se ha modificado algún dato en el método PATCH.
			$bandera = false;

			// Actualización parcial de campos.
			if ($dni)
			{
				$paciente->dni = $dni;
				$bandera=true;
			}
			if ($first_name)
			{
				$paciente->first_name = $first_name;
				$bandera=true;
			}
			if ($second_name)
			{
				$paciente->second_name = $second_name;
				$bandera=true;
            }
            
            if ($surnames)
			{
				$paciente->surnames = $surnames;
				$bandera=true;
            }
            if ($email)
			{
				$paciente->email = $email;
				$bandera=true;
            }
            if ($phone)
			{
				$paciente->phone = $phone;
				$bandera=true;
            }
            if ($birthdate)
			{
				$paciente->birthdate = $birthdate;
				$bandera=true;
			}

			if ($bandera)
			{
				// Almacenamos en la base de datos el registro.
				$paciente->save();
				return response()->json(['status'=>'ok','data'=>$paciente], 200);
			}
			else
			{
				// Se devuelve un array errors con los errores encontrados y cabecera HTTP 304 Not Modified – [No Modificada] Usado cuando el cacheo de encabezados HTTP está activo
				// Este código 304 no devuelve ningún body, así que si quisiéramos que se mostrara el mensaje usaríamos un código 200 en su lugar.
				return response()->json(['errors'=>array(['code'=>304,'message'=>'No se ha modificado ningún dato de Paciente.'])],304);
			}
		}


		// Si el método no es PATCH entonces es PUT y tendremos que actualizar todos los datos.
		if (!$dni || !$first_name || !$second_name|| !$surnames|| !$email|| !$phone || !$birthdate)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
			return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
		}

		$paciente->dni = $dni;
		$paciente->first_name = $first_name;
        $paciente->second_name = $second_name;
        $paciente->surnames = $surnames;
		$paciente->email = $email;
		$paciente->phone = $phone;
        $paciente->birthdate = $birthdate;
		// Almacenamos en la base de datos el registro.
		$paciente->save();
		return response()->json(['status'=>'ok','data'=>$paciente], 200);
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
        $paciente=Pacientes::find($id);

		// Si no existe ese fabricante devolvemos un error.
		if (!$paciente)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
			// En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra paciente con ese código.'])],404);
		}		

		// Procedemos por lo tanto a eliminar el paciente.
		$paciente->delete();
    }
}
