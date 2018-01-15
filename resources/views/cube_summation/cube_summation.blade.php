@extends('app')

@section('title') Cube Summation @endsection

@section('content')
	<div class="container">
		<div class="row text-center">
			<div class="panel panel-default">
			  	<div class="panel-body">
			  		@include('errors')
			  		<div class="row">
				    	<div class="form-group col-lg-4">
	    					<label for="test_cases">Numero de Casos de Prueba</label>
	    					<input type="text" class="form-control" id="test_cases" v-model="test_cases">
	  					</div>
	  					<div class="form-group col-lg-4">
	    					<label for="size_matrix">Tamaño de la matriz</label>
	    					<input type="text" class="form-control" id="size_matrix" v-model="size_matrix">
	  					</div>
	  					<div class="form-group col-lg-4">
	    					<label for="number_operations">Numero de Operaciones</label>
	    					<input type="text" class="form-control" id="number_operations" v-model="number_operations">
	  					</div>
			  		</div>
			  		<div class="row">
			  			<button class="btn btn-info" @click="playCubeSummation()">Jugar</button>
			  		</div>
			  	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<p>Datos de Entrada</p>
			</div>
			<div class="col-lg-6">
				<p> Datos de Salida</p>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	@include('cube_summation/cube_summation_vue')
@endsection