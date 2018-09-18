<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SaveGame;
use App\AvanceUser;
use App\Personaje;
use App\Enemigo;

class SavesGamesController extends Controller
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
        
        $avance_user = AvanceUser::find($user->id);
        $personajes = Personaje::all();
        $save_game = SaveGame::orderBy('id', 'asc')->where([['user_id', '=', $user->id], ['status', '=', 1]])->get()->last();
        //$enemigo = Enemigo::all()->get()->first();
        
        if (count($save_game) == 0) {
            $enemigo['id'] = 0;
            $enemigo['nombre_archivo'] = 'interrogante.jpg';
        } else {
            $enemigo = Enemigo::find($save_game->enemigo_id);
        }
        
        return view('saves_games.menu', ['enemigo' => $enemigo]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_saves_games()
    {
        //
        $auth = app()->make('auth');
        $user = $auth->user();

        if (count($user) == 0) {
            return redirect('/');
        }
        
        if (!SaveGame::newSaveGame($user->id)) {
            echo "No se pudo crear el avance del jugador";
        }

        return redirect('/load_saves_games');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function load_saves_games()
    {
        //
        $auth = app()->make('auth');
        $user = $auth->user();

        if (count($user) == 0) {
            return redirect('/');
        }
        
        $avance_user = AvanceUser::getPorcentajes($user->id);
        $personaje = Personaje::find($avance_user->personaje_id);
        $save_game = SaveGame::orderBy('id', 'asc')->where([['user_id', '=', $user->id], ['status', '=', 1]])->get()->last();
        $enemigo = Enemigo::find($save_game->enemigo_id);
        $enemigo_numero = substr($enemigo->nombre_archivo, 2, 2);
        
        return view('saves_games.battle', ['user' => $user, 'avance_user' => $avance_user, 'personaje' => $personaje, 'enemigo' => $enemigo, 'enemigo_numero' => $enemigo_numero, 'juego_tres_raya' => '1']);
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
        $auth = app()->make('auth');
        $user = $auth->user();

        if (count($user) == 0) {
            return redirect('/');
        }
        
        if (SaveGame::updateSaveGame($id, $request->enemigo_id, $request->ganador)) {
            if (isset($request['guardar_y_salir'])) {
                return redirect('/saves_games');
            } else 
            if (isset($request['button_continuar'])) {
                $enemigo_numero = $request->enemigo_numero;
                $avance_user = AvanceUser::find($id);
                $historias_finalizadas = $avance_user->historias_finalizadas;
                
                if ($historias_finalizadas == 0 && $enemigo_numero == 35 && $request->ganador == 1) {
                    return redirect('/saves_games');
                } else 
                if ($historias_finalizadas >= 1 && $enemigo_numero == 41 && $request->ganador == 1) {
                    return redirect('/saves_games');
                } else {
                    return redirect('/load_saves_games');
                }
                
            }
        } else {
            return redirect('/load_saves_games');
        }
        
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
