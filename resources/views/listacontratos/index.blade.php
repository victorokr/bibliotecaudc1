@extends('layouts.app')
@section('content')

@if (session()->has('infoDeleteContrato'))
<div class="alert alert-success">{{ session('infoDeleteContrato') }}</div>
@endif

<div class="container-mensajes">
  <div class="container">
	<div class="row">
	  <div class="col-12 ">
	    <div class="card">
	     <div class="card-header"><i class="icono fas fa-clipboard-list"></i> <small>{{ __('Lista de Contratos') }}</small></div> 
	        <div class="card-body">
			  <div class="table-responsive">
		        <table class="table table-hover table-sm table-light table-bordered ">
			       <caption>Lista de Contratos</caption>
			       <thead class="thead-light">
	
					<tr>
						<th>ID</th>   <!--campos de la tabla-->
						<th>Jornada</th>
						<th>PeriodoDePrueba</th>
						<th>Salario</th>
				        <th>FechaInicio</th>
						<th>tipoDeContrato</th>
						<th>Cargo</th>
						<th>Empleado</th>
						<th>Empresa</th>
						<th>Acciones</th>
						
					</tr>


			        </thead>

			        <tbody>
						@foreach ($listacontratos as $listacontrato) <!--desde el controlador, metodo index, se pasa la variable listaempleados-->

						  <tr>
							<td>{{ $listacontrato->id_contrato       }}</td>
							<td>{{ $listacontrato->Jornada	         }}</td>
							<td>{{ $listacontrato->PeriodoDePrueba   }}</td>
							<td>{{ $listacontrato->Salario           }}</td>
							<td>{{ $listacontrato->FechaInicio       }}</td>
							<td>{{ optional($listacontrato->tipoDeContrato)->Tipo }}</td>
							<td>{{ optional($listacontrato->cargo)->Cargo       }}</td>
							<td>{{ optional($listacontrato->empleado)->Nombre       }}</td>
							<td>{{ optional($listacontrato->empresa)->Empresa        }}</td>

									<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
									
										<a class="editar btn btn-info btn-sm" href="{{route('contratos.edit', $listacontrato->id_contrato) }}">
											<i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
							 
									
									
									<form style="display: inline" method="POST" action="{{ route('contratos.destroy', $listacontrato->id_contrato) }}" >

										{!! csrf_field()!!}
										{!! method_field('DELETE')!!}

										<button class="eliminar btn btn-danger btn-sm" type="submit">
											<i class="fas fa-trash-alt"></i></button>
									</form>
							
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
</div>

@endsection