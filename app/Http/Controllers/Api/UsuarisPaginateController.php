<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use App\Http\Resources\UsuarisResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class UsuarisPaginateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $filtre = $request->buscador;
        $usuaris = Usuaris::where('nom','LIKE','%'.$filtre.'%')->paginate(6)->withQueryString();
        return UsuarisResource::collection($usuaris);

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
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function show(Usuaris $usuaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuaris $usuari)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuaris $usuari)
    {

    }
}
