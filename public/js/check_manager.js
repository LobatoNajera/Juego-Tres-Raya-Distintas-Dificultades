
function checkTutnCount(turn_value) {
	nuevo_turn_count = 0;

	for (var i = 0; i < 3; i++) {
		for (var j = 0; j < 3; j++) {
			
			if (array_board[i][j] == turn_value) {
				nuevo_turn_count++;
			}
		}
	}

	return nuevo_turn_count;
}

function checkCell(x, y) {
	ball = checkTutnCount(1);

	if (ball == 3) {
		if (array_board[x][y] == 1) {
			o_sellected_x = x;
			o_sellected_y = y;
			clearCell(x, y);
		} else {
			alert("Debes de seleccionar una casilla propia para desmarcarla.");
		}
	} else {
		selectCell(x, y);
	}
}

/* Inicio: Metodo para saber si se formo una linea en el tablero. */
function checkLine() {
	var ganador = false;

	if (checkRow(0, turn) == 3) {
		showMessage("3 en fila 1");
		ganador = true;
	} else 
	if (checkRow(1, turn) == 3) {
		showMessage("3 en fila 2");
		ganador = true;
	} else 
	if (checkRow(2, turn) == 3) {
		showMessage("3 en fila 3");
		ganador = true;
	} else 
	if (checkColumn(0, turn) == 3) {
		showMessage("3 en columna 1");
		ganador = true;
	} else 
	if (checkColumn(1, turn) == 3) {
		showMessage("3 en columna 2");
		ganador = true;
	} else 
	if (checkColumn(2, turn) == 3) {
		showMessage("3 en columna 3");
		ganador = true;
	} else 
	if (checkDiagonal(1, turn) == 3) {
		showMessage("3 en diagonal arriba a abajo de izquierda a derecha");
		ganador = true;
	} else 
	if (checkDiagonal(-1, turn) == 3) {
		showMessage("3 en diagonal arriba a abajo de derecha a izquierda");
		ganador = true;
	}

	return ganador;
}
/* Fin: Metodo para saber si se formo una linea en el tablero. */

function checkRow(x, value) {
	count_value = 0;

	for (var i = 0; i < 3; i++) {
		
		if (array_board[i][x] == value) {
			count_value++;
		}
	}

	return count_value;
}

function checkColumn(y, value) {
	count_value = 0;

	for (var i = 0; i < 3; i++) {
		
		if (array_board[y][i] == value) {
			count_value++;
		}
	}

	return count_value;
}

function checkDiagonal(d, value) {
	count_value = 0;

	if (array_board[(1+d)][0] == value) {
		count_value++;
	}
	if (array_board[1][1] == value) {
		count_value++;
	}
	if (array_board[(1-d)][2] == value) {
		count_value++;
	}
	
	return count_value;
}

function difMov(x, y) {
	diferent = false;

	if (turn == 1) {
		if (o_sellected_x != x || o_sellected_y != y) {
			diferent = true;
		}
	} else 
	if (turn == -1) {
		if (x_sellected_x != x || x_sellected_y != y) {
			diferent = true;
		}
	}

	return diferent;
}

// Nivel 2
/**/
function checkBlock(x, y) {
	if (checkRow(y,  1) == 2 && checkRow(y,  -1) == 1) {
		/* El juego se crachea cuando la dificultad es nivel 2 */
		ifCheckArrayBloqueadasValue(x, y);
		/* El juego se crachea cuando la dificultad es nivel 2 */
		return true;
	} else 
	if (checkColumn(x,  1) == 2 && checkColumn(x,  -1) == 1) {
		/* El juego se crachea cuando la dificultad es nivel 2 */
		ifCheckArrayBloqueadasValue(x, y);
		/* El juego se crachea cuando la dificultad es nivel 2 */
		return true;
	} else 
	if ((x == 0 && y == 2) || (x == 1 && y == 1) || (x == 2 && y == 0)) {
		if (checkDiagonal(1, 1) == 2  && checkDiagonal(1, -1) == 1) {
			/* El juego se crachea cuando la dificultad es nivel 2 */
			ifCheckArrayBloqueadasValue(x, y);
			/* El juego se crachea cuando la dificultad es nivel 2 */
			return true;
		}
	} else 
	if ((x == 0 && y == 0) || (x == 1 && y == 1) || (x == 2 && y == 2)) {
		if (checkDiagonal(-1, 1) == 2  && checkDiagonal(-1, -1) == 1) {
			/* El juego se crachea cuando la dificultad es nivel 2 */
			ifCheckArrayBloqueadasValue(x, y);
			/* El juego se crachea cuando la dificultad es nivel 2 */
			return true;
		}
	}
	
	return false;
}

/* El juego se crachea cuando la dificultad es nivel 2 */
function ifCheckArrayBloqueadasValue(x, y) {
	if (dificultad == 2) {
		if (checkArrayBloqueadasValueUnic(x, y)) {
			array_movimientos_bloqueados_x.push(x);
			array_movimientos_bloqueados_y.push(y);
		}
	}
}
/* El juego se crachea cuando la dificultad es nivel 2 */

/* El juego se crachea cuando la dificultad es nivel 2 */
function checkArrayBloqueadasValueUnic(x, y) {
	
	for (var i = 0; i < array_movimientos_bloqueados_x.length; i++) {
		if (array_movimientos_bloqueados_x[i] == x && array_movimientos_bloqueados_y[i] == y) {
			return false;
		}
	}

	return true;
}
/* El juego se crachea cuando la dificultad es nivel 2 */

