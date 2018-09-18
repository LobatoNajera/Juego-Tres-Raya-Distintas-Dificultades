
var numero_primer_movimiento;
var numero_segundo_movimiento = -1;

function primerMovimiento() {
	var array_primer_movimiento_x = new Array();
	var array_primer_movimiento_y = new Array();

	array_primer_movimiento_x.push(0);
	array_primer_movimiento_y.push(0);

	array_primer_movimiento_x.push(0);
	array_primer_movimiento_y.push(2);

	array_primer_movimiento_x.push(2);
	array_primer_movimiento_y.push(0);

	array_primer_movimiento_x.push(2);
	array_primer_movimiento_y.push(2);

	numero_primer_movimiento = Math.round(Math.random() * 3);

	paintCell(array_primer_movimiento_x[numero_primer_movimiento], array_primer_movimiento_y[numero_primer_movimiento]);
}

function segundoMovimiento() {
	if (numero_primer_movimiento == 0) {
		if (array_board[2][2] == 0) {
			paintCell(2, 2);
		} else {
			numero_segundo_movimiento = (Math.round(Math.random() * 1));
			if (numero_segundo_movimiento == 0) {
				paintCell(2, 0);
			} else {
				paintCell(0, 2);
			}
		}
	} else 
	if (numero_primer_movimiento == 1) {
		if (array_board[2][0] == 0) {
			paintCell(2, 0);
		} else {
			numero_segundo_movimiento = (Math.round(Math.random() * 1) + 2);
			if (numero_segundo_movimiento == 2) {
				paintCell(0, 0);
			} else {
				paintCell(2, 2);
			}
		}
	} else 
	if (numero_primer_movimiento == 2) {
		if (array_board[0][2] == 0) {
			paintCell(0, 2);
		} else {
			numero_segundo_movimiento = (Math.round(Math.random() * 1) + 4);
			if (numero_segundo_movimiento == 4) {
				paintCell(2, 2);
			} else {
				paintCell(0, 0);
			}
		}
	} else 
	if (numero_primer_movimiento == 3) {
		if (array_board[0][0] == 0) {
			paintCell(0, 0);
		} else {
			numero_segundo_movimiento = (Math.round(Math.random() * 1) + 6);
			if (numero_segundo_movimiento == 6) {
				paintCell(0, 2);
			} else {
				paintCell(2, 0);
			}
		}
	}
}

function tercerMovimiento() {
	var mover_aleatoriamente = false;

	if (numero_segundo_movimiento == -1) {
		if (numero_primer_movimiento == 0) {
			if (array_board[2][0] == 0) {
				paintCell(2, 0);
			} else 
			if (array_board[0][2] == 0) {
				paintCell(0, 2);
			} else {
				mover_aleatoriamente = true;
			}
			
		} else 
		if (numero_primer_movimiento == 1) {
			if (array_board[0][0] == 0) {
				paintCell(0, 0);
			} else 
			if (array_board[2][2] == 0) {
				paintCell(2, 2);
			} else {
				mover_aleatoriamente = true;
			}
			
		} else 
		if (numero_primer_movimiento == 2) {
			if (array_board[2][2] == 0) {
				paintCell(2, 2);
			} else 
			if (array_board[0][0] == 0) {
				paintCell(0, 0);
			} else {
				mover_aleatoriamente = true;
			}
			
		} else 
		if (numero_primer_movimiento == 3) {
			if (array_board[0][2] == 0) {
				paintCell(0, 2);
			} else 
			if (array_board[2][0] == 0) {
				paintCell(2, 0);
			} else {
				mover_aleatoriamente = true;
			}
			
		}

	} else 
	if (numero_segundo_movimiento == 0 || numero_segundo_movimiento == 7) {
		if (array_board[0][2] == 0) {
			paintCell(0, 2);
		} else {
			mover_aleatoriamente = true;
		}
		
	} else 
	if (numero_segundo_movimiento == 1 || numero_segundo_movimiento == 6) {
		if (array_board[2][0] == 0) {
			paintCell(2, 0);
		} else {
			mover_aleatoriamente = true;
		}
		
	} else 
	if (numero_segundo_movimiento == 2 || numero_segundo_movimiento == 5) {
		if (array_board[2][2] == 0) {
			paintCell(2, 2);
		} else {
			mover_aleatoriamente = true;
		}
		
	} else 
	if (numero_segundo_movimiento == 3 || numero_segundo_movimiento == 4) {
		if (array_board[0][0] == 0) {
			paintCell(0, 0);
		} else {
			mover_aleatoriamente = true;
		}
		
	}

	if (mover_aleatoriamente) {
		randomMove();
	}
}


function adelantarJugada() {
	var adelanto_jugada = false;
	
	/* Adelantar jugada para ganar */
	adelanto_jugada = adelantarJugadaGanar();

	/* Adelantar jugada para evitar la derrota */
	if (!adelanto_jugada) {
		adelanto_jugada = adelantarJugadaBloquear();
	}
	
	return adelanto_jugada;
}

function adelantarJugadaGanar() {
	
/*-------------------------- Ganar 1 ---------------------------*/
	if (array_board[0][1] == -1 && array_board[1][0] == -1 && array_board[2][2] == -1) {
		if (array_board[0][0] == 1 && array_board[2][0] == 1 && array_board[2][1] == 1) {
			clearCell(0, 1);
			paintCell(1, 2);
			return true;
		}
	}

	if (array_board[1][2] == -1 && array_board[0][1] == -1 && array_board[2][0] == -1) {
		if (array_board[0][2] == 1 && array_board[0][0] == 1 && array_board[1][0] == 1) {
			clearCell(1, 2);
			paintCell(2, 1);
			return true;
		}
	}

	if (array_board[2][1] == -1 && array_board[1][2] == -1 && array_board[0][0] == -1) {
		if (array_board[2][2] == 1 && array_board[0][2] == 1 && array_board[0][1] == 1) {
			clearCell(2, 1);
			paintCell(1, 0);
			return true;
		}
	}

	if (array_board[1][0] == -1 && array_board[2][1] == -1 && array_board[0][2] == -1) {
		if (array_board[2][0] == 1 && array_board[2][2] == 1 && array_board[1][2] == 1) {
			clearCell(1, 0);
			paintCell(0, 1);
			return true;
		}
	}

	if (array_board[0][1] == -1 && array_board[1][2] == -1 && array_board[2][0] == -1) {
		if (array_board[0][2] == 1 && array_board[2][1] == 1 && array_board[2][2] == 1) {
			clearCell(0, 1);
			paintCell(1, 0);
			return true;
		}
	}
	
	if (array_board[1][2] == -1 && array_board[2][1] == -1 && array_board[0][0] == -1) {
		if (array_board[2][2] == 1 && array_board[1][0] == 1 && array_board[2][0] == 1) {
			clearCell(1, 2);
			paintCell(0, 1);
			return true;
		}
	}
	
	if (array_board[2][1] == -1 && array_board[1][0] == -1 && array_board[0][2] == -1) {
		if (array_board[2][0] == 1 && array_board[0][1] == 1 && array_board[0][0] == 1) {
			clearCell(2, 1);
			paintCell(1, 2);
			return true;
		}
	}
	
	if (array_board[1][0] == -1 && array_board[0][1] == -1 && array_board[2][2] == -1) {
		if (array_board[0][0] == 1 && array_board[0][2] == 1 && array_board[1][2] == 1) {
			clearCell(1, 0);
			paintCell(2, 1);
			return true;
		}
	}
	
/*-------------------------- Ganar 2 ---------------------------*/
	if (array_board[2][1] == -1 && array_board[0][0] == -1 && array_board[0][2] == -1) {
		if (array_board[0][1] == 1 && array_board[1][2] == 1 && array_board[2][2] == 1) {
			clearCell(2, 1);
			paintCell(2, 0);
			return true;
		} else 
		if (array_board[0][1] == 1 && array_board[1][0] == 1 && array_board[2][0] == 1) {
			clearCell(2, 1);
			paintCell(2, 2);
			return true;
		}
	}

	if (array_board[1][0] == -1 && array_board[0][2] == -1 && array_board[2][2] == -1) {
		if (array_board[1][2] == 1 && array_board[2][1] == 1 && array_board[2][0] == 1) {
			clearCell(1, 0);
			paintCell(0, 0);
			return true;
		} else 
		if (array_board[1][2] == 1 && array_board[0][1] == 1 && array_board[0][0] == 1) {
			clearCell(1, 0);
			paintCell(2, 0);
			return true;
		}
	}

	if (array_board[0][1] == -1 && array_board[2][2] == -1 && array_board[2][0] == -1) {
		if (array_board[2][1] == 1 && array_board[1][0] == 1 && array_board[0][0] == 1) {
			clearCell(0, 1);
			paintCell(0, 2);
			return true;
		} else 
		if (array_board[2][1] == 1 && array_board[1][2] == 1 && array_board[0][2] == 1) {
			clearCell(0, 1);
			paintCell(0, 0);
			return true;
		}
	}

	if (array_board[1][2] == -1 && array_board[2][0] == -1 && array_board[0][0] == -1) {
		if (array_board[1][0] == 1 && array_board[0][1] == 1 && array_board[0][2] == 1) {
			clearCell(1, 2);
			paintCell(2, 2);
			return true;
		} else 
		if (array_board[1][0] == 1 && array_board[2][1] == 1 && array_board[2][2] == 1) {
			clearCell(1, 2);
			paintCell(0, 2);
			return true;
		}
	}

/*-------------------------- Ganar 3 ---------------------------*/
	if (array_board[0][2] == -1 && array_board[2][1] == -1 && array_board[1][0] == -1) {
		if (array_board[1][1] == 1 && array_board[1][2] == 1 && array_board[0][1] == 1) {
			clearCell(0, 2);
			paintCell(2, 0);
			return true;
		}
	}

	if (array_board[2][2] == -1 && array_board[1][0] == -1 && array_board[0][1] == -1) {
		if (array_board[1][1] == 1 && array_board[2][1] == 1 && array_board[1][2] == 1) {
			clearCell(2, 2);
			paintCell(0, 0);
			return true;
		}
	}

	if (array_board[2][0] == -1 && array_board[0][1] == -1 && array_board[1][2] == -1) {
		if (array_board[1][1] == 1 && array_board[1][0] == 1 && array_board[2][1] == 1) {
			clearCell(2, 0);
			paintCell(0, 2);
			return true;
		}
	}

	if (array_board[0][0] == -1 && array_board[1][2] == -1 && array_board[2][1] == -1) {
		if (array_board[1][1] == 1 && array_board[0][1] == 1 && array_board[1][0] == 1) {
			clearCell(0, 0);
			paintCell(2, 2);
			return true;
		}
	}

	return false;
}

function adelantarJugadaBloquear() {
	
/*-------------------------- Bloquear 1 ---------------------------*/
	if (array_board[0][1] == 1 && array_board[2][0] == 1 && array_board[2][2] == 1) {
		if (array_board[0][2] == -1 && array_board[2][1] == -1 && array_board[1][0] == -1) {
			clearCell(0, 2);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[0][0] == -1 && array_board[1][2] == -1 && array_board[2][1] == -1) {
			clearCell(0, 0);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[1][2] == 1 && array_board[0][0] == 1 && array_board[2][0] == 1) {
		if (array_board[2][2] == -1 && array_board[1][0] == -1 && array_board[0][1] == -1) {
			clearCell(2, 2);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[0][2] == -1 && array_board[2][1] == -1 && array_board[1][0] == -1) {
			clearCell(0, 2);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[2][1] == 1 && array_board[0][2] == 1 && array_board[0][0] == 1) {
		if (array_board[2][0] == -1 && array_board[0][1] == -1 && array_board[1][2] == -1) {
			clearCell(2, 0);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[2][2] == -1 && array_board[1][0] == -1 && array_board[0][1] == -1) {
			clearCell(2, 2);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[1][0] == 1 && array_board[2][2] == 1 && array_board[0][2] == 1) {
		if (array_board[0][0] == -1 && array_board[1][2] == -1 && array_board[2][1] == -1) {
			clearCell(0, 0);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[2][0] == -1 && array_board[0][1] == -1 && array_board[1][2] == -1) {
			clearCell(2, 0);
			paintCell(1, 1);
			return true;
		}
	}

/*-------------------------- Bloquear 2 ---------------------------*/
	if (array_board[0][2] == 1 && array_board[1][0] == 1 && array_board[2][1] == 1) {
		if (array_board[1][1] == -1 && array_board[0][1] == -1 && array_board[1][2] == -1) {
			clearCell(1, 1);
			paintCell(2, 0);
			return true;
		}
	}

	if (array_board[2][2] == 1 && array_board[0][1] == 1 && array_board[1][0] == 1) {
		if (array_board[1][1] == -1 && array_board[0][2] == -1 && array_board[2][1] == -1) {
			clearCell(1, 1);
			paintCell(0, 0);
			return true;
		}
	}

	if (array_board[2][0] == 1 && array_board[1][2] == 1 && array_board[0][1] == 1) {
		if (array_board[1][1] == -1 && array_board[2][1] == -1 && array_board[1][0] == -1) {
			clearCell(1, 1);
			paintCell(0, 2);
			return true;
		}
	}

	if (array_board[0][0] == 1 && array_board[2][1] == 1 && array_board[1][2] == 1) {
		if (array_board[1][1] == -1 && array_board[1][0] == -1 && array_board[0][1] == -1) {
			clearCell(1, 1);
			paintCell(2, 2);
			return true;
		}
	}

/*-------------------------- Bloquear 3 ---------------------------*/
	if (array_board[0][0] == 1 && array_board[2][1] == 1 && array_board[1][2] == 1) {
		if (array_board[0][1] == -1 && array_board[0][2] == -1 && array_board[2][2] == -1) {
			clearCell(0, 1);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[1][0] == -1 && array_board[2][2] == -1 && array_board[2][0] == -1) {
			clearCell(1, 0);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[2][0] == 1 && array_board[1][2] == 1 && array_board[0][1] == 1) {
		if (array_board[1][0] == -1 && array_board[0][0] == -1 && array_board[0][2] == -1) {
			clearCell(1, 0);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[2][1] == -1 && array_board[0][2] == -1 && array_board[2][2] == -1) {
			clearCell(2, 1);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[2][2] == 1 && array_board[0][1] == 1 && array_board[1][0] == 1) {
		if (array_board[2][1] == -1 && array_board[2][0] == -1 && array_board[0][0] == -1) {
			clearCell(2, 1);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[1][2] == -1 && array_board[0][0] == -1 && array_board[0][2] == -1) {
			clearCell(1, 2);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[0][2] == 1 && array_board[1][0] == 1 && array_board[2][1] == 1) {
		if (array_board[1][2] == -1 && array_board[2][2] == -1 && array_board[2][0] == -1) {
			clearCell(1, 2);
			paintCell(1, 1);
			return true;
		} else 
		if (array_board[1][0] == -1 && array_board[2][2] == -1 && array_board[2][0] == -1) {
			clearCell(1, 0);
			paintCell(1, 1);
			return true;
		}
	}

/*-------------------------- Bloquear 4 ---------------------------*/
	if (array_board[1][2] == 1 && array_board[0][0] == 1 && array_board[2][0] == 1) {
		if (array_board[0][2] == -1 && array_board[2][2] == -1 && array_board[1][0] == -1) {
			clearCell(0, 2);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[2][1] == 1 && array_board[0][2] == 1 && array_board[0][0] == 1) {
		if (array_board[2][0] == -1 && array_board[0][1] == -1 && array_board[2][2] == -1) {
			clearCell(2, 0);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[1][0] == 1 && array_board[2][2] == 1 && array_board[0][2] == 1) {
		if (array_board[0][0] == -1 && array_board[1][2] == -1 && array_board[2][0] == -1) {
			clearCell(0, 0);
			paintCell(1, 1);
			return true;
		}
	}

	if (array_board[0][1] == 1 && array_board[2][0] == 1 && array_board[2][2] == 1) {
		if (array_board[0][0] == -1 && array_board[0][2] == -1 && array_board[2][1] == -1) {
			clearCell(0, 0);
			paintCell(1, 1);
			return true;
		}
	}

/*-------------------------- Bloquear 5 ---------------------------*/
	if (array_board[0][2] == 1 && array_board[1][0] == 1 && array_board[2][1] == 1) {
		if (array_board[2][2] == -1 && array_board[0][1] == -1 && array_board[1][2] == -1) {
			clearCell(2, 2);
			paintCell(2, 0);
			return true;
		} else 
		if (array_board[0][0] == -1 && array_board[0][1] == -1 && array_board[1][2] == -1) {
			clearCell(0, 0);
			paintCell(2, 0);
			return true;
		}
	}

	if (array_board[2][2] == 1 && array_board[1][2] == 1 && array_board[1][0] == 1) {
		if (array_board[2][0] == -1 && array_board[1][2] == -1 && array_board[2][1] == -1) {
			clearCell(2, 0);
			paintCell(0, 0);
			return true;
		} else 
		if (array_board[0][2] == -1 && array_board[1][2] == -1 && array_board[2][1] == -1) {
			clearCell(0, 2);
			paintCell(0, 0);
			return true;
		}
	}

	if (array_board[2][0] == 1 && array_board[1][2] == 1 && array_board[0][1] == 1) {
		if (array_board[0][0] == -1 && array_board[2][1] == -1 && array_board[1][0] == -1) {
			clearCell(0, 0);
			paintCell(0, 2);
			return true;
		} else 
		if (array_board[2][2] == -1 && array_board[2][1] == -1 && array_board[1][0] == -1) {
			clearCell(2, 2);
			paintCell(0, 2);
			return true;
		}
	}

	if (array_board[0][0] == 1 && array_board[2][1] == 1 && array_board[1][2] == 1) {
		if (array_board[0][2] == -1 && array_board[1][0] == -1 && array_board[0][1] == -1) {
			clearCell(0, 2);
			paintCell(2, 2);
			return true;
		} else 
		if (array_board[2][0] == -1 && array_board[1][0] == -1 && array_board[0][1] == -1) {
			clearCell(2, 0);
			paintCell(2, 2);
			return true;
		}
	}

	return false;
}



