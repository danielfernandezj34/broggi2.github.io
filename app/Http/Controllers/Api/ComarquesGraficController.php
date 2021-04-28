<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comarques;
use Illuminate\Http\Request;
use App\Http\Resources\ComarquesResource;
use Illuminate\Support\Facades\DB;

class ComarquesGraficController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comarques = DB::table('comarques')
            ->join('provincies', 'comarques.provincies_id', '=', 'provincies.id')
            ->select('comarques.nom AS Comarca', 'comarques.provincies_id AS Provincia')
            ->get();

        return $comarques;
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
     * @param  \App\Models\Comarques  $comarques
     * @return \Illuminate\Http\Response
     */
    public function show(Comarques $comarques)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comarques  $comarques
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comarques $comarques)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comarques  $comarques
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comarques $comarques)
    {
        //
    }
}
