<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use Illuminate\Http\Request;
use App\Http\Resources\RecursosResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class RecursosPaginateController extends Controller
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
            $recursos =  Recursos::where('codi', '=', $filtreCodiRecurs) ->paginate(6)->withQueryString();;
        }else{
            if($filtreidTipusRecurs == ''){
                if($filtreActiu == ''){
                        $recursos = Recursos::paginate(6);
                }else{
                        $recursos = Recursos::where('actiu', '=', $filtreActiu) ->paginate(6)->withQueryString();;
                }
            }else{
                    if($filtreActiu == ''){
                        $recursos = Recursos::where('tipus_recursos_id', '=', $filtreidTipusRecurs) ->paginate(6)->withQueryString();;
                    }else{
                        $recursos = Recursos::where('tipus_recursos_id', '=', $filtreidTipusRecurs)
                                            ->where('actiu', '=', $filtreActiu) ->paginate(6)->withQueryString();;
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recursos $recurso)
    {

    }
}

