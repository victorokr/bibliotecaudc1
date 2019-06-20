@extends('layouts.app')
@section('content')
 
@if (session()->has('infoDeleteMaterial'))
<div class="alert alert-success">{{ session('infoDeleteMaterial') }}</div>
@endif


<div class="container-consultantes">
 <div class="row menuEmpleados">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-book-reader"></i> Material Biblioteca <a class="btn btn-success btn-sm" href="{{ url('material/biblioteca/create') }}"> <i class="fas fa-plus-circle"></i> Material</a></div>
       <div class="card-body">
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm table-light table-bordered ">
		    <caption>Material Biblioteca</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>Acciones</th>
				<th>ID</th>   <!--campos de la tabla-->
				<th>Codigo_libro</th>
				<th>Codigo_ISBN</th>
				<th>Titulo</th>
				<th>Autor</th>
				<th>Fecha</th>
		        <th>Edicion</th>
				<th>Editorial</th>
				<th>Tema</th>
				<th>Baja</th>
				<th>tipoDeMaterial</th>
				<th>Carrera</th>
				<th>Sede</th>
				

			  </tr>


		     </thead>

		     <tbody>
			 @foreach ($materialBibliotecas as $materialBiblioteca) <!--desde el controlador, metodo index, se pasa la variable materialBiblioteca-->

			 <tr>

				<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							
								<a class="editar btn btn-info btn-sm" href="{{route('biblioteca.edit', $materialBiblioteca->id_materialBiblioteca) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
					 
							
							
							<form style="display: inline" method="POST" action="{{ route('biblioteca.destroy', $materialBiblioteca->id_materialBiblioteca) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}

								<button class="eliminar btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
							</form>
					
				</td>
				<td>{{ $materialBiblioteca->id_materialBiblioteca   }}</td>
				<td>{{ $materialBiblioteca->Codigo_libro	                 }}</td>
				<td>{{ $materialBiblioteca->Codigo_ISBN                  }}</td>
				<td>{{ $materialBiblioteca->Titulo                  }}</td>
				<td>{{ $materialBiblioteca->autores->pluck('Nombre')->implode(' - ')  }}</td>
				<td>{{ $materialBiblioteca->Fecha                   }}</td>
				<td>{{ $materialBiblioteca->Edicion                  }}</td>
				<td>{{ optional($materialBiblioteca->editorial)->Editorial}}</td>
				<td>{{ $materialBiblioteca->temaDelmaterial->pluck('Area')->implode(' - ')}}</td>
				<td>{{ optional($materialBiblioteca->baja)->Baja      }}</td>
				<td>{{ optional($materialBiblioteca->tipoDeMaterial)->Tipo_de_material                      }}</td>


				<td>{{ $materialBiblioteca->carreras->pluck('Carrera')->implode(' - ')}}</td>
				<td>{{ $materialBiblioteca->ubicaciones->pluck('Sede')->implode(' - ')}}</td>			
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