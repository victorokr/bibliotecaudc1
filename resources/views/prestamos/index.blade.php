@extends('layouts.app')
@section('content')
 
<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoUpdatePrestamo'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoUpdatePrestamo') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
		@if (session()->has('infoDeletePrestamo'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDeletePrestamo') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>


<div class="container-indexprestamos">
 <div class="row ">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-book-reader"></i> Solicitudes de prestamos <a class="btn btn-success btn-sm" title="inicio"  href="{{ url('empleados/area') }}"> <i class="fas fa-home"></i> </a></div>
       <div class="card-body">
       	      <form method="GET" action="{{ route('prestamos.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-2">
			      <label class="sr-only" for="inlineFormInput">Autor</label>
			      <input type="text" class="form-control mb-2" 
			      value="{{ request('consultanteBiblioteca')}}" id="prueba" name="id_consultanteBiblioteca" placeholder="Solicitante">
			    </div>
			    
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('prestamos') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			    <div class="logoudc col-auto " title="logoUDC">
			      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
			      
			    </div>

			  </div>
			</form>

			<div class="table-responsive">
		      <table class="table table-hover table-sm  ">
			    <caption>Prestamos</caption>
			     <thead class="thead-light">
				
				  <tr>
					<th>Acciones</th> 
					<th>Libro</th>
					<th>Codigo</th>
					<th>Sede</th>
					<th>Solicitante</th>
					<th>TipoDePrestamo</th>
					<th>Recepcion</th>
					<th>InicioDePrestamo</th>
					<th>FinDelPrestamo</th>
					<th>EstadoDelPrestamo</th>
					<th>Novedades</th>
					<th>Multa</th>
			        <th>Acciones</th>
					
					

				  </tr>


			     </thead>

			     <tbody>
				 @forelse ($prestamoss as $prestamos) <!--desde el controlador, metodo index, se pasa la variable materialBibliotecas. Forelse se usa para lanzar mensaje en caso de no haber registros-->

				 <tr>

					<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
								
									<a class="editar btn btn-info btn-sm" title="iniciar prestamo" href="{{route('prestamos.edit', $prestamos->id_prestamo) }}"><i class="fas fa-edit"></i>Procesar</a> 
						 
								
								
								{{-- <form style="display: inline" method="POST" action="{{ route('prestamos.destroy', $prestamos->id_prestamo) }}" >

									{!! csrf_field()!!}
									{!! method_field('DELETE')!!}

									<button class="eliminar btn btn-danger btn-sm" title="Eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
								</form> --}}

								<button class="eliminar btn btn-danger btn-sm"
								data-toggle="modal" onclick="deleteData({{$prestamos->id_prestamo}})" data-target="#delete"
								title="Eliminar"><i class="fas fa-trash-alt"></i></button>
						
					</td>
					<td>{{ $prestamos->materialBibliotecas->pluck('Titulo')->implode(' - ')}}</td>
					<td>{{ $prestamos->materialBibliotecas->pluck('Codigo_libro')->implode(' - ')}}</td>
					
					<td>{{ $prestamos->ubicaciones->pluck('Sede')->implode(' - ')}}</td>
					<td>{{ optional($prestamos->consultanteBiblioteca)->Nombre}}</td>
					<td>{{ optional($prestamos->tipoDePrestamo)->tipoDePrestamo}}</td>
					
					<td>{{ optional($prestamos->empleado)->Nombre}}</td>

					<td>{{ $prestamos->Fecha_prestamo	                 }}</td>
					<td>{{ $prestamos->Fecha_devolucion                  }}</td>
					<td>{{ optional($prestamos->estado)->Estado}}</td>
					<td>{{ $prestamos->novedades->pluck('novedad')->implode(' - ')}}</td>
					<td>{{ $prestamos->sanciones->pluck('multa')->implode(' - ')}}</td>
					
					
					@if($prestamos->id_estado === 4)
					<td>
						<a class="editar btn btn-secondary btn-sm" 
						href="{{route('prestamos.show', $prestamos->id_prestamo)}}"><i class="fas fa-eye-slash"></i>Finalizado</a>
						
					</td>
					@else
					<td>
						<a class="editar btn btn-success btn-sm" 
						href="{{route('prestamos.show', $prestamos->id_prestamo)}}"><i class="far fa-eye"></i>  Finalizar...</a>
						
					</td>
					@endif

					
					
					{{-- <td>{{ optional($prestamo->estadoMaterialBiblioteca)->codigo}}</td> --}}
					@empty
					<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
					

				 </tr>
				 @endforelse
			     </tbody>			
			  </table>
			  {{ $prestamoss->render() }}
			  		{{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar prestamo</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar el prestamo?</p>
					        {{-- <input type="hidden" name="id_materialBiblioteca" value=""> --}}
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-danger" data-dismiss="modal"
					      	onclick="formSubmit()">Si</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					      </div>
				    </div>
				   </form>
				  </div>
				           <script type="text/javascript">
						     function deleteData(id_prestamo)
						     {
						         var id = id_prestamo;
						         var url = '{{ route("prestamos.destroy", ":id") }}';
						         url = url.replace(':id', id);
						         $("#deleteForm").attr('action', url);
						     }

						     function formSubmit()
						     {
						         $("#deleteForm").submit();
						     }
						   </script>
			    </div> 
			</div>
			
	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection