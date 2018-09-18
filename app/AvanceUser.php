<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvanceUser extends Model
{
    //
    public static function crearAvanceUser($user) {
    	$avance_user_creado = false;

    	for ($i=0; $i < 3 && $avance_user_creado == false; $i++) { 
    		$avance_user = new AvanceUser;

    		$avance_user->user_id = $user->id;
    		$avance_user->personajes_desbloqueados = 5;
    		$avance_user->rondas_ganadas = 0;
    		$avance_user->rondas_jugadas = 0;
    		$avance_user->personaje_id = 1;
    		$avance_user->enemigo_id = 1;
    		$avance_user->historias_finalizadas = 0;

    		if ($avance_user->save()) {
    			$avance_user_creado = true;
    		}
    	}

    	return $avance_user_creado;
    }

    //
    public static function getPorcentajes($user_id) {
    	$avance_user = AvanceUser::find($user_id);
		$batallas_totales = $avance_user->rondas_jugadas;
    	$nivel_jugador;
    	
    	if ($batallas_totales == 0) {
    		$porcentaje_batallas_ganadas = "0.00";
    		$porcentaje_batallas_perdidas = "0.00";
    	} else {
    		$porcentaje_batallas_ganadas = round((($avance_user->rondas_ganadas / $batallas_totales) * 100), 2);
    		$porcentaje_batallas_perdidas = (100 - $porcentaje_batallas_ganadas);
    	}

    	if ($avance_user->rondas_jugadas < 10) {
    		$nivel_jugador = 'Aun no se puede medir su nivel';
    	} else {
    		if ($porcentaje_batallas_ganadas < 15) {
    			$nivel_jugador = 'Muuuy Malo';
    		} else 
    		if ($porcentaje_batallas_ganadas < 35) {
    			$nivel_jugador = 'Malo';
    		} else 
    		if ($porcentaje_batallas_ganadas < 50) {
    			$nivel_jugador = 'Regular';
    		} else 
    		if ($porcentaje_batallas_ganadas < 75) {
    			$nivel_jugador = 'Bueno';
    		} else 
    		if ($porcentaje_batallas_ganadas < 90) {
    			$nivel_jugador = 'Muuuy Bueno';
    		} else {
    			$nivel_jugador = 'EL CALVITO CON CAPA';
    		}
    		
    	}

    	$avance_user->porcentaje_batallas_ganadas = $porcentaje_batallas_ganadas;
    	$avance_user->porcentaje_batallas_perdidas = $porcentaje_batallas_perdidas;
    	$avance_user->nivel_jugador = $nivel_jugador;

    	return $avance_user;
    }

    //
    public static function savePersonajeAvanceUser($user, $nuevo_personaje_id) {
    	$avance_user_save = false;
    	$avance_user = AvanceUser::find($user->id);
    	
    	for ($i=0; $i < 3 && $avance_user_save == false; $i++) { 
    		
    		$avance_user->personaje_id = $nuevo_personaje_id;
    		
    		if ($avance_user->save()) {
    			$avance_user_save = true;
    		}
    	}

    	return $avance_user_save;
    }



}
