@extends('layouts.app')
@section('content')


<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('info'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('info') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>

<div class="contenedorEditEmpleados ">
 <div class="container">	
  <div class="row  justify-content-star">
	<div class="col-12">		
	  <div class="card border-light">	
		<div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Editar Empleado') }}</small></div>
		<div class="card-body">
		  <div class="card bg-light mb-3 text-center">
				<form method="POST" action="{{ route('empleados.update', $listaempleados->id_empleado) }}"><!--empleados.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
				{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->
						

				@include('listaempleados.form')
								  
				</form>	  
		  </div>
		</div>        
	  </div>
    </div>
  </div>
 </div>
</div>
@endsection