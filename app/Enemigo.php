<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enemigo extends Model
{
    //
    public static function getNextEnemigoId($historias_finalizadas, $enemigo_numero) {
    	$nombre_archivo = "";

        if ($enemigo_numero == 35 && $historias_finalizadas == 0) {
            $nombre_archivo = "x_11.jpg";
        } else 
    	if (substr($enemigo_numero, 0, 1) == 4) {
    		$nombre_archivo = "x_11.jpg";
    	} else 
    	if (substr($enemigo_numero, 1, 1) == 5) {
    		$nombre_archivo = "x_".((substr($enemigo_numero, 0, 1) + 1) . "1.jpg");
    	} else  {
    		$nombre_archivo = "x_".($enemigo_numero + 1).".jpg";
    	}
        
    	$next_enemigo = Enemigo::where('nombre_archivo', '=', $nombre_archivo)->get()->last();

    	return $next_enemigo;
    }

    
}
