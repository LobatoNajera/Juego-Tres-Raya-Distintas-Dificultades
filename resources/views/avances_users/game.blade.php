@extends('layouts.app')

@section('title', '3 en Raya')

@section('content')
	
	<div class="jumbotron text-center">
		{{ Form::label('game-label', 'Juego 3 en Raya', ['style' => 'margin-bottom: auto; font: 220% sans-serif; font-weight: bold;']) }}
	</div>

	<div class="container-fluid text-center">
		
		<div id="game">
            <!--div id="title">
                <h1 id="encabezado">Juego de las 3 en Raya</h1>
            </div-->

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
                            <p id="button"></p>

                            <div id="tweet_game">
                                <div id="tweet_gameomer">
                                    
                                </div>
                            </div>
                        </div>

                        <div id="img_winner"></div>
                    </div>
                    

                    <div id="fileOutput"></div>

                </div>
            </div>
        </div>
		
	</div>

	

@endsection

