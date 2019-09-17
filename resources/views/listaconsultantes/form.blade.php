<div class="col-12">
 {!!csrf_field() !!} 

    <div class="card-deck">
		<div class="card border-light">
		   <div class="card-header"><small>Informacion personal</small></div>
			<div class="card-body">	
			    
			     <div class="col-12">
			  	  <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Nombres</span>
				  		<input class="form-control"  id="validationCustom01" type="text" name="Nombre" value="{{ $listaconsultantes->Nombre  }}" required>
				  	  </div>	  
				  		<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         ingresa solo alfabeto:Max 21 caracteres
						</small>
						{!!$errors->first('Nombre','<span class=error>:message</span>')!!} 
				  </div> 
				 </div> 
				   

				 <div class="col-12">
				    <div class="input-group input-group-sm mb-4">
				      <div class="input-group-prepend">
						<span class="input-group-text">Apellidos</span>
						<input class="form-control"  id="validationCustom02" type="text" name="Apellidos" value="{{ $listaconsultantes->Apellidos}}" required >
					  </div>	
						<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         ingresa solo alfabeto:Max 21 caracteres
						</small>
						{!!$errors->first('Apellidos','<span class=error>:message</span>')!!}
					</div>
				 </div>	

				 <div class="col-12">
					<div class="input-group input-group-sm mb-4">
				      <div class="input-group-prepend">
					    <span class="input-group-text">Documento</span>
			  			<input class="form-control"  id="validationCustom03" type="text" name="Documento" value="{{ $listaconsultantes->Documento  }}" required>
			  		  </div>
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         ingresa solo digitos
						</small>
						{!!$errors->first('Documento','<span class=error>:message</span>')!!}
				    </div>
				 </div>


				 <div class="col-12">
				 	<div class="input-group input-group-sm mb-4">
				 	  <div class="input-group-prepend">
			  			<span class="input-group-text">Telefono</span>
			  			<input class="form-control"  id="validationCustom04" type="Telefono" name="Telefono" value="{{ $listaconsultantes->Telefono  }}" required>
			  		  </div>
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">Debe tener 10 digitos
						</small>
						{!!$errors->first('Telefono','<span class=error>:message</span>')!!}
			  		</div>
				 </div>


				 <div class="col-12">		
					<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
			  			<span class="input-group-text">Direccion</span>
			  			<input class="form-control"  id="validationCustom05" type="Direccion" name="Direccion" value="{{ $listaconsultantes->Direccion }}" required>
			  		  </div>	
			  			<div class="valid-feedback">¡se ve bien!</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Max:35 caracteres
						</small>
						{!!$errors->first('Direccion','<span class=error>:message</span>')!!}
			  		</div>
			  	 </div>
			    
			</div>
		</div>

		<div class="card border-light">
		  <div class="card-header"><small>Informacion de contacto</small></div>	
			<div class="card-body">    
			  	 <div class="col-12">
			  	 	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Residencia</span>
			  		    <input class="form-control" id="validationCustom08" type="text" name="lugarDeResidencia" value="{{ $listaconsultantes->lugarDeResidencia  }}" required>
				  	  </div>
				  	    <div class="valid-feedback">¡se ve bien!</div>
			  		     <small id="passwordHelpBlock" class="form-text text-muted">
                         Maximo 50 caracteres
					     </small>
					    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
				  	</div>  	
				 </div>


			  	 <div class="col-12">
			  	 	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">email</span>
			  		    <input class="form-control"  id="validationCustom06" type="email" name="email" value="{{ $listaconsultantes->email  }}" required>
				  	  </div>
				  	     <div class="valid-feedback">¡se ve bien!</div>
			  		     <small id="passwordHelpBlock" class="form-text text-muted">
                         Maximo 50 caracteres
					     </small>
					    {!!$errors->first('email','<span class=error>:message</span>')!!}	
				  	</div>  	
			  	 </div>



			  	 <div class="col-12">
			  	 	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">password</span>
			  		    <input class="form-control" id="validationCustom07" type="password" name="password" value="{{  old('password') }}" required>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div>
			  		     <small id="passwordHelpBlock" class="form-text text-muted">
                          Min 5 caracteres,1 Mayuscula,minuscula, un numero
					     </small>
					    {!!$errors->first('password','<span class=error>:message</span>')!!}	
				  	</div>  	
				 </div>


				 <div class="col-12">
			  	 	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Confirmar</span>
			  		    <input class="form-control"  type="password" name="password_confirmation" value="{{  old('password') }}" required>
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


		<div class="card border-light">
		  <div class="card-header"><small>Informacion universidad</small></div>
			<div class="card-body">
				 <div class="col-12">
				    <div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Institucion</span>
			  			<select name="id_institucionUniversidad" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($institucionUniversidadd as $instUniversidad=>$institucion_Universidad)    
							     <option value="{{ $instUniversidad }}" {{ old('id_institucionUniversidad',$listaconsultantes->id_institucionUniversidad)== $instUniversidad ? 'selected':'' }} > {{$institucion_Universidad }} </option>
							   @endforeach
						</select>
				  	  </div>
				  	    <div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_institucionUniversidad','<span class=error>:message</span>')!!}	
				  	</div>
				 </div>

				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Facultad</span>
			  			<select name="id_facultad" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($facultadd as $facul=>$facultad)    
							     <option value="{{ $facul }}" {{ old('id_facultad',$listaconsultantes->id_facultad)== $facul ? 'selected':'' }} > {{$facultad}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_facultad','<span class=error>:message</span>')!!}
				  	</div>
				 </div>

				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">TipoDeConsultante</span>
			  			<select name="id_tipoDeConsultante" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($tipoDeConsultante as $tipConsultante=>$tipoDeConsultante)    
							     <option value="{{ $tipConsultante }}" {{ old('id_tipoDeConsultante',$listaconsultantes->id_tipoDeConsultante)== $tipConsultante ? 'selected':'' }} > {{$tipoDeConsultante}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	    <div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_tipoDeConsultante','<span class=error>:message</span>')!!}
				  	</div>
				 </div>

				 @if (auth()->user()->hasRoles(['Empleado']))
				<div class="row justify-content-star "> 
				 <div class="col-6">
			  			<div class="form-check btn-group-vertical" data-toggle="">
			  			  <p class="font-weight-light">Asignar Perfil</p> 
				  			@foreach ($perfiles as $perfil => $Nombre_perfil)
					  			<label class="form-check-label btn btn-info btn-sm">
						  			<input
						  			  type="checkbox" 
						  			  value="{{ $perfil }}"
						  			  {{ $listaconsultantes->perfiles->pluck('id_perfil')->contains($perfil) ? 'checked' : ''}} 
						  			  name="perfiles[]">
						  			{{ $Nombre_perfil }}
					  			</label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->
				  			@endforeach
				  	    </div>
				  	   {!!$errors->first('perfiles','<span class=error>:message</span>')!!}
				 </div>  
				</div>
				<div class="row justify-content-center">
					<div class="col-6">
					 <input class="btn btn-success btn-block btn-sm" type="submit" value="Guardar">
					</div>
				</div>
				@endif  
			</div>	
		</div>
	</div>			    
</div>	  
 