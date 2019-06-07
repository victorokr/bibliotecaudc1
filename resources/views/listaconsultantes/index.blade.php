@extends('layouts.app')
@section('content')
 
@if (session()->has('infoDeleteConsultantes'))
<div class="alert alert-success">{{ session('infoDeleteConsultantes') }}</div>
@endif

<div class="container-consultantes">
  <div class="row ">
	<div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
	  <div class="card">
		<div class="card-header"><i class="fas fa-book-reader"></i> Consultantes <a class="btn btn-success btn-sm" href="{{ url('lista/consultantes/create') }}"> <i class="fas fa-plus-circle"></i> Consultante</a></div>      
		 <div class="card-body">
			<div class="table-responsive">
			  <table class="table table-hover table-sm table-light table-bordered ">
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
					    @foreach ($listaconsultantes as $listaconsultante) <!--desde el controlador, metodo index, se pasa la variable listaempleados-->

					      <tr>
					      	<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							   <a class="editar btn btn-info btn-sm" href="{{route('consultantes.edit', $listaconsultante->id_consultanteBiblioteca) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
							 
										
								<form style="display: inline" method="POST" action="{{ route('consultantes.destroy', $listaconsultante->id_consultanteBiblioteca) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}
								<button class="eliminar btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
								</form>
							
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