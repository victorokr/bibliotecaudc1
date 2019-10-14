@extends('layouts.app')
@section('content')


<div class="contenedorEditEmpleados">
  <div class="row">
	<div class="col-12">
	  <div class="card border-light">
		<div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Finalizar Prestamo') }}</small></div>
			<div class="card-body">
				<div class="card bg-light mb-3">
					    <form method="POST" action="{{ route('prestamos.update',
					     $prestamos->id_prestamo) }}"><!--consultantes.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->

								  
						

					             
 {!!csrf_field() !!} 

    <div class="card-deck">
		<div class="card border-light">
		  <div class="card-header text-center"><small>Informacion del prestamo</small></div>	
			<div class="card-body justify-content-center">	
			  <div class="form-row align-items-center">


			  	 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">Material</span>	
			  			  <select name="materialBibliotecas[]"  class="libros form-control custom-select mr-sm-2" id="validationCustom1"    title="Ingresa el libro de la busqueda"   required> 
				  			@foreach ($listaMateriall  as $listaMaterial => $Titulo)
					  			<option value="{{ $listaMaterial }}"{{ $prestamos->materialBibliotecas->pluck('id_materialBiblioteca')->contains($listaMaterial) ? 'selected' : '' }}>{{ $Titulo }}</option>
				  			@endforeach
				  		   </select>	
				  	  </div>
				  	      <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.libros').select2();
    						
    						$(".libros").select2({
							  maximumSelectionLength: 1,
							  selectOnClose: true
							});

							});
				  		  </script>
				  	   {!!$errors->first('libros','<span class=error>:message</span>')!!}
				    </div>  
				</div>


				 <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Solicitante</span>
			  			<select name="id_consultanteBiblioteca" class="solicitante form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 370px" title="Selecciona tu Nombre" required>
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
    						
    						$(".solicitante").select2({
							  maximumSelectionLength: 1,
							  selectOnClose: true
							});

							});
				  	  </script>	 
					  {!!$errors->first('solicitante','<span class=error>:message</span>')!!}
				  	</div>
				 </div>


				 


				 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">UbicacionSede</span>	
			  			  <select name="ubicaciones[]" class="sede form-control custom-select mr-sm-2" id="validationCustom03"   style="width: 343px" title="Ingresa el libro de la busqueda" required> 
				  			@foreach ($ubicacioness  as $ubicaciones => $Sede)
					  			<option value="{{ $ubicaciones }}"{{ $prestamos->ubicaciones->pluck('id_ubicacion')->contains($ubicaciones) ? 'selected' : '' }}>{{ $Sede }}</option>
				  			@endforeach
				  		   </select>	
				  	  </div>
				  	      <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.sede').select2();
    						
    						$(".sede").select2({
							  maximumSelectionLength: 1,
							  selectOnClose: true
							});

							});
				  		  </script>
				  	   {!!$errors->first('sede','<span class=error>:message</span>')!!}
				    </div>  
				</div>

				<div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">TipoDePrestamo</span>
			  			<select name="id_tipoDePrestamo" class="tipo form-control custom-select  mr-sm-2" id="validationCustom02" style="width: 333px"  required >
							   <option value="" selected>seleccionar</option>	
							   @foreach ($tipoDePrestamoo as $tipo=>$tipoDePrestamo)    
							     <option value="{{ $tipo }}" {{ old('id_tipoDePrestamo',
							     $prestamos->id_tipoDePrestamo)== $tipo ? 'selected':'' }} >
							      {{$tipoDePrestamo}} </option>
							   @endforeach
						</select>
				  	  </div>
				  	    <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.tipo').select2();
    						
    						$(".tipo").select2({
							  maximumSelectionLength: 1,
							  selectOnClose: true
							});

							});
				  		</script>
				  	  	<div class="valid-feedback">¡se ve bien!</div> 
						{!!$errors->first('tipoDePrestamo','<span class=error>:message</span>')!!}
				  	</div>
				 </div>

				<div class="col-8">
			  	  <div class="input-group input-group-sm mb-3"> 
				  	  <div class="input-group-prepend">
				  		<span class="input-group-text">Fecha de Inicio</span>
				  		<input class="form-control"  id="validationCustom04" style="width: 343px" type="date" name="Fecha_prestamo" value="{{ $prestamos->Fecha_prestamo  }}" readonly required>
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
						<input class="form-control"  id="validationCustom05" type="date" name="Fecha_devolucion" value="{{ $prestamos->Fecha_devolucion}}" readonly required style="width: 328px" >
					  </div>	
						<div class="valid-feedback">¡se ve bien!</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
                         
						</small>
						{!!$errors->first('Fecha_devolucion','<span class=error>:message</span>')!!}
					</div>
				 </div>

				 
			     

			  </div>    
			</div>
		</div>






		{{-- <div class="card border-light">
		  <div class="card-header text-center"><small>Multas</small></div>	
			<div class="card-body"> 
			    <div class="form-row align-items-center"> --}}
			      

				 

				 	


				 {{-- <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Estado</span>
			  			<select name="id_estado" class="form-control custom-select  mr-sm-2" id="validationCustom08" style="width: 264px" required >
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
				 </div> --}}

				 
			{{-- 	</div> 
			</div>	 
		</div> --}}

		<div class="card border-light">
		  <div class="card-header text-center"><small>Devolución del prestamo</small></div>
			<div class="card-body">
			  <div class="form-row align-items-center">


			  	 {{-- <div class="col-12">
				  	<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">
				  	  	<span class="input-group-text">Recibe</span>
			  			<select name="id_empleado" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 275px" >
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
				 </div> --}}


				 <div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">Novedades</span>	
			  			  <select  class="novedades form-control custom-select mr-sm-2" id="validationCustom06" name="novedades[]" multiple="multiple" style="width: 394px" required> 
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
				    <table class="table table-sm table-bordered">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col"><small>Dias retrasados</small></th>
					      <th scope="col"><small>Debe</small></th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      
					      <td>{{ $prestamos->diasEstado() }}</td>
					      <td>${{ number_format($prestamos->valor(),0,',','.') }}</td>
					    </tr>
					   
					  </tbody>
					</table>
				 </div>

				{{-- <input type="hidden" name="diasDeRetraso"
				   value="{{ request('ubicaciones') }}">  --}}

				<div class="col-12">
			  		<div class="input-group input-group-sm mb-4"> 
				  	  <div class="input-group-prepend">	
			  			  <span class="input-group-text">multa</span>	
			  			  <select  class="sancion form-control custom-select mr-sm-2" id="validationCustom07" name="sanciones[]" multiple="multiple" style="width: 430px" required> 
				  			@foreach ($sancioness  as $sanciones => $multa)
					  			<option value="{{ $sanciones }}"{{ $prestamos->sanciones->pluck('id_sancion')->contains($sanciones) ? 'selected' : '' }}>
					  			{{ $multa }}</option>
				  			@endforeach
				  		   </select>	
				  	  </div>
				  	  <script type="text/javascript" >
				  		  	$(document).ready(function() {
    						$('.sancion').select2();
    						
    						$(".sancion").select2({
							  maximumSelectionLength: 1,
							  selectOnClose: true
							});

							});
				  		  </script>
				  	   {!!$errors->first('sanciones','<span class=error>:message</span>')!!}
				    </div>  
				</div>


				

				<div class="row justify-content-center">
					<div class="col-12">
					<input class="btn btn-success  btn-sm btn-block mt-1" type="submit" value="Finalizar Prestamo" style="width: 450px">
					</div>
				</div>
			  </div>	
			</div>
		</div>
	</div>


								  



								  
						</form>	  
		        </div>
		    </div>
	  </div>
	</div>
  </div>
</div>

@endsection