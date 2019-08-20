@extends('layouts.app')
@section('content')
 
<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoDeleteConsultantes'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDeleteConsultantes') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>

<div class="container-consultantes">
  <div class="row ">
	<div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
	  <div class="card">
		<div class="card-header"><i class="fas fa-book-reader"></i> Consultantes <a class="btn btn-outline-primary btn-sm" title="Agregar consultante" href="{{ url('lista/consultantes/create') }}"> <i class="fas fa-plus-circle"></i> Agregar</a></div>
         <div class="card-body">
		  <form method="GET" action="{{ route('consultantes.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-2">
			      <label class="sr-only" for="inlineFormInput">Documento</label>
			      <input type="text" class="form-control" value="{{ request('Documento')}}" id="prueba" name="Documento" placeholder="Documento">
			    </div>
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-4 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('lista/consultantes') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			    <div class="logoudc col-auto " title="logoUDC">
			      <img class="card-img-top img-fluid  " src="/images/logoUDC.jpg"  >	
			      
			    </div>

			  </div>
		  </form>



		 
			<div class="table-responsive">
			  <table class="table table-hover table-sm  ">
				    <caption>Lista de Consultantes</caption>
				    <thead class="thead-light">
						<tr>
							<th>Acciones</th>
							<th>ID</th>   <!--campos de la tabla-->
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Documento</th>
							<th>Telefono</th>
					        <th>Direccion</th>
							<th>email</th>
							<th>lugarDeResidencia</th>
							<th>institucionUniversidad</th>
							<th>facultad</th>
							<th>tipoDeConsultante</th>
							<th>Perfil</th>
						</tr>
				    </thead>

				    <tbody>
					    @forelse ($listaconsultantes as $listaconsultante) <!--desde el controlador, metodo index, se pasa la variable listaempleados-->

					      <tr>
					      	<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							   <a class="editar btn btn-info btn-sm" title="editar" href="{{route('consultantes.edit', $listaconsultante->id_consultanteBiblioteca) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
							 
										
								{{-- <form style="display: inline" method="POST" action="{{ route('consultantes.destroy', $listaconsultante->id_consultanteBiblioteca) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}
								<button class="eliminar btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
								</form> --}}
								<button class="eliminar btn btn-danger btn-sm"
								 data-toggle="modal" onclick="deleteData({{$listaconsultante->id_consultanteBiblioteca}})" data-target="#delete"
								title="Eliminar"><i class="fas fa-trash-alt"></i></button>
							
							</td>
							<td>{{ $listaconsultante->id_consultanteBiblioteca   }}</td>
							<td>{{ $listaconsultante->Nombre	                 }}</td>
							<td>{{ $listaconsultante->Apellidos                  }}</td>
							<td>{{ $listaconsultante->Documento                  }}</td>
							<td>{{ $listaconsultante->Telefono                   }}</td>
							<td>{{ $listaconsultante->Direccion                  }}</td>
							<td>{{ $listaconsultante->email                      }}</td>
							<td>{{ $listaconsultante->lugarDeResidencia          }}</td>
							<td>{{ optional($listaconsultante->institucionUniversidadd)->institucion_Universidad }}</td>
							<td>{{ optional($listaconsultante->facultadd)->facultad }}</td>
							<td>{{ optional($listaconsultante->tipoDeConsultante)->tipoDeConsultante       }}</td>
							<td>
							{{ $listaconsultante->perfiles->pluck('Nombre_perfil')->implode(' - ') }}<!--esta linea hace lo mismo que el foreach, remplaza, y agrega la coma para separar los nombres de los roles-->
							</td>
							@empty
					        <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
							
					      </tr>
					    @endforelse
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
									     function deleteData(id_consultanteBiblioteca)
									     {
									         var id = id_consultanteBiblioteca;
									         var url = '{{ route("consultantes.destroy", ":id") }}';
									         url = url.replace(':id', id);
									         $("#deleteForm").attr('action', url);
									     }

									     function formSubmit()
									     {
									         $("#deleteForm").submit();
									     }
									   </script>
						    </div>
				    </tbody>
			  </table>
			  {{ $listaconsultantes->render() }}
		    </div>
		         

		 </div>
	  </div>	
	</div>			
  </div>
</div>
@endsection