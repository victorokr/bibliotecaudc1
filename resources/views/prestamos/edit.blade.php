@extends('layouts.app')
@section('content')

@if (session()->has('infoUpdateMaterialBiblioteca'))
<div class="alert alert-success">{{ session('infoUpdateMaterialBiblioteca') }}</div>
@endif

<div class="contenedorEditEmpleados">
  <div class="row">
	<div class="col-12">
	  <div class="card border-light">
		<div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Precesar prestamo') }}</small></div>
			<div class="card-body">
				<div class="card bg-light mb-3">
					    <form method="POST" action="{{ route('prestamos.update',
					     $prestamos->id_prestamo) }}"><!--consultantes.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->

								  
						

					              @include('prestamos.form')


								  



								  
						</form>	  
		        </div>
		    </div>
	  </div>
	</div>
  </div>
</div>


@endsection