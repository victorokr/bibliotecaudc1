@extends('layouts.app')
@section('content')


<div class="contenedorEditEmpleados">
	<div class="container">
		<div class="row">
			<div class="col-12">
			   <div class="card">
			   	 <div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Crear Contrato') }}</small></div>
					<div class="card-body">
						<div class="card bg-light mb-3 text-center">
						    <form class="needs-validation" novalidate method="POST" action="{{ route('contratos.store') }}"><!--empleados.store esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
							
							
						    {!!csrf_field() !!} 
							<div class="form-group row">
							    <div class="col-6 ">
								    <div class="input-group input-group-sm">
								        <div class="input-group-prepend">
										<label class="input-group-text" for="validationCustom01">Jornada</label>
										</div>

										<select name="Jornada" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
										   <option value="" >seleccionar</option>	        
						                   <option value="ordinaria" >ordinaria</option>
						                   <option value="semanal" >semanal</option>
						                   <option value="diurna" >diurna</option>
						                   <option value="nocturno" >nocturno</option>
						                   <option value="turnos" >turnos</option>
						                   <option value="medio tiempo" >medio tiempo</option>
		                				</select>
									

										<div class="valid-feedback">¡se ve bien!</div>
										<small id="passwordHelpBlock" class="form-text text-muted">
							                         
										</small>
									</div>	
										{!!$errors->first('Jornada','<span class=error>:message</span>')!!}
										
							    </div>

									    <div class="col-6">
									      <div class="input-group input-group-sm">
									      	<div class="input-group-prepend">
										     <label class="input-group-text" for="validationCustom02">PeriodoDePrueba</label>
										    </div>
											<input class="form-control" type="text" name="PeriodoDePrueba"
											value="{{ old('PeriodoDePrueba') }}" required>
											<div class="valid-feedback">¡se ve bien!</div>
											<small id="passwordHelpBlock" class="form-text text-muted">
								                         
											</small>
											{!!$errors->first('PeriodoDePrueba','<span class=error>:message</span>')!!}
										  </div>
										</div>  
							</div>


							<div class="form-group row">
							  		<div class="col-6 pt-2">
							  			<div class="input-group input-group-sm">
							  			  <div class="input-group-prepend">
							     		    <label class="input-group-text" for="validationCustom03">Cargo
							     		    </label>
							    		  </div>
							  			
											<select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" type="input" name="id_cargo" required>
											   <option value=""  selected>seleccionar</option>	
											   @foreach ($cargo as $idcargo =>$Cargo)    
											  <option value="{{$idcargo}}" {{ old('id_cargo')== $idcargo ? 'selected':'' }}> {{$Cargo }} </option>
											  @endforeach
											</select>
										</div>
											<div class="valid-feedback">¡se ve bien!</div>	 
										
										    {!!$errors->first('tipoDeCargo','<span class=error>:message</span>')!!}
							  		</div>


							  		<div class="col-6 pt-2">
							  		  <div class="input-group input-group-sm">	
							  			<div class="input-group-prepend">
							     		<label class="input-group-text" for="validationCustom04">FechaInicio</label>
							    		</div>
										 <input class="form-control" type="date" name="FechaInicio" value="{{ old('FechaInicio') }}" required>
										    <div class="valid-feedback">
							  				¡se ve bien!
							  			    </div>
							  		  </div>	    
										 {!!$errors->first('fechacontrato','<span class=error>:message</span>')!!}
									</div>


							  		<div class="col-6 pt-4">
							  			<div class="input-group input-group-sm">
							  			  <div class="input-group-prepend">
							     		    <label class="input-group-text" for="validationCustom05">TipoDeContrato
							     		    </label>
							    		  </div>
							  			
											<select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect"        type="input" name="id_tipoDeContrato" required>
											   <option value="" selected>seleccionar</option>	
											   @foreach ($tipoDeContrato as $tipContrato =>$Tipo) 
											      
											     <option value="{{$tipContrato}}" {{ old('id_tipoDeContrato')== $tipContrato ? 'selected':'' }}> {{$Tipo }} </option>
											 
											   @endforeach
											</select>
										</div>	
											<div class="valid-feedback">¡se ve bien!</div>	 
										
										    {!!$errors->first('tipoDeContrato','<span class=error>:message</span>')!!}
							  		</div>




							  		<div class="col-6 pt-4">
							  		  <div class="input-group input-group-sm">
							  			<div class="input-group-prepend">
							     		<label class="input-group-text" for="validationCustom06">Salario</label>
							    		</div>
							  			<input class="form-control" type="Salario" name="Salario" value="{{ old('Salario')  }}" required>
							  		  </div>
							  			    <div class="valid-feedback">¡se ve bien!</div>
							  			<small id="passwordHelpBlock" class="form-text text-muted">
				                         debe contener los puntos de mil, ej: 828.117 | 1.200.000
										</small>
										{!!$errors->first('Salario','<span class=error>:message</span>')!!}
									  
							  		</div>
							  		



							  		
							  		<div class="col-6 pt-5">
							  		  <div class="input-group input-group-sm">
							  			<div class="input-group-prepend">
							     		<label class="input-group-text" for="validationCustom07">Empleado</label>
							    		</div>
							  			
											<select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" type="input" name="id_empleado" required>
											   <option value=""  selected>seleccionar</option>	
											   @foreach ($empleado as $idempleado =>$Nombre)    
											    <option value="{{$idempleado}}" {{ old('id_empleado')== $idempleado ? 'selected':'' }}> {{$Nombre }} </option>
											   @endforeach
											</select>
									  </div>
											<div class="valid-feedback">¡se ve bien!</div> 	 
										    {!!$errors->first('empleado','<span class=error>:message</span>')!!}
							  		</div>






							  		<div class="col-6 pt-5">
							  			<div class="input-group input-group-sm">
								  			<div class="input-group-prepend">
							     		    <label class="input-group-text" for="validationCustom08">Empresa</label>
							    		    </div>
								  			<select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" type="input" name="id_empresa" required>
											<option value=""  selected>seleccionar</option>	
											@foreach ($empresa as $id_empresa =>$Empresa)    
											<option value="{{$id_empresa}}"> {{$Empresa }} </option>
											@endforeach
							                </select>
								  		</div>
								  			<small id="passwordHelpBlock" class="form-text text-muted">
					                        
											</small>
											{!!$errors->first('password','<span class=error>:message</span>')!!}
										 
							  		</div>	
							</div>
							<hr>

							<div class="row justify-content-center">
								<div class="col-12 col-md-6">
									<input class="btn btn-success btn-block btn-sm" type="submit" value="Guardar">
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

				<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function() {
				  'use strict';
				  window.addEventListener('load', function() {
				    // Fetch all the forms we want to apply custom Bootstrap validation styles to
				    var forms = document.getElementsByClassName('needs-validation');
				    // Loop over them and prevent submission
				    var validation = Array.prototype.filter.call(forms, function(form) {
				      form.addEventListener('submit', function(event) {
				        if (form.checkValidity() === false) {
				          event.preventDefault();
				          event.stopPropagation();
				        }
				        form.classList.add('was-validated');
				      }, false);
				    });
				  }, false);
				})();
				</script>




@endsection