<?php

namespace App\Http\Controllers\Api;

use App\Models\Incidencies_has_recursos;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Clases\Utilitat;
use App\Http\Resources\IncidencieshasRecursosResource;

class Incidencies_has_recursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $incidencies_has_rec = new Incidencies_has_recursos();

        $incidencies_has_rec->incidencies_id = $request->input('incidencies_id');
        $incidencies_has_rec->recursos_id = $request->input('recursos_id');
        $incidencies_has_rec->hora_activacio = $request->input('hora_activacio');
        $incidencies_has_rec->hora_mobilitzacio = $request->input('hora_mobilitzacio');
        $incidencies_has_rec->hora_assistencia = $request->input('hora_assistencia');
        $incidencies_has_rec->hora_transport = $request->input('hora_transport');
        $incidencies_has_rec->hora_arribada_hospital = $request->input('hora_arribada_hospital');
        $incidencies_has_rec->hora_transferencia = $request->input('hora_transferencia');
        $incidencies_has_rec->hora_finalitzacio = $request->input('hora_finalitzacio');
        $incidencies_has_rec->prioritat = $request->input('prioritat');
        $incidencies_has_rec->desti = $request->input('desti');


        try{

            $incidencies_has_rec->save();
            $response = (new IncidencieshasRecursosResource($incidencies_has_rec))
                        ->response()
                        ->setStatusCode(201);

        } catch(QueryException $exception){
            $mensaje = Utilitat::errorMessage($exception);
            $response = \response()
                    ->json(['error' => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencies_has_recursos  $incidencies_has_recursos
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencies_has_recursos $incidencies_has_recursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencies_has_recursos  $incidencies_has_recursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencies_has_recursos $incidencies_has_recursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencies_has_recursos  $incidencies_has_recursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencies_has_recursos $incidencies_has_recursos)
    {
        //
    }
}
