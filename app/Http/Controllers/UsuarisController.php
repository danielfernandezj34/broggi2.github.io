<?php

namespace App\Http\Controllers;
use App\Models\Rols;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarisController extends Controller
{

    public function mostrarLogin(){
        return view('usuari.login');
    }

    public function login(Request $request)
    {
        $nomuser = $request->input('usuari');
        $contrasenya = $request->input('contrasenya');

        $usuari = Usuaris::where('username', $nomuser)->first();

        if($usuari != null && Hash::check($contrasenya, $usuari->contrasenya)){
            Auth::login($usuari);
            if($usuari->rols_id == 1){
                $resposta = redirect('./principal_administrador');
            }else if ($usuari->rols_id == 2){
                $resposta = redirect('./principal_administratiu');
            }else if($usuari->rols_id == 3){
                $resposta = redirect('./principal_recursos');
            }
        }else{
            $request->session()->flash('error', 'Usuari o contrasenya incorrectes');
            $resposta = redirect('/')->withInput();
        }
        return $resposta;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuaris $usuaris)
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
    public function update(Request $request, Usuaris $usuaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuaris $usuaris)
    {
        //
    }
}
