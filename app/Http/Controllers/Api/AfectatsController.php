<?php

namespace App\Http\Controllers\Api;

use App\Models\Afectats;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AfectatsResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class AfectatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afectats = Afectats::all();

        return AfectatsResource::collection($afectats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $afectats = new Afectats();

        $afectats->telefon = $request->input('telefon');
        $afectats->cip = $request->input('cip');
        $afectats->nom = $request->input('nom');
        $afectats->cognoms = $request->input('cognoms');
        $afectats->edat = $request->input('edat');
        $afectats->te_cip = $request->input('te_cip');
        $afectats->sexes_id = $request->input('sexes_id');

        try {
            $afectats->save();
            $response = (new AfectatsResource($afectats))
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
     * @param  \App\Models\Afectats  $afectats
     * @return \Illuminate\Http\Response
     */
    public function show(Afectats $afectats)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Afectats  $afectats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afectats $afectats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Afectats  $afectats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afectats $afectats)
    {
        //
    }
}
