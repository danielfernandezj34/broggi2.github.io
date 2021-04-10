<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipusRecursos;
use Illuminate\Http\Request;
use App\Http\Resources\TipusRecursosResource;

class TipusRecursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipus_recursos = TipusRecursos::all();

        return TipusRecursosResource::collection($tipus_recursos);
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
     * @param  \App\Models\TipusRecursos  $tipusRecursos
     * @return \Illuminate\Http\Response
     */
    public function show(TipusRecursos $tipusRecursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusRecursos  $tipusRecursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusRecursos $tipusRecursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusRecursos  $tipusRecursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusRecursos $tipusRecursos)
    {
        //
    }
}
