@extends('layouts.app')
@section('content')
 
@if (session()->has('infoDeleteAutor'))
<div class="alert alert-success">{{ session('infoDeleteAutor') }}</div>
@endif


<div class="container-autores">
 <div class="row menuEmpleados">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-diagnoses"></i> Autores <a class="btn btn-success btn-sm" href="{{ url('autor/create') }}"> <i class="fas fa-plus-circle"></i> Agregar</a></div>
       <div class="card-body">
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm table-light table-bordered ">
		    <caption>Autores</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>Acciones</th>
				<th>ID</th>   <!--campos de la tabla-->
				<th>Nombre</th>
				
				

			  </tr>


		     </thead>

		     <tbody>
			 @foreach ($listaAutores as $auto) <!--desde el controlador, metodo index, se pasa la variable materialBiblioteca-->

			 <tr>

				<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							
								<a class="editar btn btn-info btn-sm" href="{{route('autor.edit',
								 $auto->id_autor) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
					 
							
							
							<form style="display: inline" method="POST" action="{{ route('autor.destroy', $auto->id_autor) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}

								<button class="eliminar btn btn-danger btn-sm" type="submit" disabled><i class="fas fa-trash-alt"></i></button>
							</form>
					
				</td>
				<td>{{ $auto->id_autor  }}</td>
				<td>{{ $auto->Nombre  }}</td>
							
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

@endsection