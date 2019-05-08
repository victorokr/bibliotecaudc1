			  {!!csrf_field() !!} 
			  <div class="form-group row">
				  	<div class="col-12 col-md-6">
				  		<label for="validationCustom01">Nombres</label>
				  		<input class="form-control" id="validationCustom01" type="text" name="Nombre" value="{{ $listaempleados->Nombre or old('Nombre') }}" required>  <!--or old Nombre se refiere al campo  de la tabla de la BD-->
				  		<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         Sin numeros:Max 21 caracteres
						</small>
						{!!$errors->first('Nombre','<span class=error>:message</span>')!!}
				  	</div>

					<div class="col-12 col-md-6">
						<label for="validationCustom02">Apellidos</label>
						<input class="form-control" id="validationCustom02" type="text" name="Apellidos" value="{{ $listaempleados->Apellidos or old('Apellidos')}}" required >
						<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         Sin numeros:Max 21 caracteres
						</small>
						{!!$errors->first('Apellidos','<span class=error>:message</span>')!!}
					</div>
			  </div>


			  <div class="form-group row">
			  		<div class="col-12 col-md-6 pt-3">
			  			<label for="validationCustom03">Email</label>
			  			<input class="form-control" id="validationCustom03" type="email" name="email" value="{{ $listaempleados->email or old('email') }}" required>
			  			<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Maximo 50 caracteres
						</small>
						{!!$errors->first('email','<span class=error>:message</span>')!!}
			  		</div>


			  		<div class="col-12 col-md-6 pt-3">
			  			<label for="validationCustom04">Telefono</label>
			  			<input class="form-control" id="validationCustom04" type="Telefono" name="Telefono" value="{{ $listaempleados->Telefono or old('Telefono') }}" required>
			  			<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Debe tener 10 digitos
						</small>
						{!!$errors->first('Telefono','<span class=error>:message</span>')!!}
			  		</div>


			  		<div class="col-12 col-md-6 pt-5">
			  			<label for="validationCustom05">Password</label>
			  			<input class="form-control" id="validationCustom05" type="password" name="password" value="{{ $listaempleados->password or old('password') }}" required>
			  			<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Minimo 5 caracteres, una letra Mayuscula,minuscula y un numero
						</small>
						{!!$errors->first('password','<span class=error>:message</span>')!!}
			  		</div>

			  		
			  		
			  		<div class="col-12 col-md-6 pt-5">	
			  			<label for="Password_confirmation">Confirmar Password</label>
			  			<input class="form-control" type="password" name="password_confirmation" value="{{ $listaempleados->password or old('password') }}" required>
			  			<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Debe coincidir la contraseña
						</small>
						{!!$errors->first('password','<span class=error>:message</span>')!!}
					</div>
			  		
			  		
					<div class="container">
			  		 <div class="row justify-content-center">
			  		  <div class="col-12 col-md-6 pt-4">
			  			<label for="validationCustom06">Direccion</label>
			  			<input class="form-control" id="validationCustom06" type="Direccion" name="Direccion" value="{{ $listaempleados->Direccion or old('Direccion')}}" required>
			  			<div class="valid-feedback">
			  				¡se ve bien!
			  			</div>
			  			<small id="passwordHelpBlock" class="form-text text-muted">
                         Max:35 caracteres
						</small>
						{!!$errors->first('Direccion','<span class=error>:message</span>')!!}
			  		  </div>
			  		 </div>
			  		</div>
			  </div>
			  <hr>

			  @if (auth()->user()->hasRoles(['Administrador']))
			  <div class="row justify-content-center">
			  		<div class="col-12 col-md-8 pt-4">
			  			<p class="font-weight-light">Asignar Roles</p>
			  			<div class="form-check btn-group" data-toggle=""> 
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
			  		</div>
			  </div>
			  <hr>
			  @endif
			  