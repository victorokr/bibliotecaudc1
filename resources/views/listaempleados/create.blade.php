@extends ('layouts.app')
@section('content')

@if (session()->has('info'))
<div class="alert alert-success">{{ session('info') }}</div>
@endif

<div class="contenedorEditEmpleados">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card border-light">
				 <div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Crear Empleado') }}</small></div>
				
					<div class="card-body">
						<div class="card bg-light">
						    <form class="needs-validation" novalidate method="POST" action="{{ route('empleados.store') }}"><!--empleados.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
							
							

						              @include('listaempleados.form', ['listaempleados' => new App\Empleado])<!--se le pasa una nueva instancia del modelo empleado vacia, por que no existe roles al crear un empleado en la vista form.blade que originalmente funcionaba con la vista edit, la cual si traia un rol desde la base de datos para mostrar el check en el checkbox-->
									  
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