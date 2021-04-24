<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use App\Http\Resources\UsuarisResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $filtreNom = $request->nom;
        $filtreCognoms = $request->cognoms;


        $usuaris = Usuaris::where('nom','LIKE','%'.$filtreNom.'%')
                            ->where('cognoms','LIKE','%'.$filtreCognoms.'%')
                            ->get();

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
        $usuari = new Usuaris();

        $usuari->username = $request->input('username');
        $usuari->contrasenya = $request->input('contrasenya');
        $usuari->email = $request->input('email');
        $usuari->nom = $request->input('nom');
        $usuari->cognoms = $request->input('cognoms');
        $usuari->rols_id = $request->input('rols_id');
        $usuari->recursos_id = $request->input('recursos_id');

        try {
            $usuari->save();
            $response = (new UsuarisResource($usuari))
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
        $usuari->username = $request->input('username');
        $usuari->contrasenya = $request->input('contrasenya');
        $usuari->email = $request->input('email');
        $usuari->nom = $request->input('nom');
        $usuari->cognoms = $request->input('cognoms');
        $usuari->rols_id = $request->input('rols_id');
        $usuari->recursos_id = $request->input('recursos_id');


        try {
            $usuari->save();
            $response = (new UsuarisResource($usuari))
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
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuaris $usuari)
    {
        try {
            $usuari->delete();
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
