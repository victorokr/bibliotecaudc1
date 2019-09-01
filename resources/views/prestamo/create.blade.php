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
						
						  


			              <div class="table-responsive">
						      <table class="table table-hover table-sm   ">
							    <caption>Prestamo</caption>
							     <thead class="thead-light">
								
								  <tr>
									
									<th scope="col">TituloDelLibro</th>
									<th scope="col">Solicitante</th>
									<th scope="col">Sede-Ubicacion</th>
									
								  </tr>


							     </thead>

							   {{--   <tbody>
							     	<tr>
							     		
							     		<td>{{ auth()->user()->Nombre}}</td>

							     	</tr>
							     </tbody> --}}

							     <tbody>
								 @foreach ($consultaMaterial as $consultamaterial) 

								 <tr>

									
									
									<td>{{ $consultamaterial->Titulo}}</td>
									<td>{{ auth()->user()->Nombre}}</td>

									<td>{{ $consultamaterial->ubicaciones->pluck('Sede')->implode(' - ')}}</td>{{--  crear scope where idmaterial=idubicacion --}}




									
									{{-- <td>{{ $consultamaterial->estado->pluck('Estado')->implode(' - ')}}</td> --}}
									
									{{-- <td>{{ $consultamaterial->temaDelmaterial->pluck('Area')->implode(' - ')}}</td> --}}
									{{-- <td>{{ $consultamaterial->carreras->pluck('Carrera')->implode(' - ')}}</td> --}}

									 

									<td>
												
													
										
									</td>
									
									
									

								 </tr>
								 @endforeach
							     </tbody>			
							  </table>
							  
						  </div>


						    <form  method="POST" action="{{ route('consultante.store') }}"><!--empleados.store esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
							{!!csrf_field() !!} 

						    {{-- <div class="card-group">
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
								</div>


							 
								  
							</div> --}}
	
						              
							</form>	  
			           
			        </div>
	           </div>



	    </div>
	  </div>
    </div>
</div>

				




@endsection