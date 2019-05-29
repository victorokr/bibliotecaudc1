{!!csrf_field() !!} 
<div class="form-group row">
    <div class="col-6 ">
	    <div class="input-group input-group-sm">
	        <div class="input-group-prepend">
			<label class="input-group-text" for="validationCustom01">Jornada</label>
			</div>

			<select name="Jornada" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
			<option value="" >seleccionar</option>

		    <option value="ordinaria" {{ old('Jornada',$listacontratos->Jornada) == 'ordinaria' ? 'selected' : '' }} >ordinaria</option>

		    <option value="semanal" {{ old('Jornada',$listacontratos->Jornada) == 'semanal' ? 'selected' : '' }}  >semanal</option>

		    <option value="diurna" {{ old('Jornada',$listacontratos->Jornada) == 'diurna' ? 'selected' : '' }}  >diurna</option>

		    <option value="nocturno" {{ old('Jornada',$listacontratos->Jornada) == 'nocturno' ? 'selected' : '' }}  >nocturno</option>

		    <option value="turnos" {{ old('Jornada',$listacontratos->Jornada) == 'turnos' ? 'selected' : '' }}  >turnos</option>

		    <option value="medio tiempo" {{ old('Jornada',$listacontratos->Jornada) == 'medio tiempo' ? 'selected' : '' }}  >medio tiempo</option>
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
				<input class="form-control" type="text" name="PeriodoDePrueva"
				value="{{ $listacontratos->PeriodoDePrueba }}" required>
				<div class="valid-feedback">¡se ve bien!</div>
				<small id="passwordHelpBlock" class="form-text text-muted">
	                         
				</small>
				{!!$errors->first('PeriodoDePrueva','<span class=error>:message</span>')!!}
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
							  <option value="{{$idcargo}}" {{ old('id_cargo',$listacontratos->id_cargo)== $idcargo ? 'selected':'' }}> {{$Cargo }} </option>
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
						 <input class="form-control" type="date" name="FechaInicio" value="{{ $listacontratos->FechaInicio }}" required>
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
							      
							     <option value="{{$tipContrato}}" {{ old('id_tipoDeContrato',$listacontratos->id_tipoDeContrato)== $tipContrato ? 'selected':'' }}> {{$Tipo }} </option>
							 
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
			  			<input class="form-control" type="Salario" name="Salario" value="{{ $listacontratos->Salario  }}" required>
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
							    <option value="{{$idempleado}}" {{ old('id_empleado',$listacontratos->id_empleado)== $idempleado ? 'selected':'' }}> {{$Nombre }} </option>
							   @endforeach
							</select>
					  </div>
							<div class="valid-feedback">¡se ve bien!</div> 	 
						    {!!$errors->first('empleado','<span class=error>:message</span>')!!}
			  		</div>






			  		<div class="col-6 pt-5">
			  			<div class="input-group input-group-sm">
				  			<div class="input-group-prepend">
			     		    <label class="input-group-text" for="Empleado">Empresa</label>
			    		    </div>
				  			<input class="form-control"
				  			type="Empresa" 
				  			 
				  			name="Empresa" 
				  			value="{{ $listacontratos->empresa->Empresa  }}" readonly>
				  		</div>
				  			<small id="passwordHelpBlock" class="form-text text-muted">
	                        
							</small>
							{!!$errors->first('password','<span class=error>:message</span>')!!}
						 
			  		</div>
			  		  

			  		
			  		
			  		
			  </div>
			  <hr>

			  