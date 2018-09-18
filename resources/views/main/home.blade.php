@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')
	
	<div class="jumbotron text-center">
		{{ Form::label('game-label', 'Menu Principal', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
	</div>
	
<div class="container-fluid">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $user->name }}</div>

                <div class="panel-body">
					
					<table class="table table-hover" width=100%>
						<thead>
							<tbody>
								<tr style="vertical-align: middle;" height="100px" class="table success">
									<td style="vertical-align: middle; text-align: center;">
										
										{{ Form::label('jugador-label', 'Avance del Jugador', ['style' => 'margin-right: 15px;']) }}
										
										<a href="{{ url('/avances_users') }}" class="btn btn-success btn-fab" style="width: 80px; height: 80px; margin-right: 20px;">
											{{ Html::image('imagen/controller.png', '->', ['style' => 'width: 80px; height: 80px; margin-left: -15px; margin-top: -15px;', 'class' => 'img-circle']) }}
										</a>

									</td>
								</tr>
								
								<tr style="vertical-align: middle;" height="100px" class="table warning">
									<td style="vertical-align: middle; text-align: center;">
										
										{{ Form::label('modo_hostoria-label', 'Modo Historia', ['style' => 'margin-right: 15px;']) }}
										
										<a href="{{ url('/saves_games') }}" class="btn btn-warning btn-fab" style="width: 80px; height: 80px; margin-right: 20px;">
											{{ Html::image('imagen/mod_history.png', '->', ['style' => 'width: 80px; height: 80px; margin-left: -15px; margin-top: -15px;', 'class' => 'img-circle']) }}
										</a>

									</td>
								</tr>
								
								<?php if ($avance_user->historias_finalizadas >= 1 ) { ?>
									
									<tr style="vertical-align: middle;" height="100px" class="table danger">
										<td style="vertical-align: middle; text-align: center;">
												
											{{ Form::label('modo_jefes-label', 'Modo Jefes', ['style' => 'margin-right: 15px;']) }}
											
											<a href="{{ url('/enemigos') }}" class="btn btn-danger btn-fab" style="width: 80px; height: 80px; margin-right: 20px;">
												{{ Html::image('imagen/bosses.png', '->', ['style' => 'width: 80px; height: 80px; margin-left: -15px; margin-top: -15px;', 'class' => 'img-circle']) }}
											</a>
											
										</td>
									</tr>
									
									<tr style="vertical-align: middle;" height="100px" class="table info">
										<td style="vertical-align: middle; text-align: center;">
												
											{{ Form::label('informacion_personajes-label', 'Informacion de Personajes', ['style' => 'margin-right: 15px;']) }}
											
											<a href="{{ url('/personajes') }}" class="btn btn-info btn-fab" style="width: 80px; height: 80px; margin-right: 20px;">
												{{ Html::image('imagen/informacion.png', '->', ['style' => 'width: 80px; height: 80px; margin-left: -15px; margin-top: -15px;', 'class' => 'img-circle']) }}
											</a>
											
										</td>
									</tr>

								<?php } ?>
								
								
							</tbody>
						</thead>
					</table>
					
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

