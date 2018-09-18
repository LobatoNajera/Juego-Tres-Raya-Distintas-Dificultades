@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')
	
	<div class="jumbotron text-center">
		{{ Form::label('game-label', 'Modo Historia', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
	</div>

	<div class="container-fluid text-center">
		
		{!! Form::open(['url' => '/saves_games/'.$user->id, 'method' => 'PATCH']) !!}

			{{ Form::hidden('personaje_id', $personaje->id, ['id' => 'personaje_id']) }}
			{{ Form::hidden('personaje_nombre_archivo', $personaje->nombre_archivo, ['id' => 'personaje_nombre_archivo']) }}
			{{ Form::hidden('enemigo_id', $enemigo->id, ['id' => 'enemigo_id']) }}
			{{ Form::hidden('enemigo_nombre_archivo', $enemigo->nombre_archivo, ['id' => 'enemigo_nombre_archivo']) }}
			{{ Form::hidden('enemigo_numero', $enemigo_numero, ['id' => 'enemigo_numero']) }}
			{{ Form::hidden('dificultad', $enemigo->dificultad, ['id' => 'dificultad']) }}
			

			<table width="100%" height="150px" style="margin-bottom: 15px;">
				<tr>
					<td width="3%"></td>

					<td width="15%" style="text-align: right;">
						{{ Html::image('imagen/'.$personaje->nombre_archivo, 'imagen no encontrada', ['style' => 'height: 150px; width: 150px; border: 2px solid black; border-radius: 50px 0px 0px 50px;']) }}
					</td>
					<td width="30%" height="150px" style="text-align: left;">
						<div style="padding-top: 10px; height: 50px; border-top: 2px solid black; border-right: 2px solid black; border-radius: 0px 20px 0px 0px;">
							{{ Form::label('usuario-label', 'Usuario: ', [ 'style' => 'margin-left: 5%;']) }}
							{{ Form::label('usuario_nombre-label', $user->name, [ 'style' => 'font-size: 22px; color: black;']) }}
						</div>
						<div style="padding-top: 7px; height: 50px; border-right: 2px solid black; border-radius: 0px 0px 0px 0px;">
							{{ Form::label('ficha_personaje-label', 'Ficha: ', [ 'style' => 'margin-left: 5%;']) }}
							{{ Form::label('personaje_nombre-label', $personaje->nombre, [ 'style' => 'font-size: 22px; color: blue;']) }}
						</div>
						<div style="padding-top: 5px; height: 50px; border-bottom: 2px solid black; border-right: 2px solid black; border-radius: 0px 0px 20px 0px;">
							{{ Form::label('nivel-label', 'Nivel: ', [ 'style' => 'margin-left: 5%;']) }}
							{{ Form::label('nivel_usuario-label', $avance_user->nivel_jugador, [ 'style' => 'font-size: 22px; color: teal;']) }}
						</div>
					</td>

					<td width="4%"></td>

					<td width="15%" style="text-align: right;">
						{{ Html::image('imagen/'.$enemigo->nombre_archivo, 'imagen no encontrada', ['style' => 'height: 150px; width: 150px; border: 2px solid black; border-radius: 50px 0px 0px 50px;']) }}
					</td>

					<td width="30%" height="150px" style="text-align: left;">
						<div style="padding-top: 10px; height: 50px; border-top: 2px solid black; border-right: 2px solid black; border-radius: 0px 20px 0px 0px;">
							{{ Form::label('enemigo-label', 'Usuario: ', [ 'style' => 'margin-left: 5%;']) }}
							{{ Form::label('enemigo_usuario_nombre-label', 'I. A.', [ 'style' => 'font-size: 22px; color: black;']) }}
						</div>
						<div style="padding-top: 7px; height: 50px; border-right: 2px solid black; border-radius: 0px 0px 0px 0px;">
							{{ Form::label('ficha_enemigo-label', 'Ficha: ', [ 'style' => 'margin-left: 5%;']) }}
							{{ Form::label('enemigo_nombre-label', $enemigo->nombre, [ 'style' => 'font-size: 22px; color: blue;']) }}
						</div>
						<div style="padding-top: 5px; height: 50px; border-bottom: 2px solid black; border-right: 2px solid black; border-radius: 0px 0px 20px 0px;">
							{{ Form::label('dificultad-label', 'Dificultad: ', [ 'style' => 'margin-left: 5%;']) }}
							@if ($enemigo->dificultad == 1)
								{{ Form::label('dificultad_enemigo-label', 'Facil', [ 'style' => 'font-size: 22px; color: green;']) }}
							@elseif ($enemigo->dificultad == 2)
								{{ Form::label('dificultad_enemigo-label', 'Moderada', [ 'style' => 'font-size: 22px; color: orange;']) }}
							@elseif ($enemigo->dificultad == 3)
								{{ Form::label('dificultad_enemigo-label', 'Dificil', [ 'style' => 'font-size: 22px; color: red;']) }}
							@elseif ($enemigo->dificultad == 4)
								{{ Form::label('dificultad_enemigo-label', 'Legendario', [ 'style' => 'font-size: 22px; color: black; text-shadow: 0px 0px 5px #FF0000;']) }}
							@endif
						</div>
					</td>

					<td width="3%"></td>
				</tr>
			</table>


			<div id="game">

	            <div id="content_board">
	                <div id="board">
	                    <div class="rows">
	                        
	                        <div class="row">
	                            <div id="c02" class="cell"></div>
	                            <div id="c12" class="cell"></div>
	                            <div id="c22" class="cell"></div>
	                        </div>

	                        <div class="row">
	                            <div id="c01" class="cell"></div>
	                            <div id="c11" class="cell"></div>
	                            <div id="c21" class="cell"></div>
	                        </div>

	                        <div class="row">
	                            <div id="c00" class="cell"></div>
	                            <div id="c10" class="cell"></div>
	                            <div id="c20" class="cell"></div>
	                        </div>

	                    </div>
	                    
	                    <div id="message" style="display: none;">
	                        <p id="notification"></p>

	                        <div id="share_panel">
	                            <button type="submit" name="button_continuar" id="button_continuar" class="btn btn-success"></button>
								
	                            <!--div id="tweet_game"-->
	                                <br>
	                                <button type="submit" name="guardar_y_salir" id="guardar_y_salir" class="btn btn-inverse"> Guardar y Salir </button>
	                            <!--/div-->
	                        </div>

	                        <div id="img_winner"></div>
	                        {{ Form::hidden('ganador', '0', ['id' => 'ganador']) }}
	                    </div>
	                    

	                    <div id="fileOutput"></div>
						
	                </div>
	            </div>
	        </div>
			
			<div id="link_salir" style="text-align: right; margin-top: 20px; display: block;">
	            <a href="{{url('/saves_games')}}" style="color: red; font-size: 130%; margin-right: 10%;">
	                <strong><i class="glyphicon glyphicon-chevron-left"></i> Salir de: Batalla </strong>
	            </a>
	        </div>
			
			<audio id="musica">
				<source src="{{ asset('audio/song_boss_5.mp3') }}" type="audio/mpeg">
			</audio>
			
		{!! Form::close() !!}

	</div>


@endsection

