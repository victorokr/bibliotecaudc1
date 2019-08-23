@extends ('layouts.app')
@section('content')


<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('info'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('info') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>


<div class="contenedorEditEmpleados">
	<div class="container">
		<div class="row">
			<div class="col-12">
			   <div class="card">
			   	 <div class="card-header"><i class="icono fas fa-users-cog"></i> <small>{{ __('Editar Contrato') }}</small></div>
					<div class="card-body">
						<div class="card bg-light mb-3 text-center">
						    <form class="needs-validation" novalidate method="POST" action="{{ route('contratos.update', $listacontratos->id_contrato) }}"><!--empleados.update esta ruta se verifica en la consola con php artisan r:l en caso de no ser encontrada-->
							{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->
							
						              @include('listacontratos.form')

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