
var musica;

var arreglo_prefijos;
var visibility_change_musica;
var hidden_musica;

function validarJefe() {
	enemigo_numero = document.getElementById('enemigo_numero').value;
	
	if (enemigo_numero == 41) {
		musica = document.getElementById('musica');
		
		musicaPlay();
		musica.addEventListener('timeupdate', actualizarTiempo);

		arreglo_prefijos = getHidden();

		if (arreglo_prefijos) {
			hidden_musica = arreglo_prefijos[0];
			visibility_change_musica = arreglo_prefijos[1];
		}

		document.addEventListener(visibility_change_musica, manejadorVisibilidad, false);
		
	}
}

function musicaPlay() {
	musica.play();
}

function musicaPause() {
	musica.pause();
}

function actualizarTiempo() {
	var cancion_progreso = ((100 * musica.currentTime) / musica.duration);
	var duracion_total = ((100 * musica.duration) / musica.duration);
	
	if (cancion_progreso >= duracion_total) {
		musicaPlay();
	}
}

function manejadorVisibilidad() {
	if (document[hidden_musica]) {
		musicaPause();
		return ;
	} else {
		musicaPlay();
	}	
}

function getHidden() {
	var prefijos = ["webkit", "moz", "ms"];

	if ("hidden" in document) {
		return ["hidden", "visibilitychange"];
	}

	for (i in prefijos) {
		var prefijo = prefijos[i];
		var opcion = prefijo + "Hidden";
		var opcion_vs = prefijo + "visibilitychange";

		if (opcion in document) {
			return [opcion, opcion_vs];
		}

		return null;
	}

}



