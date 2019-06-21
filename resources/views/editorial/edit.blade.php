@extends('layouts.app')
@section('content')

@if (session()->has('infoEditorial'))
<div class="alert alert-success">{{ session('infoEditorial') }}</div>
@endif

<div class="contenedorEditEmpleados">
  <div class="row">
	<div class="col-12">
	  <div class="card border-light">
		<div class="card-header"><i class=" fab fa-readme"></i> <small>{{ __('Editar Editorial') }}</small></div>
			<div class="card-body">
				<div class="card bg-light mb-3">
					    <form method="POST" action="{{ route('editorial.update', $listaEditoriales->id_editorial) }}"><!--consultantes.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->

								  
						

					      @include('editorial.form')

	  
						</form>	  
		        </div>
		    </div>
	  </div>
	</div>
  </div>
</div>


@endsection