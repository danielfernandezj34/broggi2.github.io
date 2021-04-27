<?php

namespace App\Http\Controllers\Api;

use App\Models\Incidencies_has_recursos;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Clases\Utilitat;

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

        try{

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
