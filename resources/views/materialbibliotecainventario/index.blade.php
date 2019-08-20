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

		@if (session()->has('infoCreateMaterialBiblioteca'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoCreateMaterialBiblioteca') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif

		@if (session()->has('infoDeleteMaterial'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDeleteMaterial') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif

	</div>	
  </div>
</div>


<div class="container-inventario">
 <div class="row ">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-box-open"></i> Inventario <a class="btn btn-outline-primary btn-sm" title="Agregar Material"  href="{{ url('biblioteca/inventario/create') }}"> <i class="fas fa-plus-circle"></i> Nuevo Material</a></div>
       <div class="card-body">

            <form method="GET" action="{{ route('inventario.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-2">
			      <label class="sr-only" for="inlineFormInput">Codigo_ISBN</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Codigo_libro')}}" id="prueba" name="Codigo_libro" placeholder="codigo libro">
			    </div>
			    <div class="col-auto col-5">
			      <label class="sr-only" for="inlineFormInput">Titulo</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Titulo')}}" 
			      id="prueba" name="Titulo" placeholder="titulo">
			    </div>
			    <div class=" col-1">
			      <label class="sr-only" for="inlineFormInput">Sede</label>
			      <input type="text" class="form-control mb-2" value="{{ request('ubicaciones')}}" id="prueba" name="ubicaciones" placeholder="Sede">
			    </div>
			    
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('biblioteca/inventario') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			    <div class="logoudc col-auto " title="logoUDC">
			      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
			      
			    </div>

			  </div>
			</form>
			  

			<div class="table-responsive">
		      <table class="table table-hover table-sm   ">
			    <caption>Material Biblioteca</caption>
			     <thead class="thead-light">
				
				  <tr>
					<th>Acciones</th>
					<th>CodigoLibro</th>
					<th>Titulo</th>
					<th>tipoDeMaterial</th>
					<th>Baja</th>
					<th>Entrada</th>
					<th>FechaDeEntrada</th>
					<th>TrasladosDeSede</th>
					<th>Sede Actual</th>
					<th>Estado</th>

				  </tr>


			     </thead>

			     <tbody>
				 @forelse ($materialBibliotecas as $materialBiblioteca) <!--desde el controlador, metodo index, se pasa la variable materialBibliotecas. Forelse se usa para lanzar mensaje en caso de no haber registros-->

				 <tr>

					<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->

									{{-- <a class="editar btn btn-success btn-sm mr-1" title="AgregarEjemplares" href="{{route('biblioteca.show', $materialBiblioteca->id_materialBiblioteca) }}">
										<i class="fas fa-book-open"></i></a> --}} 

								
									<a class="editar btn btn-info btn-sm" title="Editar" href="{{route('inventario.edit', $materialBiblioteca->id_materialBiblioteca) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
						 
								
								
								{{-- <form style="display: inline" method="POST" action="{{ route('inventario.destroy', $materialBiblioteca->id_materialBiblioteca) }}" >

									{!! csrf_field()!!}
									{!! method_field('DELETE')!!}

									<button class="eliminar btn btn-danger btn-sm" title="Eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
								</form> --}}

								<button class="eliminar btn btn-danger btn-sm"
								 data-toggle="modal" onclick="deleteData({{$materialBiblioteca->id_materialBiblioteca}})" data-target="#delete"
								title="Eliminar"><i class="fas fa-trash-alt"></i></button>
						
					</td>
					
					<td>{{ $materialBiblioteca->Codigo_libro	        }}</td>
					<td>{{ $materialBiblioteca->Titulo                  }}</td>
					<td>{{ optional($materialBiblioteca->tipoDeMaterial)->Tipo_de_material                      }}</td>
					
					<td>{{ optional($materialBiblioteca->baja)->Baja      }}</td>
					<td>{{ $materialBiblioteca->entradas->pluck('Entrada')->implode(' - ')}}</td>
					<td>{{ $materialBiblioteca->created_at	        }}</td>

					<td>{{ $materialBiblioteca->salidas->pluck('Salida')->implode(' - ')}}</td>

					
					
					<td>{{ $materialBiblioteca->ubicaciones->pluck('Sede')->implode(' - ')}}</td>
					<td>{{ $materialBiblioteca->estado->pluck('Estado')->implode(' - ')}}</td>

					@empty
					<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
					

				 </tr>
				 @endforelse
			     </tbody>			
			  </table>
			    {{ $materialBibliotecas->render() }} {{-- paginacion --}}
			    <button class="eliminar btn btn-info btn-sm ml-0"
					data-toggle="modal" data-target="#total"
					title="Total Material"><i class="fas fa-dolly-flatbed"></i> Total material
				</button>
			</div>

			   {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Material</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar este material?</p>
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
						     function deleteData(id_materialBiblioteca)
						     {
						         var id = id_materialBiblioteca;
						         var url = '{{ route("inventario.destroy", ":id") }}';
						         url = url.replace(':id', id);
						         $("#deleteForm").attr('action', url);
						     }

						     function formSubmit()
						     {
						         $("#deleteForm").submit();
						     }
						   </script>
			    </div>

			    {{-- modal total --}}
			    <div class="modal " id="total" tabindex="-1" role="dialog">
				  <div class="modal-dialog  modal-sm"  role="document">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #52C4C0" >
				        <h5 class="modal-title"> Material por sedes</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      
					    <div class="modal-body">
					      {{-- <small><p>Total libros sede Tres:</small> {{ $materialBiblioteca->sedetresCount() }}</p>

					      <small><p>Total libros sede Dos:</small>  {{ $materialBiblioteca->sededosCount() }}</p>

					        <small><p>Total libros sede Uno:</small>  {{ $materialBiblioteca->sedeunoCount() }}</p>
					        
					        <p>Total Material Biblioteca: {{ $materialBiblioteca->totalBiblioteca() }}</p> --}}	

					        @foreach($materialBibliotecas as $materialBiblioteca)
					          @if ($loop->first)
					        	<small><p>Total libros sede Tres:</small> 
					        		{{ $materialBiblioteca->sedetresCount() }}</p>

					        	<small><p>Total libros sede Dos:</small>  
					        		{{ $materialBiblioteca->sededosCount() }}</p>

					        	<small><p>Total libros sede Uno:</small> 
					        	    {{ $materialBiblioteca->sedeunoCount() }}</p>

					        	<p>Total Material Biblioteca: {{ $materialBiblioteca->totalBiblioteca() }}</p>	
					          @endif
					        @endforeach
					        
					    </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
					      </div>
				      
				    </div>
				  </div>
			    </div>

	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection