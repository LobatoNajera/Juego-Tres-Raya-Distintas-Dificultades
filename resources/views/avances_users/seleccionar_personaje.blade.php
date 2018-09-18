@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')
	
	<div class="jumbotron text-center">
        {{ Form::label('game-label', 'Selección de Personaje', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
    </div>
    
<div class="container-fluid" style="margin-top: 20px; padding-left: 10%; padding-right: 10%;">
    
    {!! Form::open(['url' => 'save_personaje_seleccionado', 'method' => 'POST']) !!}
        
        {{ Form::hidden('personaje_id', $personaje_id) }}
        
        <table class="text-center" width="100%" height="100%">
            <tr>
                @for ($i = 0; $i < $avance_user->personajes_desbloqueados; $i++)
                    
                    <?php if (($i % 4) == 0 ) { ?>
                        </tr>
                        <tr>
                    <?php } ?>

                    <td width="25%" height="50%">
                        {{ Html::image('imagen/'.$personajes[$i]->nombre_archivo, 'imagen no encontrada', ['style' => 'width: 50%;']) }}
                        <br>
                        <div style="vertical-align: bottom;">
                            <input type="radio" name="nuevo_personaje_id" id="nuevo_personaje_id" style="cursor: pointer;" value="{{ $personajes[$i]->id }}" <?php if($personajes[$i]->id == $personaje_id) { echo "checked"; } ?>>
                            <br>
                            {{ Form::label('personaje_nombre', $personajes[$i]->nombre, [ 'style' => 'margin-bottom: 15px;']) }}
                        </div>
                    </td>

                @endfor
            </tr>
        </table>
        
        <div style="text-align: right;">
            <button type="submit" class="btn btn-success " style="text-transform: none; margin-right: 15px;">
                <i style="margin-right: 10px;" class="glyphicon glyphicon-floppy-saved"></i>
                Guardar Cambios
            </button>

            <a href="{{url('/avances_users')}}" style="color: black; font-size: 130%; margin-right: 10%;">
                <strong><i class="glyphicon glyphicon-chevron-left"></i> Salir de: Seleccion de Personaje </strong>
            </a>
        </div>
        
    {!! Form::close() !!}

</div>

@endsection

