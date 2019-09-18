@extends('layouts.app')
@section('content')

@if (session()->has('infoAutor'))
<div class="alert alert-success">{{ session('infoAutor') }}</div>
@endif

<div class="contenedorEditEmpleados">
  <div class="row">
	<div class="col-12">
	  <div class="card border-light">
		<div class="card-header"><i class="fas fa-diagnoses"></i> <small>{{ __('Editar Autor') }}</small></div>
			<div class="card-body">
				<div class="card bg-light mb-3">
					    <form method="POST" action="{{ route('autor.update', $listaAutores->id_autor) }}"><!--consultantes.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->

								  
						

					      @include('autor.form')

	  
						</form>	  
		        </div>
		    </div>
	  </div>
	</div>
  </div>
</div>


@endsection