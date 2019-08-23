@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoDelete'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDelete') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
		@if (session()->has('infoCreate'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoCreate') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>
	        
		        
	
<div class="container-empleados">
  <div class="row">		
	<div class="col-xl-12 col-md-12 col-sm-12 col-xs-4 col-lg-12"> 
	  <div class="card">
	    <div class="card-header"><i class="icono fas fa-users-cog"></i> Empleados <a class="btn btn-primary btn-sm" href="{{ url('lista/empleados/create') }}"> <i class="fas fa-plus-circle"></i> crear empleado </a></div>
	       
	      <div class="card-body">
	            <form method="GET" action="{{ route('empleados.index') }}">
				  <div class="form-row align-items-center">
				    <div class=" col-2">
				      <label class="sr-only" for="inlineFormInput">Empleado</label>
				      <input type="text" class="form-control mb-2" value="{{ request('Nombre')}}" id="prueba" name="Nombre" placeholder="Nombre">
				    </div>
				    
				    <div class="col-auto" title="Buscar">
				      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
				    </div>
				    <div class="col-auto" title="Restablecer">
				      <a href="{{ url('lista/empleados') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
				    </div>
				    <div class="logoudc col-auto " title="logoUDC">
				      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
				      
				    </div>

				  </div>
				</form>   
				<div class="table-responsive">
			      <table class="table table-hover table-sm  ">
				    <caption>Lista de Empleados</caption>
				    <thead class="thead-light">
					
					<tr>
						<th>Acciones</th>
						{{-- <th>Eliminar</th> --}}
						<th>ID</th>   <!--campos de la tabla-->
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Email</th>
				        <th>Telefono</th>
						<th>Direccion</th>
						<th>Role</th>
						
						</tr>
					</thead>

				    <tbody>
					    @forelse ($listaempleados as $listaempleado) <!--desde el controlador, metodo index, se pasa la variable listaempleados-->

					    <tr>
					    	<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
									
										<a class="btn editar btn-info btn-sm" href="{{route('empleados.edit', $listaempleado->id_empleado) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
							 
								
									{{-- <form style="display: inline" method="POST" action="{{ route('empleados.destroy', $listaempleado->id_empleado) }}" >

										{!! csrf_field()!!}
										{!! method_field('DELETE')!!}

										<button class="btn eliminar btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> </button>
									</form> --}}
									<button class="eliminar btn btn-danger btn-sm"
								     data-toggle="modal" onclick="deleteData({{$listaempleado->id_empleado}})" data-target="#delete"
								      title="Eliminar"><i class="fas fa-trash-alt"></i></button>
							
							</td>

								<td>{{ $listaempleado->id_empleado }}</td>
								<td>{{ $listaempleado->Nombre	   }}</td>
								<td>{{ $listaempleado->Apellidos   }}</td>
								<td>{{ $listaempleado->email       }}</td>
								<td>{{ $listaempleado->Telefono    }}</td>
								<td>{{ $listaempleado->Direccion   }}</td>

								<td>
								{{-- @foreach ($listaempleado->roles as $role)
									{{ $role->display_name         }}
									@endforeach --}}

									{{ $listaempleado->roles->pluck('display_name')->implode(' - ') }}<!--esta linea hace lo mismo que el foreach, remplaza, y agrega la coma para separar los nombres de los roles-->
								</td>
								@empty
			                    <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
						
							
								
					    </tr>
					
					    @endforelse
				   </tbody>
			      </table>
			      {{$listaempleados->render()}}
			    </div>
			    {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Empleado</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar este Empleado?</p>
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
						     function deleteData(id_empleado)
						     {
						         var id = id_empleado;
						         var url = '{{ route("empleados.destroy", ":id") }}';
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
		<div class="card-footer"></div>  
	  </div>
	</div>
  </div>
</div>

@endsection