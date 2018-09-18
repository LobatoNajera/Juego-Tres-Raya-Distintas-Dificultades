
var array_board = new Array(3);
var turn;

var o_sellected_x;
var o_sellected_y;

var x_sellected_x;
var x_sellected_y;

var o_imagen = "o_01.gif";
var x_imagen = "x_11.jpg";

var dificultad;

window.addEventListener('load', init, false);

function init() {
	o_imagen = document.getElementById('personaje_nombre_archivo').value;
	x_imagen = document.getElementById('enemigo_nombre_archivo').value;
	dificultad = document.getElementById('dificultad').value;

	button_end_game = document.getElementById('button_continuar');
	//button_end_game.addEventListener('click', restartGame, false);

	img_winner = document.getElementById('img_winner');

	c02 = document.getElementById('c02');
	c12 = document.getElementById('c12');
	c22 = document.getElementById('c22');
	c01 = document.getElementById('c01');
	c11 = document.getElementById('c11');
	c21 = document.getElementById('c21');
	c00 = document.getElementById('c00');
	c10 = document.getElementById('c10');
	c20 = document.getElementById('c20');
	
	c02.addEventListener('click', function() { checkCell(0, 2); }, false);
	c12.addEventListener('click', function() { checkCell(1, 2); }, false);
	c22.addEventListener('click', function() { checkCell(2, 2); }, false);
	c01.addEventListener('click', function() { checkCell(0, 1); }, false);
	c11.addEventListener('click', function() { checkCell(1, 1); }, false);
	c21.addEventListener('click', function() { checkCell(2, 1); }, false);
	c00.addEventListener('click', function() { checkCell(0, 0); }, false);
	c10.addEventListener('click', function() { checkCell(1, 0); }, false);
	c20.addEventListener('click', function() { checkCell(2, 0); }, false);

	autoplay();
}

/* Inicio: Metodo para limpiar una celda */
function clearCell(x, y) {
	array_board[x][y] = 0;

	cell = document.getElementById('c' + x + y);
	cell.innerHTML = '';
}
/* Fin: Metodo para limpiar una celda */

/* Inicio: Metodo para recorrer las celdas */
function clearBoard() {
	for (var i = 0; i < 3; i++) {
		for (var j = 0; j < 3; j++) {
			clearCell(i, j);
		}
	}
}
/* Fin: Metodo para recorrer las celdas */

function autoplay() {
	hidde_message();
	validarJefe();

	for (var i = 0; i < array_board.length; i++) {
		array_board[i] = new Array(3);
	}

	/* 
	board:
	celda vacia = 0  |  celda circulo = 1  |  celda equis = -1

	turn:
	-1 = maquina  |  1 = jugador
	 */

	o_sellected_x = 3;
	o_sellected_y = 3;

	x_sellected_x = 3;
	x_sellected_y = 3;

	turn = -1;

	clearBoard();
	
	if (dificultad >= 3) {
		searchMove();
	} else {
		turn = 1;
	}

}

function paintCell(x, y) {
	cell = document.getElementById('c' + x + y);
	
	if (turn == 1) {
		o_sellected_x = x;
		o_sellected_y = y;
		cell.innerHTML = "<img src=imagen/" + o_imagen + "></img>";
	} else
	if (turn == -1) {
		x_sellected_x = x;
		x_sellected_y = y;
		cell.innerHTML = "<img src=imagen/" + x_imagen + "></img>";
	}

	array_board[x][y] = turn;
	
	if (!checkLine()) {
		turn = turn * -1;

		if (turn == -1) {
			searchMove();
		}
	}
	
}

function selectCell(x, y) {
	if (array_board[x][y] == 0) {
		if (difMov(x, y)) {
			paintCell(x, y);
		} else {
			alert("No se puede seleccionar la misma casilla que has deseleccionado");
		}
	} else {
		alert("La casilla seleccionada ya contiene un valor");
	}
}






