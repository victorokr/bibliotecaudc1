
 {!!csrf_field() !!} 

    <div class="card-group">
		<div class="card border-light">
			<div class="card-body justify-content-center">	
			  <div class="form-row align-items-center">   
			     <div class="col-8">
			  	  <div class="input-group input-group-sm mb-3"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Fecha de Inicio</span>
				  		<input class="form-control"  id="validationCustom01" style="width: 215px" type="date" name="Fecha_prestamo" value="{{ $prestamos->Fecha_prestamo  }}">
				  	  </div>	  
				  		<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Fecha_prestamo','<span class=error>:message</span>')!!} 
				  </div> 
				 </div>
				   

				 <div class="col-8">
				    <div class="input-group input-group-sm mb-3">
				      <div class="input-group-prepend">
						<span class="input-group-text">Fecha Devolucion</span>
						<input class="form-control"  id="validationCustom02" type="date" name="Fecha_devolucion" value="{{ $prestamos->Fecha_devolucion}}">
					  </div>	
						<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Fecha_devolucion','<span class=error>:message</span>')!!}
					</div>
				 </div>	


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Recibe</span>
			  			<select name="id_empleado" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 265px">
							   <option value="" selected>seleccionar</option>	
							   @foreach ($recibee as $recibe=>$Nombre)    
							     <option value="{{ $recibe }}" {{ old('id_empleado',$prestamos->id_empleado)== $recibe ? 'selected':'' }} >
							      {{$Nombre}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_empleado','<span class=error>:message</span>')!!}
				  	</div>
				 </div>

			  </div>    
			</div>
		</div>






		<div class="card border-light">
			<div class="card-body"> 
			    <div class="form-row align-items-center"> 
				 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">Libros</span>	
			  			  <select name="materialBibliotecas[]" class="libros form-control custom-select mr-sm-2" id="validationCustom3"  multiple="multiple" style="width: 285px" title="Ingresa el libro de la busqueda" required> 
				  			@foreach ($listaMateriall  as $listaMaterial => $Titulo)
					  			<option value="{{ $listaMaterial }}"{{ $prestamos->materialBibliotecas->pluck('id_materialBiblioteca')->contains($listaMaterial) ? 'selected' : '' }}>{{ $Titulo }}</option>
				  			@endforeach
				  		   </select>	
				  	  </div>
				  	      <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.libros').select2();
    						placeholder: "seleccionar"
    						tags : true
							});
				  		  </script>
				  	   {!!$errors->first('libros','<span class=error>:message</span>')!!}
				    </div>  
				</div>


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Solicitante</span>
			  			<select name="id_consultanteBiblioteca" class="solicitante form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 260px" title="Selecciona tu Nombre" required>
							   <option value="" selected>seleccionar</option>	
							   @foreach ($solicitantee as $solicitante=>$Nombre)    
							     <option value="{{ $solicitante }}" {{ old('id_consultanteBiblioteca',$prestamos->id_consultanteBiblioteca)== $solicitante ? 'selected':'' }} >
							      {{$Nombre}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.solicitante').select2();
    						placeholder: "seleccionar"
    						tags : true
							});
				  	  </script>	 
					  {!!$errors->first('solicitante','<span class=error>:message</span>')!!}
				  	</div>
				 </div>


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">TipoDePrestamo</span>
			  			<select name="id_tipoDePrestamo" class="form-control custom-select  mr-sm-2" id="validationCustom04" style="width: 222px" >
							   <option value="" selected>seleccionar</option>	
							   @foreach ($tipoDePrestamoo as $tipo=>$tipoDePrestamo)    
							     <option value="{{ $tipo }}" {{ old('id_tipoDePrestamo',
							     $prestamos->id_tipoDePrestamo)== $tipo ? 'selected':'' }} >
							      {{$tipoDePrestamo}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('tipoDePrestamo','<span class=error>:message</span>')!!}
				  	</div>
				 </div>
				</div> 
			</div>	 
		</div>

		<div class="card border-light">
			<div class="card-body">
			  <div class="form-row align-items-center">
				 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">Novedades</span>	
			  			  <select  class="novedades form-control custom-select mr-sm-2" id="validationCustom5" name="novedades[]" multiple="multiple" style="width: 245px"> 
				  			@foreach ($novedadess  as $novedades => $novedad)
					  			<option value="{{ $novedades }}"{{ $prestamos->novedades->pluck('id_novedad')->contains($novedades) ? 'selected' : '' }}>
					  			{{ $novedad }}</option>
				  			@endforeach
				  		   </select>	
				  	  </div>
				  	  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.novedades').select2();
    						placeholder: "seleccionar"
    						tags : true
							});
				  	  </script>
				  	   {!!$errors->first('novedades','<span class=error>:message</span>')!!}
				    </div>  
				</div>


				<div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">diasRetrasados</span>	
			  			  <select  class="sancion form-control custom-select mr-sm-2" id="validationCustom6" name="sanciones[]" multiple="multiple" style="width: 220px"> 
				  			@foreach ($sancioness  as $sanciones => $diasTranscurridos)
					  			<option value="{{ $sanciones }}"{{ $prestamos->sanciones->pluck('id_sancion')->contains($sanciones) ? 'selected' : '' }}>
					  			{{ $diasTranscurridos }}</option>
				  			@endforeach
				  		   </select>	
				  	  </div>
				  	  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.sancion').select2();
    						placeholder: "seleccionar"
    						tags : true
							});
				  		  </script>
				  	   {!!$errors->first('sanciones','<span class=error>:message</span>')!!}
				    </div>  
				</div>


				<div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Estado</span>
			  			<select name="id_estado" class="form-control custom-select  mr-sm-2" id="validationCustom07" style="width: 272px">
							   <option value="" selected>seleccionar</option>	
							   @foreach ($estadoPrestamoo as $estadoPretamo=>$Estado)    
							     <option value="{{ $estadoPretamo }}" {{ old('id_estado',
							     $prestamos->id_estado)== $estadoPretamo ? 'selected':'' }} >
							      {{$Estado}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('id_estado','<span class=error>:message</span>')!!}
				  	</div>
				 </div>

					<div class="row justify-content-start">
						<div class="col-12">
						 <input class="btn btn-success  btn-sm btn-block mt-1" type="submit" value="Enviar">
						</div>
					</div>
			  </div>	
			</div>
		</div>
	</div>			    


