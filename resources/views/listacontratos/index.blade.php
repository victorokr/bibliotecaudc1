@extends('layouts.app')
@section('content')


<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoDeleteContrato'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDeleteContrato') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
		@if (session()->has('infoContratoCreate'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoContratoCreate') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>

<div class="container-empleados">
  <div class="container">
	<div class="row">
	  <div class="col-12 ">
	    <div class="card">
	     <div class="card-header"><i class="icono fas fa-clipboard-list"></i> <small>{{ __('Lista de Contratos') }}</small> <a class="btn btn-outline-primary btn-sm" href="{{ url('lista/contratos/create') }}"> <i class="fas fa-plus-circle"></i> Nuevo</a> </div> 
	        <div class="card-body">
	        	<form method="GET" action="{{ route('contratos.index') }}">
				  <div class="form-row align-items-center">
				    <div class=" col-2">
				      <label class="sr-only" for="inlineFormInput">Contratos</label>
				      <input type="text" class="form-control mb-2" value="{{ request('empleado')}}" id="prueba" name="id_empleado" placeholder="Nombre Empleado">
				    </div>
				    
				    <div class="col-auto" title="Buscar">
				      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
				    </div>
				    <div class="col-auto" title="Restablecer">
				      <a href="{{ url('lista/contratos') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
				    </div>
				    <div class="logoudc col-auto " title="logoUDC">
				      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
				      
				    </div>

				  </div>
				</form>
			  <div class="table-responsive">
		        <table class="table table-hover table-sm  ">
			       <caption>Lista de Contratos</caption>
			       <thead class="thead-light">
	
					<tr>
						<th>Acciones</th>
						<th>ID</th>   <!--campos de la tabla-->
						<th>Jornada</th>
						<th>PeriodoDePrueba</th>
						<th>Salario</th>
				        <th>FechaInicio</th>
						<th>tipoDeContrato</th>
						<th>Cargo</th>
						<th>Empleado</th>
						<th>Empresa</th>
						
						
					</tr>


			        </thead>

			        <tbody>
						@forelse ($listacontratos as $listacontrato) <!--desde el controlador, metodo index, se pasa la variable listaempleados-->

						  <tr>
						  	<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
									
										<a class="editar btn btn-info btn-sm" href="{{route('contratos.edit', $listacontrato->id_contrato) }}">
											<i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
							 
									
									
									{{-- <form style="display: inline" method="POST" action="{{ route('contratos.destroy', $listacontrato->id_contrato) }}" >

										{!! csrf_field()!!}
										{!! method_field('DELETE')!!}

										<button class="eliminar btn btn-danger btn-sm" type="submit">
											<i class="fas fa-trash-alt"></i></button>
									</form> --}}
									<button class="eliminar btn btn-danger btn-sm"
								    data-toggle="modal" onclick="deleteData({{$listacontrato->id_contrato}})" data-target="#delete"
								    title="Eliminar"><i class="fas fa-trash-alt"></i></button>
							
							</td>
							<td>{{ $listacontrato->id_contrato       }}</td>
							<td>{{ $listacontrato->Jornada	         }}</td>
							<td>{{ $listacontrato->PeriodoDePrueba   }}</td>
							<td>{{ $listacontrato->Salario           }}</td>
							<td>{{ $listacontrato->FechaInicio       }}</td>
							<td>{{ optional($listacontrato->tipoDeContrato)->Tipo }}</td>
							<td>{{ optional($listacontrato->cargo)->Cargo       }}</td>
							<td>{{ optional($listacontrato->empleado)->Nombre       }}</td>
							<td>{{ optional($listacontrato->empresa)->Empresa        }}</td>
							@empty
			                <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
									
					      </tr>
					    @endforelse
			        </tbody>
		        </table>
		        {{ $listacontratos->render() }}
		      </div>

			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Contrato</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar este contrato?</p>
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
						     function deleteData(id_contrato)
						     {
						         var id = id_contrato;
						         var url = '{{ route("contratos.destroy", ":id") }}';
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