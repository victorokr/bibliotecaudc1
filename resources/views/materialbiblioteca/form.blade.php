<div class="col-12">
 {!!csrf_field() !!} 

    <div class="card-deck">
		<div class="card border-light">
			<div class="card-body">	
			    
			     <div class="col-12">
			  	  <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Codigo_libro</span>
				  		<input class="form-control"  id="validationCustom01" type="text" name="Codigo_libro" value="{{ $materialBibliotecas->Codigo_libro  }}" required>
				  	  </div>	  
				  		<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         Max 21 caracteres
						</small>
						{!!$errors->first('Codigo_libro','<span class=error>:message</span>')!!} 
				  </div> 
				 </div> 
				   

				 <div class="col-12">
				    <div class="input-group input-group-sm mb-4">
				      <div class="input-group-prepend">
						<span class="input-group-text">Codigo_ISBN</span>
						<input class="form-control"  id="validationCustom02" type="text" name="Codigo_ISBN" value="{{ $materialBibliotecas->Codigo_ISBN}}" required >
					  </div>	
						<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         Max 21 caracteres
						</small>
						{!!$errors->first('Codigo_ISBN','<span class=error>:message</span>')!!}
					</div>
				 </div>	

				 <div class="col-12">
					<div class="input-group input-group-sm mb-4">
				      <div class="input-group-prepend">
					    <span class="input-group-text">Titulo</span>
			  			<input class="form-control"  id="validationCustom03" type="text" name="Titulo" value="{{ $materialBibliotecas->Titulo  }}" required>
			  		  </div>
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Max 30 caracteres
						</small>
						{!!$errors->first('Titulo','<span class=error>:message</span>')!!}
				    </div>
				 </div>


				 <div class="col-12 pt-2">
			  		  <div class="input-group input-group-sm">	
			  			<div class="input-group-prepend">
			     		<label class="input-group-text" for="validationCustom04">Fecha</label>
			    		</div>
						 <input class="form-control" type="date" name="Fecha" 
						 value="{{ $materialBibliotecas->Fecha }}" required>
						    <div class="valid-feedback">
			  				¡se ve bien!
			  			    </div>
			  		  </div>	    
						 {!!$errors->first('Fecha','<span class=error>:message</span>')!!}
				 </div>


				 <div class="col-12">		
					<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
			  			<span class="input-group-text">Edicion</span>
			  			<input class="form-control"  id="validationCustom05" type="text" name="Edicion" value="{{ $materialBibliotecas->Edicion }}" required>
			  		  </div>	
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Max:35 caracteres
						</small>
						{!!$errors->first('Edicion','<span class=error>:message</span>')!!}
			  		</div>
			  	 </div>
			    
			</div>
		</div>

		<div class="card border-light">
			<div class="card-body">    
			  	 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Editorial</span>
			  			<select name="id_editorial" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($editoriall as $edito=>$Editorial)    
							     <option value="{{ $edito }}" {{ old('id_editorial',$materialBibliotecas->id_editorial)== $edito ? 'selected':'' }} >
							      {{$Editorial}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_editorial','<span class=error>:message</span>')!!}
				  	</div>
				 </div>


			  	 <div class="col-12">
			  		
			  			  {{-- <span class="input-group-text">AsignarTema</span> --}}
			  			  <select name="id_temaDelMaterial" class="form-control custom-select mr-sm-2" id="name" multiple="multiple" required>
			  			   
			  			   <option value="cheese">queso</option>
			  			   <option value="tomatoes">tomatoes</option>
			  			   <option value="mosarela">mosarela</option>
			  			   <option value="onions">onions</option>
				  			{{-- @foreach ($temaa as $tema => $Area)
					  			
						  			<input
						  			   
						  			  value="{{ $tema }}"
						  			  {{ $materialBibliotecas->temaDelmaterial->pluck('id_temaDelMaterial')}} 
						  			  name="temaa[]">
						  			{{ $Area }}
					  			
				  			@endforeach --}}
				  		  </select>
				  		  <script type="text/javascript">
				  		  	$("#name").select2({
				  		  		placeholder:'seleccionar',
				  		  		allowClear: true
				  		  	});
				  		  </script>
				  	  
				  	   {!!$errors->first('temaa','<span class=error>:message</span>')!!}
				  	
				 </div> 



			  	 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Baja de libro</span>
			  			<select name="id_baja" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($bajaa as $baj=>$Baja)    
							     <option value="{{ $baj }}" {{ old('id_baja',$materialBibliotecas->id_baja)== $baj ? 'selected':'' }} >
							      {{$Baja}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_baja','<span class=error>:message</span>')!!}
				  	</div>
				 </div>


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">TipoDeMaterial</span>
			  			<select name="id_tipoDeMaterial" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($tipoDeMateriall as $tipomate=>$Tipo_de_material)    
							     <option value="{{ $tipomate }}" {{ old('id_tipoDeMaterial',$materialBibliotecas->id_tipoDeMaterial)== $tipomate ? 'selected':'' }} >
							      {{$Tipo_de_material}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_tipoDeMaterial','<span class=error>:message</span>')!!}
				  	</div>
				 </div>	  	

			</div>		
		</div>


		<div class="card border-light">
			<div class="card-body">
				 <div class="col-6">
			  			<div class="form-check btn-group-vertical" data-toggle="">
			  			  <p class="font-weight-light">Carrera</p> 
				  			@foreach ($carreraa as $carre => $Carrera)
					  			<label class="form-check-label btn btn-info btn-sm">
						  			<input
						  			  type="checkbox" 
						  			  value="{{ $carre }}"
						  			  {{ $materialBibliotecas->carreras->pluck('id_carrera')->contains($carre) ? 'checked' : ''}} 
						  			  name="carreras[]">
						  			{{ $Carrera }}
					  			</label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->
				  			@endforeach
				  	    </div>
				  	   {!!$errors->first('carreras','<span class=error>:message</span>')!!}
				 </div>

				 

				 

				 
				<div class="row justify-content-star "> 
				 <div class="col-6">
			  			<div class="form-check btn-group-vertical" data-toggle="">
			  			  <p class="font-weight-light">Sede</p> 
				  			@foreach ($ubicacionn  as $ubica => $Sede)
					  			<label class="form-check-label btn btn-info btn-sm">
						  			<input
						  			  type="checkbox" 
						  			  value="{{ $ubica }}"
						  			  {{ $materialBibliotecas->ubicaciones->pluck('id_ubicacion')->contains($ubica) ? 'checked' : ''}} 
						  			  name="ubicaciones[]">
						  			{{ $Sede }}
					  			</label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->
				  			@endforeach
				  	    </div>
				  	   {!!$errors->first('ubicaciones','<span class=error>:message</span>')!!}
				 </div>  
				</div>
				<div class="row justify-content-center">
					<div class="col-6">
					 <input class="btn btn-success btn-block btn-sm" type="submit" value="Guardar">
					</div>
				</div>  
			</div>	
		</div>
	</div>			    
</div>

