<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use Illuminate\Http\Request;
use App\Http\Resources\RecursosResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class RecursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtreidTipusRecurs = $request->idTipusRecurs;
        $filtreActiu = $request->actiu;
        $filtreCodiRecurs = $request->codiRecurs;
        if($filtreCodiRecurs != ''){
            $recursos =  Recursos::where('codi', '=', $filtreCodiRecurs)->get();
        }else{
            if($filtreidTipusRecurs == ''){
                if($filtreActiu == ''){
                        $recursos = Recursos::all();
                }else{
                        $recursos = Recursos::where('actiu', '=', $filtreActiu)->get();
                }
            }else{
                    if($filtreActiu == ''){
                        $recursos = Recursos::where('tipus_recursos_id', '=', $filtreidTipusRecurs)->get();
                    }else{
                        $recursos = Recursos::where('tipus_recursos_id', '=', $filtreidTipusRecurs)
                                            ->where('actiu', '=', $filtreActiu)->get();
                    }
            }
        }

        return RecursosResource::collection($recursos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recurso = new Recursos();

        $recurso->codi = $request->input('codi');
        $recurso->actiu = ($request->input('actiu') == 'actiu');
        $recurso->tipus_recursos_id = $request->input('tipus_recursos_id');

        try {
            $recurso->save();
            $response = (new RecursosResource($recurso))
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
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function show(Recursos $recursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recursos $recurso)
    {
        $recurso->codi = $request->input('codi');
        $recurso->actiu = $request->input('actiu');
        $recurso->tipus_recursos_id = $request->input('tipus_recursos_id');


        try {
            $recurso->save();
            $response = (new RecursosResource($recurso))
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
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recursos $recurso)
    {
        try {
            $recurso->delete();
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

