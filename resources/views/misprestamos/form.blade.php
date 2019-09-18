
 {!!csrf_field() !!} 

    <div class="card-group">
		<div class="card border-light">
			<div class="card-body justify-content-center">	
			    
			     <div class="col-12 ">
			  	  <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Autor</span>
				  		<input class="form-control"  id="validationCustom01" type="text" name="Nombre" value="{{ $listaAutores->Nombre  }}" style="width: 250px" required>
				  	  </div>	  
				  		<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Nombre','<span class=error>:message</span>')!!} 
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


