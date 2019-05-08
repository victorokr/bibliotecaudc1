@extends('layouts.app')

@section('content')

@if (session()->has('infoDelete'))
<div class="alert alert-success">{{ session('infoDelete') }}</div>
@endif
	        
		        
	
<div class="container-empleados">
  <div class="row">		
	<div class="col-xl-12 col-md-12 col-sm-12 col-xs-4 col-lg-12"> 
	  <div class="card">
	    <div class="card-header"><i class="icono fas fa-users-cog"></i> Empleados <a class="btn btn-success 				btn-sm" href="{{ url('lista/empleados/create') }}"> <i class="fas fa-plus-circle"></i> crear 				empleado </a></div>
	       
	      <div class="card-body">   
				<div class="table-responsive">
			      <table class="table table-hover table-sm table-light table-bordered ">
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
					    @foreach ($listaempleados as $listaempleado) <!--desde el controlador, metodo index, se pasa la variable listaempleados-->

					    <tr>
					    	<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
									
										<a class="btn editar btn-info btn-sm" href="{{route('empleados.edit', $listaempleado->id_empleado) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
							 
								
									<form style="display: inline" method="POST" action="{{ route('empleados.destroy', $listaempleado->id_empleado) }}" >

										{!! csrf_field()!!}
										{!! method_field('DELETE')!!}

										<button class="btn eliminar btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> </button>
									</form>
							
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

									{{-- {{ $listaempleado->roles->pluck('display_name')->implode(' - ') }} --}}<!--esta linea hace lo mismo que el foreach, remplaza, y agrega la coma para separar los nombres de los roles-->
								</td>

						
							
								
					    </tr>
					
					    @endforeach
				   </tbody>
			      </table>
			    </div>
		  </div>
		<div class="card-footer"></div>  
	  </div>
	</div>
  </div>
</div>

@endsection