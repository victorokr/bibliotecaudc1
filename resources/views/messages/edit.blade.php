@extends('layouts.app')

@section('content')

@if (session()->has('info'))
      <div class="alert alert-success mt-10"><strong>Aviso: </strong>{{ session('info') }}</div>
      @else

<div class="contenedorimgcontacto">
	<div class="container  ">
	  <div class="row contacto justify-content-center ">
	    <div class="col-8">
	      <div class="card ">
	        <div class="card-header justify-content-center"><i class="icono fas fa-pencil-alt"></i>{{ __('') }}</div>
		      <div class="card-body">
		      	 <p class="font-weight-bolder">Editar mensaje</p>
			    <div class="card bg-light mb-3 text-center ">
				  <form method="POST" action="{{ route('mensajes.update', $messages->id_mensajeContacto) }}" >
				  	{!!method_field('PUT')!!}
					{!!csrf_field() !!} 
						<div class="form-group row">
							<div class="col-12 col-md-6">
								
								<input class="form-control" type="text" placeholder="ingresa tu nombre" name="nombre" 
								value="{{ $messages->nombre }}">
								{!!$errors->first('nombre','<span class=error>:message</span>')!!}
							</div>
							<div class="col-12 col-md-6">
								
								<input class="form-control" type="text" placeholder="ingresa tu correo" name="email" 
								value="{{ $messages->email }}">
								{!!$errors->first('email','<span class=error>:message</span>')!!}
							</div>			
						</div>


			
					
			


						<div class="form-group row">
							<div class="col-12 col-md-6">
								
								<input class="form-control" type="telefono" placeholder="ingresa tu telefono" name="telefono" value="{{ $messages->telefono }}">
								{!!$errors->first('telefono','<span class=error>:message</span>')!!}
							</div>
							<div class="col-12 col-md-6">
								
	                            <textarea class="form-control" placeholder="escribe tu mensaje" name="mensaje" >{{ $messages->mensaje }}</textarea>
								{!!$errors->first('mensaje','<span class=error>:message</span>')!!}
									
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-md-4">
								<button class="btn btn-success btn-block" type="submit">Guardar</button>
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


@endif

	@stop