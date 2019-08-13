
 {!!csrf_field() !!} 

    <div class="card-deck">
		<div class="card border-light text-center bg-light">
          <div class="card-header"><small>Informacion basica del Material</small></div>
			<div class="card-body justify-content-center">	
			    
			     <div class="col-8">
			  	  <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Codigo_libro</span>
				  		<input class="form-control"  id="validationCustom01" type="text" name="Codigo_libro" value="{{ $materialBibliotecas->Codigo_libro  }} " style="width: 255px"  required>
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
					    <span class="input-group-text">Titulo</span>
			  			<input class="form-control"  id="validationCustom02" type="text" name="Titulo" value="{{ $materialBibliotecas->Titulo  }}" style="width: 300px" required>
			  		  </div>
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Titulo','<span class=error>:message</span>')!!}
				    </div>
				 </div>

				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">TipoDeMaterial</span>
			  			<select name="id_tipoDeMaterial" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 240px" required>
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


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Baja de libro</span>
			  			<select name="id_baja" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 260px" required>
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



			    
			</div>
		</div>

		<div class="card border-light text-center bg-light">
		  <div class="card-header"><small>Registro y movimientos del material</small></div>
			<div class="card-body"> 
			     <div class="col-10">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
			  			  <span class="input-group-text">Entradas</span>
			  			  <select  class="entrada form-control custom-select mr-sm-2" id="validationCustom03" name="entradas[]" multiple="multiple" style="width: 280px" required>
				  			@foreach ($entradass as $entradas => $Entrada)
					  			<option value="{{ $entradas }}" {{ $materialBibliotecas->entradas->pluck('id_entrada')->contains($entradas) ? 'selected':'' }}>{{ $Entrada }}</option>
				  			@endforeach
				  		  </select>
				  	  </div>
				  		  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.entrada').select2();
    						placeholder: "seleccionar"
    						tags : true
    						width: 'resolve'
							});
				  		  </script>
				  	  
				  	   {!!$errors->first('entradas','<span class=error>:message</span>')!!}
				  	</div>
				 </div>

			  	 <div class="col-10">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
			  			  <span class="input-group-text">Salidas</span>
			  			  <select  class="salida form-control custom-select mr-sm-2" id="validationCustom04" name="salidas[]" multiple="multiple" style="width: 290px" required>
				  			@foreach ($salidass as $salidas => $Salida)
					  			<option value="{{ $salidas }}"{{ $materialBibliotecas->salidas->pluck('id_salida')->contains($salidas) ? 
					  			'selected':''  }}>{{ $Salida }}</option>
				  			@endforeach
				  		  </select>
				  	  </div>
				  		  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.salida').select2();
    						placeholder: "seleccionar"
    						tags : true
    						width: 'resolve'
							});
				  		  </script>
				  	  
				  	   {!!$errors->first('salida','<span class=error>:message</span>')!!}
				  	</div>
				 </div> 


				 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">SedeActual</span>	
			  			  <select  class="sede form-control custom-select mr-sm-2" id="validationCustom05" name="ubicaciones[]" multiple="multiple" style="width: 265px" required> 
				  			@foreach ($ubicacionn  as $ubica => $Sede)
					  			<option value="{{ $ubica }}"{{ $materialBibliotecas->ubicaciones->pluck('id_ubicacion')->contains($ubica) ? 'selected' : '' }}>{{ $Sede }}</option>
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
				  	   {!!$errors->first('ubicaciones','<span class=error>:message</span>')!!}
				    </div>  
				</div>

				<div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">Estado</span>	
			  			  <select  class="estado form-control custom-select mr-sm-2" id="validationCustom06" name="estado[]"multiple="multiple" style="width: 295px" required> 
				  			@foreach ($estadoo  as $estado => $Estado)
					  			<option value="{{ $estado }}"{{ $materialBibliotecas->estado
					  				->pluck('id_estado')->contains($estado) ? 'selected' : '' }}>
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
				</div>

				<div class="row justify-content-center">
					<div class="col-12">
					 <input class="btn btn-success btn-block btn-sm" type="submit" value="Guardar">
					</div>
				</div>

			</div>		
		</div>	
	</div>			    


