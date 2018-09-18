<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveGame extends Model
{
    //
    public static function newSaveGame($user_id) {
    	$save_game_creado = false;
    	$avance_user = AvanceUser::find($user_id);

    	$save_game = SaveGame::orderBy('id', 'asc')->where([['user_id', '=', $user_id], ['status', '=', 1]])->get()->last();

    	if (count($save_game) == 0) {
    		$save_game = new SaveGame;
    	}
    	
    	for ($i=0; $i < 3 && $save_game_creado == false; $i++) { 
    		
    		$save_game->user_id = $user_id;
    		$save_game->personaje_id = $avance_user->personaje_id;
    		$save_game->enemigo_id = 1;
    		$save_game->status = 1;

    		if ($save_game->save()) {
    			$save_game_creado = true;
    		}
    	}

    	$user = User::find($user_id);
    	$nuevo_personaje_id = $user->personaje_id;
    	
    	return $save_game_creado;
    }

    //
    public static function updateSaveGame($user_id, $enemigo_id, $ganador) {
    	$save_game_actualizado = false;
    	$save_game = SaveGame::orderBy('id', 'asc')->where([['user_id', '=', $user_id], ['status', '=', 1]])->get()->last();
    	
    	$avance_user = AvanceUser::find($user_id);
    	$nuevo_rondas_jugadas = ($avance_user->rondas_jugadas + 1);
    	$nuevo_rondas_ganadas = ($avance_user->rondas_ganadas);
    	$historias_finalizadas = $avance_user->historias_finalizadas;

    	$enemigo = Enemigo::find($enemigo_id);
    	
    	$enemigo_numero = substr($enemigo->nombre_archivo, 2, 2);
    	$next_enemigo = Enemigo::getNextEnemigoId($historias_finalizadas, $enemigo_numero);
    	$next_enemigo_id = $enemigo_id;
    	$nuevo_enemigo_numero = substr($next_enemigo->nombre_archivo, 2, 2);
    	
    	if ($ganador == 1) {
    		$nuevo_rondas_ganadas = ($avance_user->rondas_ganadas + 1);
    		$next_enemigo_id = $next_enemigo->id;
    	}

    	SaveGame::personajeDesbloqueados($user_id, $avance_user->personajes_desbloqueados, $enemigo_numero, $nuevo_enemigo_numero);


    	if ($enemigo_numero == 35 && $nuevo_enemigo_numero == 11) {
    		$historias_finalizadas = ($historias_finalizadas + 1);
    	}

    	for ($i=0; $i < 3 && $save_game_actualizado == false; $i++) { 
    		$avance_user->rondas_jugadas = $nuevo_rondas_jugadas;
    		$avance_user->rondas_ganadas = $nuevo_rondas_ganadas;
    		$avance_user->historias_finalizadas = $historias_finalizadas;
    		$avance_user->save();

    		$save_game->enemigo_id = $next_enemigo_id;

    		if ($save_game->save()) {
    			$save_game_actualizado = true;
    		}
    	}

    	return $save_game_actualizado;
    }

    //
    public static function personajeDesbloqueados($user_id, $personajes_desbloqueados, $enemigo_numero, $nuevo_enemigo_numero) {

    	if ($personajes_desbloqueados == 5 && $enemigo_numero == 15 && $nuevo_enemigo_numero == 21) {
    		$update_avance_user = AvanceUser::find($user_id);
    		$update_avance_user->personajes_desbloqueados = 6;
    		$update_avance_user->save();
    	} else 
    	if ($personajes_desbloqueados == 6 && $enemigo_numero == 25 && $nuevo_enemigo_numero == 31) {
    		$update_avance_user = AvanceUser::find($user_id);
    		$update_avance_user->personajes_desbloqueados = 7;
    		$update_avance_user->save();
    	} else 
    	if ($personajes_desbloqueados == 7 && $enemigo_numero == 35 && $nuevo_enemigo_numero == 11) {
    		$update_avance_user = AvanceUser::find($user_id);
    		$update_avance_user->personajes_desbloqueados = 8;
    		$update_avance_user->save();
    	} else 
    	if ($personajes_desbloqueados == 8 && $enemigo_numero == 41 && $nuevo_enemigo_numero == 11) {
    		$update_avance_user = AvanceUser::find($user_id);
    		$update_avance_user->personajes_desbloqueados = 9;
    		$update_avance_user->save();
    	}

    }
    

}
