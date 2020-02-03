@extends('layouts.app')
@section('content')
 
<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoPrestamo'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoPrestamo') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>

<div class="container-indexprestamo">
	<div class="row justify-content-center">
		<div class="col-auto col-12">
		  <div class="card border-light">
			<div class="card-header"><i class="fas fa-book-reader"></i> Solicitud de prestamo <a class="btn btn-success btn-sm" title="prestamo"  href="{{ url('prestamo/consultante/create') }}"> <i class="fas fa-book-reader"></i> </a></div>
			   <div class="card-group">
					<div class="card-body">
						
						  <form method="GET" action="{{ route('consultante.index') }}">
							  <div class="form-row align-items-center">
							    <div class=" col-2 mr-5">
							      <label class="sr-only" for="inlineFormInput">Carrera</label>
							      <input type="text" class="form-control mb-2" value="{{ request('carreras')}}" id="prueba" name="carreras" placeholder="Carrera" style="width: 227px">
							    </div>
							    <div class="col-auto col-4 mr-1">
							      <label class="sr-only" for="inlineFormInput">Titulo</label>
							      <input type="text" class="form-control mb-2" value="{{ request('Titulo')}}" 
							      id="prueba" name="Titulo" placeholder="Titulo y Codigo ISBN"style="width: 370px" >
							    </div>
							    <div class="col-auto col-2 mr-2">
							      <label class="sr-only" for="inlineFormInput">TemaDelLibro</label>
							      <input type="text" class="form-control mb-2" value="{{ request('temaDelMaterial')}}" 
							      id="prueba" name="temaDelMaterial" placeholder="Tema del Libro"style="width: 185px">
							    </div>
							    
							    <div class="col-auto" title="Buscar">
							      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
							    </div>
							    <div class="col-auto" title="Restablecer">
							      <a href="{{ url('prestamo/consultante') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
							    </div>
							    <div class="logoudc col-auto " title="logoUDC">
			                      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
			                    </div>
							  </div>
			              </form>


			              <div class="table-responsive">
						      <table class="table table-hover table-sm   ">
							    <caption>Prestamo</caption>
							     <thead class="thead-light">
								
								  <tr>
									<th>Codigo ISBN</th>
									<th>TituloDelLibro</th>
									<th>Estado</th>
									<th>Sede-Ubicacion</th>
									<th>Tema</th>
									<th>Carrera</th>
									<th>Acciones</th>
								  </tr>


							     </thead>

							     <tbody>
								 @forelse ($consultaMaterial as $consultamaterial) 

								 <tr>

									
									<td>{{ optional($consultamaterial)->Codigo_ISBN}}</td>
									<td>{{ optional($consultamaterial)->Titulo}}</td>
									<td>{{ $consultamaterial->estado->pluck('Estado')->implode(' - ')}}</td>
									<td>{{ $consultamaterial->ubicaciones->pluck('Sede')->implode(' - ')}}</td>
									<td>{{ $consultamaterial->temaDelmaterial->pluck('Area')->implode(' - ')}}</td>
									<td>{{ $consultamaterial->carreras->pluck('Carrera')->implode(' - ')}}</td>






									@if( $consultamaterial->estado->pluck('Estado')->implode(' - ') === ('En Prestamo'))
										<td>

											<a class="btn btn-secondary btn-sm ml-0" href="#" role="button"disabled><i class="fas fa-business-time"></i> ocupado</a>
											
										</td>
									    

									@else



									 
									<td>

										<a class="editar btn btn-info btn-sm" 
											href="{{
												route (
													'consultante.create',
													array (
													'id_materialBiblioteca' => 
													$consultamaterial->id_materialBiblioteca,

													'tituloLibro' => $consultamaterial->Titulo,

													'ubicaciones' => $consultamaterial->ubicaciones->pluck('Sede')->implode(' - '),

													'idUbicaciones' => $consultamaterial->ubicaciones->pluck('id_ubicacion')->implode(' - '),

													)
												)
												 
											}}
										">
											<i class="fas fa-edit"></i>Prestamo</a> <!--crea el enlace sobre editar-->	

									</td>
									@endif


									
									@empty
									<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
									

								 </tr>
								 @endforelse
							     </tbody>			
							  </table>
							  {{ $consultaMaterial->render() }} 
						  </div>


						   {{--  <form  method="POST" action="{{ route('consultante.store') }}"><!--empleados.store esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
							{!!csrf_field() !!} 

						    <div class="card-group">
						    	<div class="card border-light">
									<div class="card-body"> 
									    <div class="form-row align-items-center"> 
										 <div class="col-12">
									  		<div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">	
									  			  <span class="input-group-text">Libros</span>	
									  			  <select name="materialBibliotecas[]" class="libros form-control custom-select mr-sm-2" id="validationCustom3"  multiple="multiple" style="width: 285px" title="Ingresa el libro de la busqueda" required> 
										  			@foreach ($listaMateriall  as $listaMaterial => $Titulo)
											  			<option value="{{ $listaMaterial }}">
											  			{{ $Titulo }}</option>
										  			@endforeach
										  		   </select>	
										  	  </div>
										  	      <script type="text/javascript" >
										  		  	$(document).ready(function() {
						    						$('.libros').select2();
						    						placeholder: "seleccionar"
						    						tags : true
						    						$(".libros").select2({
													  maximumSelectionLength: 1
													});
													});
										  		  </script>
										  	   {!!$errors->first('libros','<span class=error>:message</span>')!!}
										    </div>  
										</div>


										 <div class="col-12">
										  	<div class="input-group input-group-sm mb-1"> 
										  	  <div class="input-group-prepend">
										  	  	<span class="input-group-text">Solicitante</span>
									  			<select name="id_consultanteBiblioteca" class="solicitante form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 260px" title="Selecciona tu Nombre" required>
													   <option value="" selected>ingresa tu nombre</option>	
													   @foreach ($solicitantee as $solicitante=>$Nombre)    
													     <option value="{{ $solicitante }}">
													      {{$Nombre}} </option>
													   @endforeach
												</select>
										  	  </div>
										  	  <script type="text/javascript" >
										  		  	$(document).ready(function() {
						    						$('.solicitante').select2();
						    						placeholder: "seleccionar"
						    						tags : true
													});
										  	  </script>	 
											  {!!$errors->first('solicitante','<span class=error>:message</span>')!!}
										  	</div>
										 </div>


										 
										</div> 
									</div>
									<div class="row justify-content-start">
										<div class="col-12">
											<input class="btn btn-success  btn-sm  mt-1" type="submit" value="Enviar">
										</div>
								    </div>	 
								</div>



								<div class="card border-light">
									<div class="card-body">
									  <div class="form-row align-items-center">

									  	 <div class="col-12">
										  	<div class="input-group input-group-sm mb-3"> 
										  	  <div class="input-group-prepend">
										  	  	<span class="input-group-text">TipoDePrestamo</span>
									  			<select name="id_tipoDePrestamo" class="form-control custom-select  mr-sm-2" id="validationCustom04" style="width: 222px" required>
													   <option value="" selected>seleccionar</option>	
													   @foreach ($tipoDePrestamoo as $tipo=>$tipoDePrestamo)    
													     <option value="{{ $tipo }}" {{ old('id_tipoDePrestamo') }} >
													      {{$tipoDePrestamo}} </option>
													   @endforeach
												</select>
										  	  </div>
										  	  	<div class="valid-feedback">¡se ve bien!</div> 
												{!!$errors->first('tipoDePrestamo','<span class=error>:message</span>')!!}
										  	</div>
										 </div>



										 <div class="col-12">
									  		<div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">	
									  			  <span class="input-group-text">SedeDelLibro</span>	
									  			  <select  class="sede form-control custom-select mr-sm-2" id="validationCustom5" name="ubicaciones[]" multiple="multiple" style="width: 245px"  title="Ingresa La Sede del Libro Buscado" required> 
										  			@foreach ($ubicacioness  as $ubicaciones => $Sede)
											  			<option value="{{ $ubicaciones }}">
											  			{{ $Sede }}</option>
										  			@endforeach
										  		   </select>	
										  	  </div>
										  	  <script type="text/javascript" >
										  		  	$(document).ready(function() {
						    						$('.sede').select2();
						    						placeholder: "seleccionar"
						    						tags : true
													});
										  	  </script>
										  	   {!!$errors->first('Sede','<span class=error>:message</span>')!!}
										    </div>  
										</div>	
									  </div>	
									</div>
								</div> --}}


							 
								  
							</div>
	
						              
							</form>	  
			           
			        </div>
	           </div>



	    </div>
	  </div>
    </div>
</div>

{{-- <script>
	
	function solPrestamo(){
		alert("A");
	}
</script> --}}

@endsection