<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alertants;
use Illuminate\Http\Request;
use App\Http\Resources\AlertantsResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class AlertantsPaginateController extends Controller
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
            $alertants = Alertants::where('nom','LIKE','%'.$filtreNomAlertant.'%' )->paginate(8)->withQueryString();
        }else{
            if($filtreIdTipusAlertant == ''){
                $alertants = Alertants::paginate(8);
            }else{
                $alertants = Alertants::where('tipus_alertants_id', '=', $filtreIdTipusAlertant)->paginate(8)->withQueryString();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertants  $alertants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alertants $alertant)
    {

    }
}
