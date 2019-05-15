<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citas;
use App\Pacientes;
class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(['status'=>'ok','data'=>Citas::all()], 200);

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
         $citas = new Citas;
         //Declaramos el nombre con el nombre enviado en el request
         $citas->date = $request->date;
         $citas->specialty = $request->specialty;
         $citas->id_paciente = $request->id_paciente;

         //Guardamos el cambio en nuestro modelo
         $citas->save();
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
        return Citas::where('id', $id)->get();
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
		$citas=Citas::find($id);
		if (!$citas)
		{
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un cita con ese código.'])],404);
		}		

        // Listado de campos recibidos teóricamente.
         $date = $request->input('date');
         $specialty = $request->input('specialty');
         $id_paciente = $request->input('id_paciente');
		if ($request->method() === 'PATCH')
		{
			// Creamos una bandera para controlar si se ha modificado algún dato en el método PATCH.
			$bandera = false;
			// Actualización parcial de campos.
            if ($specialty)
			{
				$citas->specialty = $specialty;
				$bandera=true;
            }
            
			if ($citas)
			{
				// Almacenamos en la base de datos el registro.
				$citas->save();
				return response()->json(['status'=>'ok','data'=>$citas], 200);
			}
			else
			{
				// Se devuelve un array errors con los errores encontrados y cabecera HTTP 304 Not Modified – [No Modificada] Usado cuando el cacheo de encabezados HTTP está activo
				// Este código 304 no devuelve ningún body, así que si quisiéramos que se mostrara el mensaje usaríamos un código 200 en su lugar.
				return response()->json(['errors'=>array(['code'=>304,'message'=>'No se ha modificado ningún dato de Paciente.'])],304);
			}
		}
		// Si el método no es PATCH entonces es PUT y tendremos que actualizar todos los datos.
		if (!$date || !$specialty || !$id_paciente)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
			return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
		}

		$citas->date = $date;
		$citas->specialty = $specialty;
        $citas->id_paciente = $id_paciente;
		// Almacenamos en la base de datos el registro.
		$citas->save();
		return response()->json(['status'=>'ok','data'=>$citas], 200);
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
        $citas=Citas::find($id);

		// Si no existe ese fabricante devolvemos un error.
		if (!$citas)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
			// En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra citas con ese código.'])],404);
		}		

		// Procedemos por lo tanto a eliminar la cita.
		$citas->delete();
    }
}
