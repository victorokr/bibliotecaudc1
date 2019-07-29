
 {!!csrf_field() !!} 

    <div class="card-group">
		<div class="card border-light">
			<div class="card-body justify-content-center">	
			    
			     <div class="col-12 ">
			  	  <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Codigo</span>
				  		<input class="form-control"  id="validationCustom01" type="text" name="codigo" value="{{ $ejemplaress->codigo  }}" style="width: 250px" required>
				  	  </div>	  
				  		<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Nombre','<span class=error>:message</span>')!!} 
				  </div> 
				 </div>


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Estado</span>
			  			<select name="id_estado" class="form-control custom-select mr-sm-2" id="validationCustom02" style="width: 235px" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($estadoo as $estado=>$idEstado)    
							     <option value="{{ $estado }}" {{ old('id_estadoMaterialBiblioteca',
							     $ejemplaress->id_estadoMaterialBiblioteca)== $estado ? 'selected':'' }} >
							      {{$idEstado}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_estado','<span class=error>:message</span>')!!}
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


