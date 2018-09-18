<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AvanceUser;

class MainGameController extends Controller
{
    
    public function home()
    {
        //
        $auth = app()->make('auth');
        $user = $auth->user();
        
        if (count($user) == 0) {
            return view('main.sesion_no_iniciada');
        } else {
            $avance_user = AvanceUser::find($user->id);
            
            if (count($avance_user) == 0) {
                
                if (!AvanceUser::crearAvanceUser($user)) {
                    echo "No se pudo crear el jugador";
                } else {
                    $avance_user = AvanceUser::find($user->id);
                }

            }
        }

        return view('main.home', ['user' => $user, 'avance_user' => $avance_user]);
    }

}
