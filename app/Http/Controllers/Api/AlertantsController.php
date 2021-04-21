<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alertants;
use Illuminate\Http\Request;
use App\Http\Resources\AlertantsResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class AlertantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtreNomAlertant = $request->nomAlertant;
        $filtreIdTipusAlertant = $request->idTipusAlertant;

        if($filtreNomAlertant != ''){
            $alertants = Alertants::where('nom','LIKE','%'.$filtreNomAlertant.'%' )->get();
        }else{
            if($filtreIdTipusAlertant == ''){
                $alertants = Alertants::all();
            }else{
                $alertants = Alertants::where('tipus_alertants_id', '=', $filtreIdTipusAlertant)->get();
            }
        }

        return AlertantsResource::collection($alertants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alertant = new Alertants();

        $alertant->nom = $request->input('nom');
        $alertant->cognoms = $request->input('cognoms');
        $alertant->telefon = $request->input('telefon');
        $alertant->adreca = $request->input('adreca');
        $alertant->tipus_alertants_id = $request->input('tipus_alertants_id');
        $alertant->municipis_id = $request->input('municipis_id');

        try {
            $alertant->save();
            $response = (new AlertantsResource($alertant))
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
     * @param  \App\Models\Alertants  $alertants
     * @return \Illuminate\Http\Response
     */
    public function show(Alertants $alertants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alertants  $alertants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alertants $alertant)
    {
        $alertant->nom = $request->input('nom');
        $alertant->cognoms = $request->input('cognoms');
        $alertant->telefon = $request->input('telefon');
        $alertant->adreca = $request->input('adreca');
        $alertant->tipus_alertants_id = $request->input('tipus_alertants_id');
        $alertant->municipis_id = $request->input('municipis_id');


        try {
            $alertant->save();
            $response = (new AlertantsResource($alertant))
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
     * @param  \App\Models\Alertants  $alertants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alertants $alertant)
    {
        try {
            $alertant->delete();
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
