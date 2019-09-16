
 {!!csrf_field() !!} 

    <div class="card-group">
		<div class="card border-light">
			<div class="card-body justify-content-center">	
			    
			     <div class="col-8">
			  	  <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Codigo_libro</span>
				  		<input class="form-control"  id="validationCustom01" type="text" name="Codigo_libro" value="{{ $materialBibliotecas->Codigo_libro  }}" required>
				  	  </div>	  
				  		<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Codigo_libro','<span class=error>:message</span>')!!} 
				  </div> 
				 </div>
				   

				 <div class="col-8">
				    <div class="input-group input-group-sm mb-4">
				      <div class="input-group-prepend">
						<span class="input-group-text">Codigo_ISBN</span>
						<input class="form-control"  id="validationCustom02" type="text" name="Codigo_ISBN" value="{{ $materialBibliotecas->Codigo_ISBN}}" required >
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
			  			<input class="form-control"  id="validationCustom03" type="text" name="Titulo" value="{{ $materialBibliotecas->Titulo  }}" style="width: 250px" required>
			  		  </div>
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Titulo','<span class=error>:message</span>')!!}
				    </div>
				 </div>


				 <div class="col-8 pt-2">
			  		  <div class="input-group input-group-sm mb-4">	
			  			<div class="input-group-prepend">
			     		<label class="input-group-text" for="validationCustom04">N°Paginas</label>
			    		</div>
						 <input class="form-control" type="text" name="NumeroDePaginas" 
						 value="{{ $materialBibliotecas->NumeroDePaginas }}" required>
						    <div class="valid-feedback">
			  				¡se ve bien!
			  			    </div>
			  		  </div>	    
						 {!!$errors->first('NumeroDePaginas','<span class=error>:message</span>')!!}
				 </div>


				 <div class="col-8">		
					<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
			  			<span class="input-group-text">Edicion</span>
			  			<input class="form-control"  id="validationCustom05" type="text" name="Edicion" value="{{ $materialBibliotecas->Edicion }}" style="width: 240px"required>
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
							     <option value="{{ $edito }}" {{ old('id_editorial',$materialBibliotecas->id_editorial)== $edito ? 'selected':'' }} >
							      {{$Editorial}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_editorial','<span class=error>:message</span>')!!}
				  	</div>
				 </div>
			</div>
		</div>

		<div class="card border-light">
			<div class="card-body"> 
			     <div class="col-10">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
			  			  <span class="input-group-text">Autor</span>
			  			  <select  class="autores form-control custom-select mr-sm-2" id="validationCustom07" name="autores[]" multiple="multiple" style="width: 300px" required>
				  			@foreach ($autoress as $auto => $Nombre)
					  			<option value="{{ $auto }}" {{ $materialBibliotecas->autores->pluck('id_autor')->contains($auto) ? 'selected':'' }}>{{ $Nombre }}</option>
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
			  			  <select  class="js-example-basic-multiple form-control custom-select mr-sm-2" id="validationCustom08" name="temaDelmaterial[]" multiple="multiple" style="width: 300px" required>
				  			@foreach ($temaa as $tema => $Area)
					  			<option value="{{ $tema }}"{{ $materialBibliotecas->temaDelmaterial->pluck('id_temaDelMaterial')->contains($tema) ? 'selected':''  }}>{{ $Area }}</option>
				  			@endforeach
				  		  </select>
				  	  </div>
				  		  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.js-example-basic-multiple').select2();
    						placeholder: "seleccionar"
    						tags : true
    						width: 'resolve'
							});
				  		  </script>
				  	  
				  	   {!!$errors->first('temaDelmaterial','<span class=error>:message</span>')!!}
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
			  			  <span class="input-group-text">Carrera</span>
			  			  <select  class="carrera form-control custom-select mr-sm-2" id="validationCustom09" name="carreras[]" multiple="multiple" style="width: 290px" required> 
				  			@foreach ($carreraa as $carre => $Carrera)
						  			<option value="{{ $carre }}"{{ $materialBibliotecas->carreras->pluck('id_carrera')->contains($carre) ? 'selected' : '' }}>{{ $Carrera }}</option>
				  			@endforeach
				  		   </select>
				  	  </div>
				  			<script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.carrera').select2();
    						placeholder: "seleccionar"
    						tags : true
							});
				  		  </script>
				  	   
				  	   {!!$errors->first('carreras','<span class=error>:message</span>')!!}
				  	</div>
				 </div>


				 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">Sede</span>	
			  			  <select  class="sede form-control custom-select mr-sm-2" id="validationCustom10" name="ubicaciones[]" multiple="multiple" style="width: 305px" required> 
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
			  			  <select  class="estado form-control custom-select mr-sm-2" id="validationCustom11" name="estado[]"multiple="multiple" style="width: 295px" required> 
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
					 <input class="btn btn-success  btn-sm" type="submit" value="Guardar">
					</div>
				</div>

			</div>		
		</div>	
	</div>			    


