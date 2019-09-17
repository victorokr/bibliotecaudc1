@extends('layouts.app')
@section('content')

@if (session()->has('info'))
<div class="alert alert-success">{{ session('info') }}</div>
@endif

<div class="contenedorEditEmpleados">
	<div class="row justify-content-star">
		<div class="col-12">
		  <div class="card border-light">
			<div class="card-header"><i class=" fab fa-readme"></i> <small>{{ __('Agregar Editorial') }}</small></div>

		   <div class="card-group">
				<div class="card-body">
					<div class="card bg-light mb-3 ">
					    <form class="needs-validation" novalidate method="POST" action="{{ route('editorial.store') }}"><!--empleados.store esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
						
						  {!!csrf_field() !!} 

						    <div class="card-group">
								<div class="card border-light">
									<div class="card-body justify-content-center">	
									    
									     <div class="col-12 ">
									  	  <div class="input-group input-group-sm mb-4"> 
										  	  <div class="input-group-prepend">
										  		<span class="input-group-text">Editorial</span>
										  		<input class="form-control"  id="validationCustom01" type="text" placeholder="Nombre" name="Editorial" value="{{ old('Editorial')  }}" style="width: 250px" required>
										  	  </div>	  
										  		<div class="valid-feedback">¡se ve bien!</div>
												<small id="passwordHelpBlock" class="form-text text-muted">
						                         
												</small>
												{!!$errors->first('Editorial','<span class=error>:message</span>')!!} 
										  </div> 
										 </div>
										  <div class="row justify-content-star">
											<div class="col-12">
											 <input class="btn btn-success  btn-sm" type="submit" value="Guardar">
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