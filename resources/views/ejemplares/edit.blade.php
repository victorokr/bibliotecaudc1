@extends('layouts.app')
@section('content')

@if (session()->has('infoEjemplar'))
<div class="alert alert-success">{{ session('infoEjemplar') }}</div>
@endif

<div class="contenedorEditEmpleados">
  <div class="row">
	<div class="col-12">
	  <div class="card border-light">
		<div class="card-header"><i class="fas fa-diagnoses"></i> <small>{{ __('Editar Ejemplar') }}</small></div>
			<div class="card-body">
				<div class="card bg-light mb-3">
					    <form method="POST" action="{{ route('ejemplares.update', $ejemplaress->id_estadoMaterialBiblioteca) }}"><!--consultantes.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->

								  
						

					      @include('ejemplares.form')

	  
						</form>	  
		        </div>
		    </div>
	  </div>
	</div>
  </div>
</div>


@endsection