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
						
						  <form method="GET" action="{{ route('consultante.create') }}">
							  <div class="form-row align-items-center">
							    <div class=" col-2">
							      <label class="sr-only" for="inlineFormInput">Codigo_ISBN</label>
							      <input type="text" class="form-control mb-2" value="{{ request('Codigo_ISBN')}}" id="prueba" name="Codigo_ISBN" placeholder="codigo ISBN">
							    </div>
							    <div class="col-auto col-5">
							      <label class="sr-only" for="inlineFormInput">Titulo</label>
							      <input type="text" class="form-control mb-2" value="{{ request('Titulo')}}" 
							      id="prueba" name="Titulo" placeholder="titulo">
							    </div>
							    
							    <div class="col-auto" title="Buscar">
							      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
							    </div>
							    <div class="col-auto" title="Restablecer">
							      <a href="{{ url('prestamo/consultante/create') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
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
									
								  </tr>


							     </thead>

							     <tbody>
								 @forelse ($consultaMaterial as $consultamaterial) 

								 <tr>

									
									<td>{{ optional($consultamaterial)->Codigo_ISBN}}</td>
									<td>{{ optional($consultamaterial)->Titulo}}</td>
									<td>{{ $consultamaterial->estado->pluck('Estado')->implode(' - ')}}</td>
									<td>{{ $consultamaterial->ubicaciones->pluck('Sede')->implode(' - ')}}</td>

									

									 

									<td>
												
													
										
									</td>
									
									@empty
									<div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
									

								 </tr>
								 @endforelse
							     </tbody>			
							  </table>
							  {{ $consultaMaterial->render() }} 
						  </div>


						    <form  method="POST" action="{{ route('consultante.store') }}"><!--empleados.store esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
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
								</div>


							  {{-- @if (auth()->user()->hasRoles(['Empleado']))
								<div class="card border-light">
									<div class="card-body justify-content-center">	
									  <div class="form-row align-items-center">   
									     <div class="col-8">
									  	  <div class="input-group input-group-sm mb-3"> 
										  	  <div class="input-group-prepend">
										  		<span class="input-group-text">Fecha de Inicio</span>
										  		<input class="form-control"  id="validationCustom01" style="width: 215px" type="date" name="Fecha_prestamo"
										  		 value="{{old('Fecha_prestamo')  }}">
										  	  </div>	  
										  		<div class="valid-feedback">¡se ve bien!</div>
												<small id="passwordHelpBlock" class="form-text text-muted">
						                         
												</small>
												{!!$errors->first('Fecha_prestamo','<span class=error>:message</span>')!!} 
										  </div> 
										 </div>
										   

										 <div class="col-8">
										    <div class="input-group input-group-sm mb-3">
										      <div class="input-group-prepend">
												<span class="input-group-text">Fecha Devolucion</span>
												<input class="form-control"  id="validationCustom02" type="date" name="Fecha_devolucion" 
												value="{{ old('Fecha_devolucion')}}">
											  </div>	
												<div class="valid-feedback">¡se ve bien!</div>
												<small id="passwordHelpBlock" class="form-text text-muted">
						                         
												</small>
												{!!$errors->first('Fecha_devolucion','<span class=error>:message</span>')!!}
											</div>
										 </div>	


										 <div class="col-12">
										  	<div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">
										  	  	<span class="input-group-text">Recibe</span>
									  			<select name="id_empleado" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 265px">
													   <option value="" selected>seleccionar</option>	
													   @foreach ($recibee as $recibe=>$Nombre)    
													     <option value="{{ $recibe }}"
													      {{ old('id_empleado') }} >
													      {{$Nombre}} </option>
													   @endforeach
												</select>
										  	  </div>
										  	  	<div class="valid-feedback">¡se ve bien!</div> 
												{!!$errors->first('id_empleado','<span class=error>:message</span>')!!}
										  	</div>
										 </div>

									  </div>    
									</div>
								</div>



								<div class="card border-light">
									<div class="card-body">
									  <div class="form-row align-items-center">
										 <div class="col-12">
									  		<div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">	
									  			  <span class="input-group-text">Novedades</span>	
									  			  <select  class="novedades form-control custom-select mr-sm-2" id="validationCustom5" name="novedades[]" multiple="multiple" style="width: 245px"> 
										  			@foreach ($novedadess  as $novedades => $novedad)
											  			<option value="{{ $novedades }}">
											  			{{ $novedad }}</option>
										  			@endforeach
										  		   </select>	
										  	  </div>
										  	  <script type="text/javascript" >
										  		  	$(document).ready(function() {
						    						$('.novedades').select2();
						    						placeholder: "seleccionar"
						    						tags : true
													});
										  	  </script>
										  	   {!!$errors->first('novedades','<span class=error>:message</span>')!!}
										    </div>  
										</div>


										<div class="col-12">
									  		<div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">	
									  			  <span class="input-group-text">diasRetrasados</span>	
									  			  <select  class="sancion form-control custom-select mr-sm-2" id="validationCustom6" name="sanciones[]" multiple="multiple" style="width: 220px"> 
										  			@foreach ($sancioness  as $sanciones => $diasTranscurridos)
											  			<option value="{{ $sanciones }}">
											  			{{ $diasTranscurridos }}</option>
										  			@endforeach
										  		   </select>	
										  	  </div>
										  	  <script type="text/javascript" >
										  		  	$(document).ready(function() {
						    						$('.sancion').select2();
						    						placeholder: "seleccionar"
						    						tags : true
													});
										  		  </script>
										  	   {!!$errors->first('sanciones','<span class=error>:message</span>')!!}
										    </div>  
										</div>


										<div class="col-12">
										  	<div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">
										  	  	<span class="input-group-text">Estado</span>
									  			<select name="id_estado" class="form-control custom-select  mr-sm-2" id="validationCustom07" style="width: 272px">
													   <option value="" selected>seleccionar</option>	
													   @foreach ($estadoPrestamoo as $estadoPretamo=>$Estado)    
													     <option value="{{ $estadoPretamo }}" {{ old('id_estado') }} >
													      {{$Estado}} </option>
													   @endforeach
												</select>
										  	  </div>
										  	  	<div class="valid-feedback">¡se ve bien!</div> 
												{!!$errors->first('id_estado','<span class=error>:message</span>')!!}
										  	</div>
										 </div>

											
									  </div>	
									</div>
								</div>
							  @endif --}}
								  
							</div>
	
						              
							</form>	  
			           
			        </div>
	           </div>



	    </div>
	  </div>
    </div>
</div>

				{{-- <script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function() {
				  'use strict';
				  window.addEventListener('load', function() {
				    // Fetch all the forms we want to apply custom Bootstrap validation styles to
				    var forms = document.getElementsByClassName('needs-validation');
				    // Loop over them and prevent submission
				    var validation = Array.prototype.filter.call(forms, function(form) {
				      form.addEventListener('submit', function(event) {
				        if (form.checkValidity() === false) {
				          event.preventDefault();
				          event.stopPropagation();
				        }
				        form.classList.add('was-validated');
				      }, false);
				    });
				  }, false);
				})();
				</script> --}}




@endsection