@extends('layouts.app')
@section('content')
 
@if (session()->has('infoDeleteMaterial'))
<div class="alert alert-success">{{ session('infoDeleteMaterial') }}</div>
@endif


<div class="container-indexprestamo">
 <div class="row ">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-book-reader"></i> Solicitudes de prestamos <a class="btn btn-success btn-sm" title="Agregar Material"  href="{{ url('prestamo/consultante/create') }}"> <i class="fas fa-plus"></i> </a></div>
       <div class="card-body">

			<div class="table-responsive">
		      <table class="table table-hover table-sm table-light table-bordered ">
			    <caption>Prestamos</caption>
			     <thead class="thead-light">
				
				  <tr>
					<th>Acciones</th>
					<th>ID</th>   <!--campos de la tabla-->
					<th>InicioDePrestamo</th>
					<th>DevolucionPrestamo</th>
					<th>TipoDePrestamo</th>
					<th>Recepcion</th>
					<th>Solicitante</th>
			        <th>Estado</th>
					
					<th>Sede</th>
					

				  </tr>


			     </thead>

			     <tbody>
				 @forelse ($prestamoo as $prestamo) <!--desde el controlador, metodo index, se pasa la variable materialBibliotecas. Forelse se usa para lanzar mensaje en caso de no haber registros-->

				 <tr>

					<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
								
									{{-- <a class="editar btn btn-info btn-sm" title="Editar" href="{{route('biblioteca.edit', $materialBiblioteca->id_materialBiblioteca) }}"><i class="fas fa-edit"></i></a> 
						 
								
								
								<form style="display: inline" method="POST" action="{{ route('biblioteca.destroy', $materialBiblioteca->id_materialBiblioteca) }}" >

									{!! csrf_field()!!}
									{!! method_field('DELETE')!!}

									<button class="eliminar btn btn-danger btn-sm" title="Eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
								</form> --}}
						
					</td>
					<td>{{ $prestamo->id_prestamo   }}</td>
					<td>{{ $prestamo->Fecha_prestamo	                 }}</td>
					<td>{{ $prestamo->Fecha_devolucion                  }}</td>
					<td>{{ optional($prestamo->tipoDePrestamo)->tipoDePrestamo}}</td>
					<td>{{ optional($prestamo->consultanteBiblioteca)->Nombre}}</td>
					<td>{{ optional($prestamo->empleado)->Nombre}}</td>
					{{-- <td>{{ optional($prestamo->estadoMaterialBiblioteca)->codigo}}</td> --}}
					@empty
					<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
					

				 </tr>
				 @endforelse
			     </tbody>			
			  </table>
			  {{-- {{ $materialBibliotecas->render() }}  --}}
			</div>
			
	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection