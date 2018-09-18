@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')

	<div class="jumbotron text-center">
		{{ Form::label('game-label', 'Debe acceder con una cuenta para jugar', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
	</div>

	<div class="container">
		<div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-primary">
	                <div class="panel-heading">Seleccione una opcion</div>

	                <div class="panel-body">
	                    
	                    <div class="form-group text-center">
	                        <a class="btn btn-success" href="{{ route('login') }}">
	                        	<i style="margin-right: 5px;" class="glyphicon glyphicon-log-in"></i>
	                        	Iniciar Sesión
	                        </a>
	                    	<a class="btn btn-success" href="{{ route('register') }}">
	                    		<i style="margin-right: 5px;" class="glyphicon glyphicon-registration-mark"></i>
	                    		Registrarse
	                    	</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="row text-center">
	    	{{ Html::image('imagen/logo.png', '->', ['style' => 'width: 400px; height: 400px;', 'class' => 'img-rounded']) }}
	    </div>
	</div>
	
@endsection

