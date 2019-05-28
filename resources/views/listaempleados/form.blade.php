 <div class="col-12">
 {!!csrf_field() !!} 
<div class="card-deck">
   <div class="card border-light">
   	 <div class="card-header"><i class="fas fa-user-tie"></i> {{ __('información personal') }}</div>
   	  <div class="card-body">
		<div class="form-group row">
		   	<div class="input-group input-group-sm mb-4">
		   	   <div class="input-group-prepend">
				 <span class="input-group-text">Nombres</span>
				 <input class="form-control" id="validationCustom01" type="text" name="Nombre" value="{{  $listaempleados->Nombre  }}" required>  
			   </div>
			     <div class="valid-feedback">¡se ve bien!</div>
				 <small id="passwordHelpBlock" class="form-text text-muted">
			     Sin numeros:Max 21 caracteres
				 </small>
				 {!!$errors->first('Nombre','<span class=error>:message</span>')!!}
			</div>
			 
					  	

						
		     <div class="input-group input-group-sm mb-3">
		   	   <div class="input-group-prepend">
		   	 	 <span class="input-group-text">Apellidos</span>
			     <input class="form-control" id="validationCustom02" type="text" name="Apellidos" value="{{ $listaempleados->Apellidos }}" required >
			   </div>
			     <div class="valid-feedback">¡se ve bien!</div>
			     <small id="passwordHelpBlock" class="form-text text-muted">
	             Sin numeros:Max 21 caracteres
			     </small>
		         {!!$errors->first('Apellidos','<span class=error>:message</span>')!!}
		     </div>				
		</div>
	  </div>
   </div>


   <div class="card border-light">
   	<div class="card-header"><i class="fas fa-user-tie"></i> {{ __('información de contacto') }}</div>
   	  <div class="card-body">
		<div class="form-group row">		  		
		  <div class="input-group input-group-sm mb-4">
		   	<div class="input-group-prepend">
			  <span class="input-group-text">Correo.....</span>
			  <input class="form-control" id="validationCustom03" type="email" name="email" 
			  value="{{ $listaempleados->email  }}" required>
			</div>
				<div class="valid-feedback">¡se ve bien!</div>
				<small id="passwordHelpBlock" class="form-text text-muted">
		        Maximo 50 caracteres
				</small>
				{!!$errors->first('email','<span class=error>:message</span>')!!}
		  </div>	  		

				  		
		  <div class="input-group input-group-sm mb-4">
		    <div class="input-group-prepend">
			  <span class="input-group-text">Telefono..</span>
			  <input class="form-control" id="validationCustom04" type="Telefono" name="Telefono"
			  value="{{ $listaempleados->Telefono }}" required>
			</div>
			  <div class="valid-feedback">¡se ve bien!</div>
				<small id="passwordHelpBlock" class="form-text text-muted">
		        Debe tener 10 digitos
				</small>
				{!!$errors->first('Telefono','<span class=error>:message</span>')!!}
		  </div>	  		


		  <div class="input-group input-group-sm mb-4">
		    <div class="input-group-prepend">
			  <span class="input-group-text">Direccion.</span>
			  <input class="form-control" id="validationCustom06" type="Direccion" name="Direccion" value="{{ $listaempleados->Direccion }}" required>
			</div>
				<div class="valid-feedback">¡se ve bien!</div>
				<small id="passwordHelpBlock" class="form-text text-muted">
		        Max:35 caracteres
				</small>
				{!!$errors->first('Direccion','<span class=error>:message</span>')!!}
		  </div>
		  <hr>
		
		  <label for="validationCustom05 text-center">Cuenta</label>
		  <div class="input-group input-group-sm mb-4">
		    <div class="input-group-prepend">
			  <span class="input-group-text">contraseña</span>	  		
			  <input class="form-control" id="validationCustom05" type="password" name="password" value="{{ $listaempleados->password  }}" required>
			</div>
			<div class="valid-feedback">¡se ve bien!</div>
		    <small id="passwordHelpBlock" class="form-text text-muted">
	        Min 5 caracteres,1 Mayuscula,minuscula, un numero
			</small>
			{!!$errors->first('password','<span class=error>:message</span>')!!}
		  </div>	  		

				  				  				  			
		  <div class="input-group input-group-sm mb-4">
		    <div class="input-group-prepend">
			  <span class="input-group-text">confirmar...</span>
			  <input class="form-control" type="password" name="password_confirmation" 
			  value="{{ $listaempleados->password  }}" required>
			</div>
				<div class="valid-feedback">¡se ve bien!</div>
				<small id="passwordHelpBlock" class="form-text text-muted">
		        Debe coincidir la contraseña
			    </small>
			    {!!$errors->first('password','<span class=error>:message</span>')!!}
		  </div>			
				  		
				  			
			
				  		  
		</div>
	  </div>
   </div>


	{{-- @if (auth()->user()->hasRoles(['Administrador'])) --}}
	<div class="card border-light">
	 <div class="card-header"><i class="fas fa-user-tie"></i> {{ __('Roles') }}</div>
	   <div class="card-body">
		<div class="row justify-contend-star">
			@foreach ($roles as $id_role => $Nombre)
			<label class="form-check-label btn btn-light">
			<input
			type="checkbox" 
			value="{{ $id_role }}"
			{{ $listaempleados->roles->pluck('id_role')->contains($id_role) ? 'checked' : ''}} 
			name="roles[]">
			{{ $Nombre }}
			</label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->
			@endforeach	  			
			{!!$errors->first('roles','<span class=error>:message</span>')!!}
		</div>

			<div class="row justify-content-center">
					<div class="col-12 col-md-6">
					 <input class="btn btn-success btn-sm btn-block" type="submit" value="Guardar">
					</div>
				</div>		 
	   </div>
    </div>
</div>
</div>
{{-- @endif --}}
			  