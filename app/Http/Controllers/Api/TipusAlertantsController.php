<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipusAlertants;
use Illuminate\Http\Request;
use App\Http\Resources\TipusAlertantsResource;

class TipusAlertantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipus_alertants = TipusAlertants::all();

        return TipusAlertantsResource::collection($tipus_alertants);
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
     * @param  \App\Models\TipusAlertants  $tipusAlertants
     * @return \Illuminate\Http\Response
     */
    public function show(TipusAlertants $tipusAlertants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusAlertants  $tipusAlertants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusAlertants $tipusAlertants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusAlertants  $tipusAlertants
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusAlertants $tipusAlertants)
    {
        //
    }
}
