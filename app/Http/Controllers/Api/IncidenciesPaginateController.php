<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Incidencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\IncidenciesResource;

class IncidenciesPaginateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtreCodiIncidencia = $request->codiIncidencia;
        $filtreIdAdministratiu = $request->idAdministratiu;
        $filtreIdTipusIncidencia = $request->idTipusIncidencia;

        if($filtreCodiIncidencia == ''){
            if($filtreIdAdministratiu == ''){
                if($filtreIdTipusIncidencia == ''){
                    $incidencies = Incidencies::with(['usuari', 'tipus_incidencies'])->paginate(6);
                }else{
                    $incidencies = Incidencies::with(['usuari', 'tipus_incidencies'])->where('tipus_incidencies_id', '=', $filtreIdTipusIncidencia)->paginate(6);

                }
            }else{
            $incidencies = Incidencies::with(['usuari', 'tipus_incidencies'])->where('usuaris_id', '=', $filtreIdAdministratiu)->paginate(6);
            }
        }else{
            $incidencies = Incidencies::with(['usuari', 'tipus_incidencies'])->where('num_incident', '=', $filtreCodiIncidencia)->paginate(6);
        }




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
        //
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
