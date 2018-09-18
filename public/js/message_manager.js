
function restartGame() {
	autoplay();
}

function hidde_message() {
	link_salir = document.getElementById('link_salir');
	panel_message = document.getElementById('message');
	
	panel_message.style.display = "none";
	link_salir.style.display = "block";
}

function showMessage(mensaje) {
	document.getElementById('ganador').value = turn;

	var string_notification = "";
	var string_button = "";
	var string_twitter = "";
	
	panel_message = document.getElementById('message');
	notification = document.getElementById('notification');
	link_salir = document.getElementById('link_salir');

	panel_message.style.display = "block";
	link_salir.style.display = "none";

	if (turn == 1) {
		img_winner.innerHTML = "<img src=imagen/" + o_imagen + "></img>";
		string_notification = "Ganaste :D";
		string_button = "Continuar";
		//alert("Felicidades!!... \nEl usuario a ganado.");
	} else {
		img_winner.innerHTML = "<img src=imagen/" + x_imagen + "></img>";
		string_notification = "Has Perdido";
		string_button = "Reintentar";
		//alert("Uuuy que feo!!... \nLa inteligencia artificial a ganado.");
	}

	notification.innerHTML = string_notification;
	button_end_game.innerHTML = string_button;
	
}

