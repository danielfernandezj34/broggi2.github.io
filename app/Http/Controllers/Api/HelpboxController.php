<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HelpboxResource;
use App\Models\Helpbox;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class HelpboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helpbox = Helpbox::all();

        return HelpboxResource::collection($helpbox);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $helpbox = new Helpbox();

        $helpbox->preguntaES = $request->input('preguntaES');
        $helpbox->preguntaEN = $request->input('preguntaEN');

        try {
            $helpbox->save();
            $response = (new HelpboxResource($helpbox))
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
     * @param  \App\Models\Helpbox  $helpbox
     * @return \Illuminate\Http\Response
     */
    public function show(Helpbox $helpbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helpbox  $helpbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helpbox $helpbox)
    {
        $helpbox->preguntaES = $request->input('preguntaES');
        $helpbox->preguntaEN = $request->input('preguntaEN');

        try {
            $helpbox->save();
            $response = (new HelpboxResource($helpbox))
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
     * @param  \App\Models\Helpbox  $helpbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helpbox $helpbox)
    {
        try {
            $helpbox->delete();
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
