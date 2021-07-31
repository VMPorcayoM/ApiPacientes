<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarPacienteRequest;
use App\Http\Requests\ActualizarPacienteRequest;
use App\Http\Resources\PacienteResource;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PacienteResource::collection(Paciente::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPacienteRequest $request)
    {
        /*Paciente::create($request->all());
        return response()-> json([
            'res' =>true, 
            'msg' => 'Paciente guardado correctamente'
        ],200); */

        return (new PacienteResource(Paciente::create($request->all())))
        ->additional(['msg'=>'Paciente registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        /*return response()->json([
            'res'=>true, 
            'paciente'=>$paciente
        ],200);*/
        
        return new PacienteResource($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPacienteRequest $request, Paciente $paciente)
    {
        
        /*return response()->json([
            'res'=>true,
            'mensaje'=>'Paciente actualizado correctamente'
        ],200);*/
        $paciente->update($request->all());
        return (new PacienteResource($paciente))
            ->additional(['msg'=>'Paciente actualizado correctamente'])
            ->response()
            ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        
        /*return response()->json([
            'res'=>true,
            'mensaje'=>'Paciente eliminado correctamente'
        ],200);*/

        $paciente->delete();
        return (new PacienteResource($paciente))->additional(['msg'=>'Paciente eliminado correctamente']);
    }
}
