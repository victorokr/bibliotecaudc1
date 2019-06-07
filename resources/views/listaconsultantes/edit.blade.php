@extends('layouts.app')
@section('content')

@if (session()->has('infoUpdateConsultante'))
<div class="alert alert-success">{{ session('infoUpdateConsultante') }}</div>
@endif

<div class="contenedorEditEmpleados">
  <div class="row justify-content-star">
	<div class="col-12">
	  <div class="card border-light">
		<div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Editar Consultante') }}</small></div>
			<div class="card-body">
				<div class="card bg-light mb-3">
					    <form method="POST" action="{{ route('consultantes.update', $listaconsultantes->id_consultanteBiblioteca) }}"><!--consultantes.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->

								  
						

					              @include('listaconsultantes.form')


								  



								  
						</form>	  
		        </div>
		    </div>
	  </div>
	</div>
  </div>
</div>


@endsection