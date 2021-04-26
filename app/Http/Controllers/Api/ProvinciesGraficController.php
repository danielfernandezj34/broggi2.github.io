<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provincies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinciesGraficController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincies = DB::table('provincies')
            ->join('comarques', 'provincies.id', '=', 'comarques.provincies_id')
            ->join('municipis', 'comarques.id', '=', 'municipis.comarques_id')
            ->join('incidencies', 'municipis.id', '=', 'incidencies.municipis_id')
            ->select('provincies.nom AS Provincia', DB::raw('count(*) as Incidencies'))
            ->groupBy('provincies.nom')
            ->get();

        return $provincies;
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
     * @param  \App\Models\Provincies  $provincies
     * @return \Illuminate\Http\Response
     */
    public function show(Provincies $provincies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provincies  $provincies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincies $provincies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provincies  $provincies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincies $provincies)
    {
        //
    }
}
