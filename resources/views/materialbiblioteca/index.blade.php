@extends('layouts.app')
@section('content')
 

<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoUpdateMaterialBiblioteca'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoUpdateMaterialBiblioteca') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif

	</div>	
  </div>
</div>


<div class="container-materialBiblioteca">
 <div class="row ">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-book-reader"></i> Material Biblioteca <a class="btn btn-outline-primary btn-sm disabled" title="Agregar Material"  href="{{ url('material/biblioteca/create') }}"> <i class="fas fa-plus"></i> agregar</a></div>
       <div class="card-body">

            <form method="GET" action="{{ route('biblioteca.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-2">
			      <label class="sr-only" for="inlineFormInput">Codigo_ISBN</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Codigo_ISBN')}}" id="prueba" name="Codigo_ISBN" placeholder="codigo ISBN">
			    </div>
			    <div class="col-auto col-5">
			      <label class="sr-only" for="inlineFormInput">Titulo</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Titulo')}}" 
			      id="prueba" name="Titulo" placeholder="titulo">
			    </div>
			    <div class="col-auto col-3">
			      <label class="sr-only" for="inlineFormInput">Autor</label>
			      <input type="text" class="form-control mb-2"
			       value="{{ request('autores')}}" id="prueba" name="autores" placeholder="autor"/>
			    </div>
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('material/biblioteca') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			  </div>
			</form>
			  

			<div class="table-responsive">
		      <table class="table table-hover table-sm  ">
			    <caption>Material Biblioteca</caption>
			     <thead class="thead-light">
				
				  <tr>
					<th>Acciones</th>
					<th>CodigoLibro</th>
					<th>Codigo ISBN</th>
					<th>Titulo</th>
					<th>Autor</th>
					<th>Fecha</th>
			        <th>Edicion</th>
					<th>Editorial</th>
					<th>Tema</th>
					<th>Baja</th>
					<th>tipoDeMaterial</th>
					{{-- <th>Ejemplares</th> --}}
					{{-- <th>Disponibles</th> --}}
					<th>Carrera</th>
					<th>Sede</th>
					<th>Estado</th>

				  </tr>


			     </thead>

			     <tbody>
				 @forelse ($materialBibliotecas as $materialBiblioteca) <!--desde el controlador, metodo index, se pasa la variable materialBibliotecas. Forelse se usa para lanzar mensaje en caso de no haber registros-->

				 <tr>

					<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->

									{{-- <a class="editar btn btn-success btn-sm mr-1" title="AgregarEjemplares" href="{{route('biblioteca.show', $materialBiblioteca->id_materialBiblioteca) }}">
										<i class="fas fa-book-open"></i></a> --}} 

								
									<a class="editar btn btn-info btn-sm" title="Editar" href="{{route('biblioteca.edit', $materialBiblioteca->id_materialBiblioteca) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
						 
								
								
								<form style="display: inline" method="POST" action="{{ route('biblioteca.destroy', $materialBiblioteca->id_materialBiblioteca) }}" >

									{!! csrf_field()!!}
									{!! method_field('DELETE')!!}

									<button class="eliminar btn btn-danger btn-sm" title="Eliminar" type="submit" disabled><i class="fas fa-trash-alt"></i></button>
								</form>
						
					</td>
					
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

					{{-- <td>{{ optional($materialBiblioteca->estadoMaterialBibliotecas)->codigo }}</td> --}}
					{{-- <td>{{ optional($materialBiblioteca->estadoMaterialBibliotecas)->codigo }}</td> --}}
					<td>{{ $materialBiblioteca->carreras->pluck('Carrera')->implode(' - ')}}</td>
					<td>{{ $materialBiblioteca->ubicaciones->pluck('Sede')->implode(' - ')}}</td>
					<td>{{ $materialBiblioteca->estado->pluck('Estado')->implode(' - ')}}</td>

					@empty
					<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
					

				 </tr>
				 @endforelse
			     </tbody>			
			  </table>
			  {{ $materialBibliotecas->render() }} {{-- paginacion --}}
			</div>
	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection