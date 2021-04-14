<?php

namespace App\Http\Controllers;

use App\Models\HelpBox;
use Illuminate\Http\Request;
use App\Http\Resources\HelpboxResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class HelpBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pregunta = new Helpbox();

        $pregunta->preguntaES = $request->input('preguntaES');
        $pregunta->preguntaEN = $request->input('preguntaEN');

        try {
            $pregunta->save();
            $response = (new HelpboxResource($pregunta))
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
     * @param  \App\Models\HelpBox  $helpBox
     * @return \Illuminate\Http\Response
     */
    public function show(HelpBox $helpBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpBox  $helpBox
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpBox $helpBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HelpBox  $helpBox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpBox $helpBox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpBox  $helpBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpBox $helpBox)
    {
        //
    }
}
