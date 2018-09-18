@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')
	
	<div class="jumbotron text-center">
		{{ Form::label('game-label', 'Modo Historia', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
	</div>
	
<div class="container-fluid">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Selecciona un Modo de Juego</div>

                <div class="panel-body">
					
					<table class="table table-striped table-bordered text-center" width="100%">
                        
                        <tr>
                            <td style="vertical-align: middle; margin-right: 5%;" width="40%">
                                Nueva Partida
                            </td>
                            <td style="vertical-align: middle; margin-left: 5%;" width="40%">
                                Cargar Partida
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                
                                {{ Form::hidden('personaje_id', 1, []) }}
								
								{{ Html::image('imagen/x_11.jpg', 'imagen no encontrada', ['style' => 'width: 40%;']) }}
                    			<br>
                                <a href="{{ url('/new_saves_games') }}" >
                                    <button class="btn btn-warning" style="text-transform: none;">
                                        <i style="margin-right: 10px;" class="glyphicon glyphicon-cd"></i>
                                        Crear Nueva Partida
                                    </button>
                                </a>
                                
                            </td>
                            <td style="vertical-align: middle;">
                                
								{{ Form::hidden('personaje_id', 1, []) }}

                                {{ Html::image('imagen/'.$enemigo['nombre_archivo'], 'imagen no encontrada', ['style' => 'width: 40%;']) }}
                        		<br>
                                <a href="{{ url('/load_saves_games') }}" >
                                	<button class="btn btn-danger" style="text-transform: none;" <?php if($enemigo['id'] == 0) { echo "disabled"; } ?>>
                                        <i style="margin-right: 10px;" class="glyphicon glyphicon-flash"></i>
                                        Continuar
                                    </button>
								</a>
                                
                            </td>
                        </tr>
                        
                    </table>
					
                </div>
            </div>
            
            <div style="text-align: right;">
                <a href="{{url('/')}}" style="color: black; font-size: 130%; margin-right: 10%;">
                    <strong><i class="glyphicon glyphicon-chevron-left"></i> Salir de: Modo Historia </strong>
                </a>
            </div>
            
        </div>
    </div>
</div>


@endsection

