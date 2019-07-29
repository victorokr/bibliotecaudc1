@extends('layouts.app')

@section('content')
	{{-- <h1>Mensaje</h1>
	<p>enviado por {{ $messages->nombre }} - {{ $messages->email }}</p>
	<p>{{ $messages->mensaje}}</p> --}}

@if (session()->has('infoDeleteEjemplar'))
<div class="alert alert-success">{{ session('infoDeleteEjemplar') }}</div>
@endif


<div class="container-autores">
 <div class="row menuEmpleados">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-diagnoses"></i> Ejemplares <a class="btn btn-success btn-sm" href="{{ url('ejemplares/create') }}"> <i class="fas fa-plus-circle"></i> Agregar</a></div>
       <div class="card-body">
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm table-light table-bordered ">
		    <caption>Ejemplares</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>Acciones</th>
				<th>Codigo</th>   <!--campos de la tabla-->
				<th>Estado</th>
				
				

			  </tr>


		     </thead>

		     <tbody>
			 @foreach ($ejemplaress as $ejemplares) <!--desde el controlador, metodo index, se pasa la variable materialBiblioteca-->

			 <tr>

				<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							
								<a class="editar btn btn-info btn-sm" href="{{route('ejemplares.edit',
								 $ejemplares->id_estadoMaterialBiblioteca) }}"><i class="fas fa-edit"></i></a> 
					 
							
							
							<form style="display: inline" method="POST" action="{{ route('ejemplares.destroy', $ejemplares->id_estadoMaterialBiblioteca) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}

								<button class="eliminar btn btn-danger btn-sm" type="submit" disabled><i class="fas fa-trash-alt"></i></button>
							</form>
					
				</td>
				<td>{{ $ejemplares->codigo  }}</td>
				<td>{{ optional($ejemplares->estado)->Estado  }}</td>
							
			 </tr>
			 @endforeach
		     </tbody>
		  </table>
		</div>
	   </div>
    </div>
  </div>		
 </div>
</div>

@stop