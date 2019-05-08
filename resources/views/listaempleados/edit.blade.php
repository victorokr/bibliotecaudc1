@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row contacto">
		<div class="col-12">
			<h5 class="tituloContacto">Editar Empleado </h5>

			@if (session()->has('info'))
			<div class="alert alert-success">{{ session('info') }}</div>
			@endif

		   <div class="card-group">
				<div class="card-body">
					<div class="card bg-light mb-3 text-center">
					    <form method="POST" action="{{ route('empleados.update', $listaempleados->id_empleado) }}"><!--empleados.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->
						

					              @include('listaempleados.form')


								  <div class="row justify-content-center">
								  		<div class="col-12 col-md-6">
								  			<input class="btn btn-success btn-block" type="submit" value="Guardar">
								  		</div>
								  </div>



								  <div class="row justify-content-center">
								  		<div class="col-12 col-md-4">
								  			<a href="{{ url('lista/empleados') }}" class="btn btn-link-primary btn-sm">Regresar</a>
								  		</div>
								  </div>
						</form>	  
		            </div>
		        </div>
           </div>



	    </div>
    </div>
</div>

@endsection