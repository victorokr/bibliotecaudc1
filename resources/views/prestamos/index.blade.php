@extends('layouts.app')
@section('content')
 
@if (session()->has('infoUpdatePrestamo'))
<div class="alert alert-success">{{ session('infoUpdatePrestamo') }}</div>
@endif


<div class="container-indexprestamos">
 <div class="row ">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-book-reader"></i> Solicitudes de prestamos <a class="btn btn-success btn-sm" title="inicio"  href="{{ url('empleados/area') }}"> <i class="fas fa-home"></i> </a></div>
       <div class="card-body">

			<div class="table-responsive">
		      <table class="table table-hover table-sm table-light table-bordered ">
			    <caption>Prestamos</caption>
			     <thead class="thead-light">
				
				  <tr>
					<th>Acciones</th> 
					<th>Libro</th>
					<th>Codigo</th>
					<th>Sede</th>
					<th>TipoDePrestamo</th>
					<th>Solicitante</th>
					<th>Recepcion</th>
					<th>Novedades</th>
					<th>DiasRetrasados</th>
					<th>InicioDePrestamo</th>
					<th>FinDelPrestamo</th>
			        <th>EstadoDelPrestamo</th>
					
					

				  </tr>


			     </thead>

			     <tbody>
				 @forelse ($prestamoss as $prestamos) <!--desde el controlador, metodo index, se pasa la variable materialBibliotecas. Forelse se usa para lanzar mensaje en caso de no haber registros-->

				 <tr>

					<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
								
									<a class="editar btn btn-info btn-sm" title="iniciar prestamo" href="{{route('prestamos.edit', $prestamos->id_prestamo) }}"><i class="fas fa-edit"></i>Procesar</a> 
						 
								
								
								<form style="display: inline" method="POST" action="{{ route('prestamos.destroy', $prestamos->id_prestamo) }}" >

									{!! csrf_field()!!}
									{!! method_field('DELETE')!!}

									<button class="eliminar btn btn-danger btn-sm" title="Eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
								</form>
						
					</td>
					<td>{{ $prestamos->materialBibliotecas->pluck('Titulo')->implode(' - ')}}</td>
					<td>{{ $prestamos->materialBibliotecas->pluck('Codigo_libro')->implode(' - ')}}</td>
					
					<td>{{ $prestamos->ubicaciones->pluck('Sede')->implode(' - ')}}</td>
					<td>{{ optional($prestamos->tipoDePrestamo)->tipoDePrestamo}}</td>
					<td>{{ optional($prestamos->consultanteBiblioteca)->Nombre}}</td>
					<td>{{ optional($prestamos->empleado)->Nombre}}</td>

					<td>{{ $prestamos->novedades->pluck('novedad')->implode(' - ')}}</td>
					<td>{{ $prestamos->sanciones->pluck('diasTranscurridos')->implode(' - ')}}</td>

					<td>{{ $prestamos->Fecha_prestamo	                 }}</td>
					<td>{{ $prestamos->Fecha_devolucion                  }}</td>
					<td>{{ optional($prestamos->estado)->Estado}}</td>
					
					
					{{-- <td>{{ optional($prestamo->estadoMaterialBiblioteca)->codigo}}</td> --}}
					@empty
					<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
					

				 </tr>
				 @endforelse
			     </tbody>			
			  </table>
			  {{ $prestamoss->render() }} 
			</div>
			
	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection