@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')
	
	<div class="jumbotron text-center">
        {{ Form::label('game-label', 'Avance del Jugador', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
    </div>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"> Información del Usuario. </div>
                
                <div class="panel-body">
                    
                    <table class="table table-striped table-bordered text-center" width="100%">
                        <tr>
                            <td style="vertical-align: middle;" rowspan="7" width="35%">
                                
                                {{ Html::image('imagen/'.$personaje->nombre_archivo, 'imagen no encontrada', ['style' => 'width: 300px; height: 300px;']) }}
                                <br>
                                
                                {!! Form::open(['url' => 'seleccionar_personaje', 'method' => 'POST']) !!}

                                    {{ Form::hidden('personaje_id', $personaje->id, []) }}

                                    <button type="submit" class="btn btn-info" style="text-transform: none;">
                                        <i style="margin-right: 10px;" class="glyphicon glyphicon-king"></i>
                                        Seleccionar Ficha
                                    </button>

                                {!! Form::close() !!}

                            </td>
                            <td style="vertical-align: middle;" width="20%">
                                Nombre de Usuario:
                            </td>
                            <td style="vertical-align: middle;" width="45%">
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                Correo Electronico:
                            </td>
                            <td style="vertical-align: middle;">
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                # de Campañas Terminadas:
                            </td>
                            <td style="vertical-align: middle;">
                                {{ $avance_user->historias_finalizadas }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                % de Batallas Ganadas:
                            </td>
                            <td style="vertical-align: middle;">
                                {{ $avance_user->porcentaje_batallas_ganadas }} %
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                % de Batallas Perdidas:
                            </td>
                            <td style="vertical-align: middle;">
                                {{ $avance_user->porcentaje_batallas_perdidas }} %
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                Nivel del Jugador:
                            </td>
                            <td style="vertical-align: middle;">
                                {{ $avance_user->nivel_jugador }}
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                Nombre de la Ficha Actual:
                            </td>
                            <td style="vertical-align: middle;">
                                {{ $personaje->nombre }}.
                            </td>
                        </tr>
                    </table>
                    
                </div>
            </div>
            
            <div style="text-align: right;">
                <a href="{{url('/')}}" style="color: black; font-size: 130%; margin-right: 10%;">
                    <strong><i class="glyphicon glyphicon-chevron-left"></i> Salir de: Avance del Jugador </strong>
                </a>
            </div>
            
        </div>
    </div>
</div>

@endsection

