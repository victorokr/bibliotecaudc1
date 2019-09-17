@extends('layouts.app')

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

<div class="contenedorimgcontacto">
	<div class="container  ">
	  <div class="row contacto justify-content-center ">
	    <div class="col-8">
	      <div class="card ">
	        <div class="card-header justify-content-center"><i class="icono fas fa-pencil-alt"></i>{{ __('') }}</div>
		      <div class="card-body">
		      	 <p class="font-weight-bolder">Contactanos</p>
			    <div class="card bg-light mb-3 text-center ">
				  <form method="POST" action="{{ route('mensajes.store') }}" >
					{!!csrf_field() !!} 
						<div class="form-group row">
							<div class="col-12 col-md-6">
								
								<input class="form-control" type="text" placeholder="ingresa tu nombre" name="nombre" 
								value="{{ old('nombre') }}">
								{!!$errors->first('nombre','<span class=error>:message</span>')!!}
							</div>
							<div class="col-12 col-md-6">
								
								<input class="form-control" type="text" placeholder="ingresa tu correo" name="email" 
								value="{{ old('email') }}">
								{!!$errors->first('email','<span class=error>:message</span>')!!}
							</div>			
						</div>


			
					
			


						<div class="form-group row">
							<div class="col-12 col-md-6">
								
								<input class="form-control" type="telefono" placeholder="ingresa tu telefono" name="telefono" value="{{ old('telefono') }}">
								{!!$errors->first('telefono','<span class=error>:message</span>')!!}
							</div>
							<div class="col-12 col-md-6">
								
	                            <textarea class="form-control" placeholder="escribe tu mensaje" name="mensaje"></textarea>
								{!!$errors->first('mensaje','<span class=error>:message</span>')!!}
									
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-md-4">
								<button class="btn btn-success btn-block" type="submit">Enviar</button>
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




@stop