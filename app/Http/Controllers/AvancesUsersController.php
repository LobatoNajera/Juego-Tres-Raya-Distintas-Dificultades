<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AvanceUser;
use App\Personaje;

class AvancesUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth = app()->make('auth');
        $user = $auth->user();

        if (count($user) == 0) {
            return redirect('/');
        }
        
        $avance_user = AvanceUser::getPorcentajes($user->id);
        $personaje = Personaje::find($avance_user->personaje_id);

        return view('avances_users.menu', ['user' => $user, 'avance_user' => $avance_user, 'personaje' => $personaje]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seleccionar_personaje(Request $request)
    {
        //
        $auth = app()->make('auth');
        $user = $auth->user();

        if (count($user) == 0) {
            return redirect('/');
        }
        
        $avance_user = AvanceUser::find($user->id);
        $personajes = Personaje::all();
        $personaje_id = $request->personaje_id;
        
        return view('avances_users.seleccionar_personaje', ['user' => $user, 'avance_user' => $avance_user, 'personajes' => $personajes, 'personaje_id' => $personaje_id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_personaje_seleccionado(Request $request)
    {
        //
        $auth = app()->make('auth');
        $user = $auth->user();

        if (count($user) == 0) {
            return redirect('/');
        }
        
        if (AvanceUser::savePersonajeAvanceUser($user, $request->nuevo_personaje_id)) {
            return redirect('/avances_users');
        }

        $avance_user = AvanceUser::find($user->id);
        $personajes = Personaje::all();
        $personaje_id = $request->personaje_id;
        
        return view('avances_users.seleccionar_personaje', ['user' => $user, 'avance_user' => $avance_user, 'personajes' => $personajes, 'personaje_id' => $personaje_id]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
