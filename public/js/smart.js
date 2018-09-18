
/* El juego se crachea cuando la dificultad es nivel 2 */
var array_movimientos_bloqueados_x;
var array_movimientos_bloqueados_y;
/* El juego se crachea cuando la dificultad es nivel 2 */

function searchMove() {
	crosses = checkTutnCount(-1);
	
	if (crosses >= 1) {
		var complete = false;

		if (dificultad >= 3) {
			//Formar linea IA
			for (var i = 0; i < 3; i++) {
				if (completeRow(i, -1)) {
					complete = true;
					break;
				}
				if (completeColumn(i, -1)) {
					complete = true;
					break;
				}
			}
			
			if (complete == false) {
				complete = completeDiagonal(1, -1);
			}
			if (complete == false) {
				complete = completeDiagonal(-1, -1);
			}
		}
		
		if (dificultad >= 2) {
			//Bloquear linea del Usuario
			if (complete == false) {
				for (var i = 0; i < 3; i++) {
					if (completeRow(i, 1)) {
						complete = true;
						break;
					}
					if (completeColumn(i, 1)) {
						complete = true;
						break;
					}
				}
			}
			
			if (complete == false) {
				complete = completeDiagonal(1, 1);
			}
			if (complete == false) {
				complete = completeDiagonal(-1, 1);
			}
		}
		
		if (complete == false) {
			//Sino se realizo nada de lo anterior entonces
			
			if (dificultad >= 4 && crosses == 1) {
				/* Dificultad legendaria */
				segundoMovimiento();
				/* Dificultad legendaria */
			} else 
			if (dificultad >= 4 && crosses == 2) {
				/* Dificultad legendaria */
				tercerMovimiento();
				/* Dificultad legendaria */
			} else {
				if (dificultad >= 4 && crosses == 3) {
					/* Dificultad legendaria */
					if (adelantarJugada()) {
					/* Dificultad legendaria */
					} else {
						if (crosses == 3) {
							findFichaNoBloqueda();
						}

						randomMove();
					}
				} else {
					if (crosses == 3) {
						findFichaNoBloqueda();
					}

					randomMove();
				}
			}

		}
	} else {

		if (dificultad >= 4) {
			/* Dificultad legendaria */
			primerMovimiento();
			/* Dificultad legendaria */
		} else {
			randomMove();
		}
	}
	
}

function randomMove() {
	cell_available = false;
	var x;
	var y;

	while (cell_available == false) {
		x = Math.round(Math.random() * 2);
		y = Math.round(Math.random() * 2);

		if (array_board[x][y] == 0 && difMov(x, y)) {
			cell_available = true;
		}
	}

	paintCell(x, y);
}


function completeRow(x, turn_value) {
	//Si hay 2 en linea
	if (checkRow(x, turn_value) == 2) {
		//Buscar cual casilla falta para completar
		find_final = false;
		var find_final_x;
		var find_final_y;
		
		for (var i = 0; i < 3; i++) {
			if (array_board[i][x] == 0) {
				find_final = true;
				find_final_x = i;
				find_final_y = x;
				break;
			}
		}

		//Si esta vacia
		if (find_final) {
			
			//Si hay 3 fichas
			if (checkTutnCount(turn) == 3) {
			//if (checkTutnCount(turn_value) == 3) {
				
				//Preguntar de quien queremos completar la linea
				if (turn_value == -1) {
				//Si es la maquina -> armar linea
					//Buscamos la ficha de la IA perdida
					var find_lost = false;
					var find_lost_x;
					var find_lost_y;
					
					for (var i = 0; i < 3 && find_lost == false; i++) {
						if (i != x) {
							for (var j = 0; j < 3 && find_lost == false; j++) {
								if (array_board[j][i] == -1) {
									find_lost = true;
									find_lost_x = j;
									find_lost_y = i;
								}
							}
						}
					}

					//Se borra la ficha perdida de la IA
					clearCell(find_lost_x, find_lost_y);
					
				} else {
				//Sino -> bloquemos la linea del Usuario
					
					//Buscamos una ficha de la maquina que no bloquea
					//La borramos
					findFichaNoBloqueda();
				}
			}
			
			//Pintar la casilla final
			paintCell(find_final_x, find_final_y);
			//Retornar un true
			return true;
		} else {
		//Sino retornar false
			return false;
		}
		
	} else {
	//Sino retornamos false
		return false;
	}	
}

function completeColumn(x, turn_value) {
	//Si hay 2 en linea
	if (checkColumn(x, turn_value) == 2) {
		//Buscar cual casilla falta para completar
		find_final = false;
		var find_final_x;
		var find_final_y;
		
		for (var i = 0; i < 3; i++) {
			if (array_board[x][i] == 0) {
				find_final = true;
				find_final_x = x;
				find_final_y = i;
				break;
			}
		}

		//Si esta vacia
		if (find_final) {
			
			//Si hay 3 fichas
			if (checkTutnCount(turn) == 3) {
			//if (checkTutnCount(turn_value) == 3) {
				
				//Preguntar de quien queremos completar la linea
				if (turn_value == -1) {
				//Si es la maquina -> armar linea
					//Buscamos la ficha de la IA perdida
					var find_lost = false;
					var find_lost_x;
					var find_lost_y;
					
					for (var i = 0; i < 3 && find_lost == false; i++) {
						if (i != x) {
							for (var j = 0; j < 3 && find_lost == false; j++) {
								if (array_board[i][j] == -1) {
									find_lost = true;
									find_lost_x = i;
									find_lost_y = j;
								}
							}
						}
					}

					//Se borra la ficha perdida de la IA
					clearCell(find_lost_x, find_lost_y);
					
				} else {
				//Sino -> bloquemos la linea del Usuario
					
					//Buscamos una ficha de la maquina que no bloquea
					//La borramos
					findFichaNoBloqueda();
				}
			}
			
			//Pintar la casilla final
			paintCell(find_final_x, find_final_y);
			//Retornar un true
			return true;
		} else {
		//Sino retornar false
			return false;
		}
		
	} else {
	//Sino retornamos false
		return false;
	}
}

function completeDiagonal(x, turn_value) {
	//Si hay 2 en linea
	if (checkDiagonal(x, turn_value) == 2) {
		//Buscar cual casilla falta para completar
		find_final = false;
		var find_final_x;
		var find_final_y;
		
		if (array_board[1][1] == 0) {
			find_final = true;
			find_final_x = 1;
			find_final_y = 1;
		} else 
		if (array_board[(1 - x)][2] == 0) {
			find_final = true;
			find_final_x = (1 - x);
			find_final_y = 2;
		} else 
		if (array_board[(1 + x)][0] == 0) {
			find_final = true;
			find_final_x = (1 + x);
			find_final_y = 0;
		} 
		
		//Si esta vacia
		if (find_final) {
			
			//Si hay 3 fichas
			if (checkTutnCount(turn) == 3) {
			//if (checkTutnCount(turn_value) == 3) {
				
				//Preguntar de quien queremos completar la linea
				if (turn_value == -1) {
				//Si es la maquina -> armar linea
					//Buscamos la ficha de la IA perdida
					var find_lost = false;
					var find_lost_x;
					var find_lost_y;
					
					for (var i = 0; i < 3 && find_lost == false; i++) {
						for (var j = 0; j < 3 && find_lost == false; j++) {
							if (( (i != 1 || j != 1) && (i != (1 - x) || j != 2)  && (i != (1 + x) || j != 0) ) && array_board[j][i] == -1) {
								find_lost = true;
								find_lost_x = j;
								find_lost_y = i;
							}
						}
					}

					//Se borra la ficha perdida de la IA
					clearCell(find_lost_x, find_lost_y);
					
				} else {
				//Sino -> bloquemos la linea del Usuario
					
					//Buscamos una ficha de la maquina que no bloquea
					//La borramos
					findFichaNoBloqueda();
				}
			}
			
			//Pintar la casilla final
			paintCell(find_final_x, find_final_y);
			//Retornar un true
			return true;
		} else {
		//Sino retornar false
			return false;
		}
		
	} else {
	//Sino retornamos false
		return false;
	}
}

function findFichaNoBloqueda() {
	cell_find = false;
	var x;
	var y;

	/* El juego se crachea cuando la dificultad es nivel 2 */
	if (dificultad == 2) {
		array_movimientos_bloqueados_x = new Array();
		array_movimientos_bloqueados_y = new Array();
	}
	/* El juego se crachea cuando la dificultad es nivel 2 */
	
	if (dificultad >= 4) {
		/* Dificultad legendaria */
		
		/* Dificultad legendaria */
	}

	while (cell_find == false) {
		x = Math.round(Math.random() * 2);
		y = Math.round(Math.random() * 2);

		if (array_board[x][y] == -1 && checkBlock(x, y) == false) {
			cell_find = true;
		}

		/* El juego se crachea cuando la dificultad es nivel 2 */
		if (dificultad == 2 && array_movimientos_bloqueados_x.length == 3) {
			cell_find = true;
		}
		/* El juego se crachea cuando la dificultad es nivel 2 */
	}

	x_sellected_x = x;
	x_sellected_y = y;

	clearCell(x, y);
}

