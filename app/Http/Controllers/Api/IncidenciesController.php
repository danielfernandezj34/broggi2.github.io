<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Incidencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\IncidenciesResource;
use App\Models\Incidencies_has_recursos;

class IncidenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $incidencies = Incidencies::all();

        return IncidenciesResource::collection($incidencies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $incidencies = new Incidencies();

        $incidencies->telefon_alertant = $request->input('telefon');
        $incidencies->adreca = $request->input('adreca');
        $incidencies->adreca_complement = $request->input('adreca_complement');
        $incidencies->descripcio = $request->input('descripcio');
        $incidencies->nom_metge = $request->input('nom_metge');
        $incidencies->tipus_incidencies_id = $request->input('tipus_incidencies_id');
        $incidencies->alertants_id = $request->input('alertants_id');
        $incidencies->municipis_id = $request->input('municipis_id');
        $incidencies->ususaris_id = $request->input('user_id');
        $incidencies_has_recursos = $request->input('incidencies_has_recursos');
        $incidencies_has_afectats = $request->input('incidencies_has_afectats');

        try{
            $incidencies->save();

            foreach($incidencies_has_recursos as $incidencia_has_recurs){
                $ihr = new Incidencies_has_recursos();
                $ihr->incidencies_id = $incidencia_has_recurs['incidencies_id'];
                $ihr->recursos_id = $incidencies_has_recursos['recursos_id'];
                $ihr->prioritat = $incidencies_has_recursos['prioritat'];

                $incidencies->incidencies_has_recursos()->save($ihr);
            }

            // foreach($incidencies_has_afectats as $incidencia_has_afectat){
            //     $iha = new
            // }

            DB::commit();
            $incidencies->refresh();

            $response = (new IncidenciesResource($incidencies))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            $response = \response()
                    ->json(['error' => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencies  $incidencies
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencies $incidencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencies  $incidencies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencies $incidencia)
    {
        $incidencia->telefon_alertant = $request->input('telefon_alertant');
        $incidencia->nom_metge = $request->input('nom_metge');
        $incidencia->adreca = $request->input('adreca');
        $incidencia->adreca_complement = $request->input('adreca_complement');
        $incidencia->tipus_incidencies_id = $request->input('tipus_incidencies_id');
        $incidencia->municipis_id = $request->input('municipis_id');
        $incidencia->descripcio = $request->input('descripcio');




        try {
            $incidencia->save();
            $response = (new IncidenciesResource($incidencia))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            $response = \response()
                    ->json(['error' => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencies  $incidencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencies $incidencia)
    {
        try {
            $incidencia->delete();
            $response = \response()
                    ->json(['error' => "Registre esborrat correctament"], 200);
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            $response = \response()
                    ->json(['error' => $mensaje], 400);
        }
        return $response;
    }
}
