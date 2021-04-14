<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HelpboxResource;
use App\Models\Helpbox;
use Illuminate\Http\Request;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helpbox  $helpbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helpbox $helpbox)
    {
        //
    }
}
