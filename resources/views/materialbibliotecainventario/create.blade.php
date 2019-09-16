@extends('layouts.app')
@section('content')

@if (session()->has('info'))
<div class="alert alert-success">{{ session('info') }}</div>
@endif

<div class="contenedorEditEmpleados">
	<div class="row justify-content-center">
		<div class="col-12">
		  <div class="card border-light ">
			<div class="card-header"><i class="icono fas fa-plus-circle"></i> <small>{{ __('Agregar Material') }}</small></div>

			

		   <div class="card-deck">
				<div class="card-body">
					<div class="card bg-light mb-3 text-star">
					    <form  method="POST" action="{{ route('inventario.store') }}"><!--empleados.store esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						
						

					            {!!csrf_field() !!} 

							    <div class="card-deck">
									<div class="card border-light bg-light">
									  <div class="card-header text-center"><small>Informacion basica del Material</small></div>
										<div class="card-body justify-content-star">	
										    
										     <div class="col-8">
										  	  <div class="input-group input-group-sm mb-3"> 
											  	  <div class="input-group-prepend">
											  		<span class="input-group-text">Codigo_libro</span>
											  		<input class="form-control"  id="validationCustom01" type="text" name="Codigo_libro" value="{{ old('Codigo_libro')  }} " style="width: 170px"  required>
											  	  </div>	  
											  		<div class="valid-feedback">¡se ve bien!</div>
													<small id="passwordHelpBlock" class="form-text text-muted">
							                         
													</small>
													{!!$errors->first('Codigo_libro','<span class=error>:message</span>')!!} 
											  </div> 
											 </div>

											 <div class="col-8">
											    <div class="input-group input-group-sm mb-3">
											      <div class="input-group-prepend">
													<span class="input-group-text">Codigo_ISBN</span>
													<input class="form-control"  id="validationCustom02" type="text" name="Codigo_ISBN" value="{{ old('Codigo_ISBN')}}"  style="width: 168px" required >
												  </div>	
													<div class="valid-feedback">¡se ve bien!</div>
													<small id="passwordHelpBlock" class="form-text text-muted">
							                         
													</small>
													{!!$errors->first('Codigo_ISBN','<span class=error>:message</span>')!!}
												</div>
											 </div>	
											   
								

											 <div class="col-8">
												<div class="input-group input-group-sm mb-3">
											      <div class="input-group-prepend">
												    <span class="input-group-text">Titulo</span>
										  			<input class="form-control"  id="validationCustom02" type="text" name="Titulo" value="{{ old('Titulo')  }}" style="width: 215px" required>
										  		  </div>
										  			<div class="valid-feedback">¡se ve bien!</div>
										  			<small id="passwordHelpBlock" class="form-text text-muted">
							                         
													</small>
													{!!$errors->first('Titulo','<span class=error>:message</span>')!!}
											    </div>
											 </div>

											 <div class="col-12 pt-2">
										  		  <div class="input-group input-group-sm mb-4 mr-1">	
										  			<div class="input-group-prepend">
										     		<label class="input-group-text" for="validationCustom04">N° Paginas</label>
										    		</div>
													 <input class="form-control" type="text" name="NumeroDePaginas" 
													 value="{{ old('NumeroDePaginas') }}"  required>
													    <div class="valid-feedback">
										  				¡se ve bien!
										  			    </div>
										  		  </div>	    
													 {!!$errors->first('NumeroDePaginas','<span class=error>:message</span>')!!}
										     </div>

										     

											 <div class="col-12">
											  	<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
											  	  	<span class="input-group-text">TipoDeMaterial</span>
										  			<select name="id_tipoDeMaterial" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 155px" required>
														   <option value="" selected>seleccionar</option>	
														   @foreach ($tipoDeMateriall as $tipomate=>$Tipo_de_material)    
														     <option value="{{ $tipomate }}" {{ old('id_tipoDeMaterial') }} >
														      {{$Tipo_de_material}} </option>
														   @endforeach
													</select>
											  	  </div>
											  	  	<div class="valid-feedback">¡se ve bien!</div> 
													{!!$errors->first('id_tipoDeMaterial','<span class=error>:message</span>')!!}
											  	</div>
											 </div>


											 {{-- <div class="col-12">
											  	<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
											  	  	<span class="input-group-text">Baja de libro</span>
										  			<select name="id_baja" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 175px" required>
														   <option value="" selected>seleccionar</option>	
														   @foreach ($bajaa as $baj=>$Baja)    
														     <option value="{{ $baj }}" {{ old('id_baja') }} >
														      {{$Baja}} </option>
														   @endforeach
													</select>
											  	  </div>
											  	  	<div class="valid-feedback">¡se ve bien!</div> 
													{!!$errors->first('id_baja','<span class=error>:message</span>')!!}
											  	</div>
											 </div> --}}



										    
										</div>
									</div>

									<div class="card border-light bg-light">
									     <div class="card-header text-center"><small>Informacion del material</small></div>
									   <div class="card-body">
									   		<div class="col-8">		
												<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
										  			<span class="input-group-text">Edicion</span>
										  			<input class="form-control"  id="validationCustom05" type="text" name="Edicion" value="{{ old('Edicion') }}" style="width: 240px"required>
										  		  </div>	
										  			<div class="valid-feedback">¡se ve bien!</div>
										  			<small id="passwordHelpBlock" class="form-text text-muted">
							                         
													</small>
													{!!$errors->first('Edicion','<span class=error>:message</span>')!!}
										  		</div>
			  	                            </div>

			  	                            <div class="col-12">
											  	<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
											  	  	<span class="input-group-text">Editorial</span>
										  			<select name="id_editorial" class="form-control custom-select mr-sm-2" id="validationCustom06" style="width: 235px" required>
														   <option value="" selected>seleccionar</option>	
														   @foreach ($editoriall as $edito=>$Editorial)    
														     <option value="{{ $edito }}">
														      {{$Editorial}} </option>
														   @endforeach
													</select>
											  	  </div>
											  	  	<div class="valid-feedback">¡se ve bien!</div> 
													{!!$errors->first('id_editorial','<span class=error>:message</span>')!!}
											  	</div>
				 							</div>

				 							<div class="col-10">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
										  			  <span class="input-group-text">Autor</span>
										  			  <select  class="autores form-control custom-select mr-sm-2" id="validationCustom07" name="autores[]" multiple="multiple" style="width: 252px" required>
											  			@foreach ($autoress as $auto => $Nombre)
												  			<option value="{{ $auto }}" >
												  			{{ $Nombre }}</option>
											  			@endforeach
											  		  </select>
											  	  </div>
											  		  <script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.autores').select2();
							    						placeholder: "seleccionar"
							    						tags : true
							    						width: 'resolve'
														});
											  		  </script>
											  	  
											  	   {!!$errors->first('autores','<span class=error>:message</span>')!!}
											  	</div>
				 							</div>

				 							<div class="col-10">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
										  			  <span class="input-group-text">Tema</span>
										  			  <select  class="js-example-basic-multiple form-control custom-select mr-sm-2" id="validationCustom08" name="temaDelmaterial[]" multiple="multiple" style="width: 251px" required>
											  			@foreach ($temaa as $tema => $Area)
												  			<option value="{{ $tema }}">
												  			{{ $Area }}</option>
											  			@endforeach
											  		  </select>
											  	  </div>
											  		  <script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.js-example-basic-multiple').select2();
							    						$(".js-example-basic-multiple").select2({
							  								maximumSelectionLength: 1,
							    						    
														});
							    						
														});
											  		  </script>
											  	  
											  	   {!!$errors->first('temaDelmaterial','<span class=error>:message</span>')!!}
											  	</div>
											</div>

											<div class="col-12">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">	
										  			  <span class="input-group-text">Carrera</span>
										  			  <select  class="carrera form-control custom-select mr-sm-2" id="validationCustom09" name="carreras[]" multiple="multiple" style="width: 240px" required> 
											  			@foreach ($carreraa as $carre => $Carrera)
													  			<option value="{{ $carre }}">
													  			{{ $Carrera }}</option>
											  			@endforeach
											  		   </select>
											  	  </div>
											  			<script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.carrera').select2();
							    						$(".carrera").select2({
							  							maximumSelectionLength: 2,
							  
														});
														});
											  		  </script>
											  	   
											  	   {!!$errors->first('carreras','<span class=error>:message</span>')!!}
											  	</div>
				 							</div>



									   </div>	
									</div>

									<div class="card border-light bg-light">
									  <div class="card-header text-center"><small>Registro y movimientos del material</small></div>
										<div class="card-body"> 
										     <div class="col-10">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
										  			  <span class="input-group-text">Entradas</span>
										  			  <select  class="entrada form-control custom-select mr-sm-2" id="validationCustom03" name="entradas[]" multiple="multiple" style="width: 220px" required>
											  			@foreach ($entradass as $entradas => $Entrada)
												  			<option value="{{ $entradas }}">
												  			{{ $Entrada }}</option>
											  			@endforeach
											  		  </select>
											  	  </div>
											  		  <script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.entrada').select2();
							    						$(".entrada").select2({
														  maximumSelectionLength: 1,
														  
														});
														});
											  		  </script>
											  	  
											  	   {!!$errors->first('entradas','<span class=error>:message</span>')!!}
											  	</div>
											 </div>

										  	 {{-- <div class="col-10">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">
										  			  <span class="input-group-text">Salidas</span>
										  			  <select  class="salida form-control custom-select mr-sm-2" id="validationCustom04" name="salidas[]" multiple="multiple" style="width: 230px" required>
											  			@foreach ($salidass as $salidas => $Salida)
												  			<option value="{{ $salidas }}">
												  			{{ $Salida }}</option>
											  			@endforeach
											  		  </select>
											  	  </div>
											  		  <script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.salida').select2();
							    						$(".salida").select2({
														  maximumSelectionLength: 1,
														  
														});
														});
											  		  </script>
											  	  
											  	   {!!$errors->first('salida','<span class=error>:message</span>')!!}
											  	</div>
											 </div> --}} 


											 <div class="col-12">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">	
										  			  <span class="input-group-text">SedeActual</span>	
										  			  <select  class="sede form-control custom-select mr-sm-2" id="validationCustom05" name="ubicaciones[]" multiple="multiple" style="width: 205px" required> 
											  			@foreach ($ubicacionn  as $ubica => $Sede)
												  			<option value="{{ $ubica }}">
												  			{{ $Sede }}</option>
											  			@endforeach
											  		   </select>	
											  	  </div>
											  	  <script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.sede').select2();
							    						$(".sede").select2({
														  maximumSelectionLength: 1,
														  
														});
														});
											  		  </script>
											  	   {!!$errors->first('ubicaciones','<span class=error>:message</span>')!!}
											    </div>  
											</div>

											{{-- <div class="col-12">
										  		<div class="input-group input-group-sm mb-4"> 
											  	  <div class="input-group-prepend">	
										  			  <span class="input-group-text">Estado</span>	
										  			  <select  class="estado form-control custom-select mr-sm-2" id="validationCustom06" name="estado[]"multiple="multiple" style="width: 230px" required> 
											  			@foreach ($estadoo  as $estado => $Estado)
												  			<option value="{{ $estado }}">
												  			{{ $Estado }}</option>
											  			@endforeach
											  		   </select>	
											  	  </div>
											  	  <script type="text/javascript" >
											  		  	$(document).ready(function() {
							    						$('.estado').select2();
							    						placeholder: "seleccionar"
							    						tags : true
														});
											  		  </script>
											  	   {!!$errors->first('estado','<span class=error>:message</span>')!!}
											    </div>  
											</div> --}}

											<div class="row justify-content-center mt-8 mb-1">
												<div class="col-12">
												 <input class="btn btn-success  btn-sm btn-block" type="submit" value="Guardar" style="width: 290px" >
												</div>
											</div>

										</div>		
									</div>	
								</div>			    



								  



								  
						</form>	  
		            </div>
		        </div>
           </div>



	    </div>
	  </div>
    </div>
</div>


	




@endsection