@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row contacto">
		<div class="col-12">
			<h5 class="tituloContacto">Editar Mensaje </h5>

	<div class="card-group">
		<div class="card-body">
			<div class="card bg-light mb-3 text-center">
			    <form method="POST" action="{{ route('mensajes.update', $messages->id_mensajeContacto) }}">
				{!! method_field('PUT')!!}  <!--funcion para enviar metodo put, laravel solo soporta post y get-->
				{!!csrf_field() !!} 
			  <div class="form-group row">
				  	<div class="col-12 col-md-6">
				  		<label for="nombre">Nombre</label>
				  		<input class="form-control" type="text" name="nombre" value="{{ $messages->nombre }}">  <!--recibe $messages desde el controlador-->
						{!!$errors->first('nombre','<span class=error>:message</span>')!!}
				  	</div>

					<div class="col-12 col-md-6">
						<label for="nombre">Email</label>
						<input class="form-control" type="text" name="email" value="{{ $messages->email}}">
						{!!$errors->first('email','<span class=error>:message</span>')!!}
					</div>
	
			  </div>


			  <div class="form-group row">
			  		<div class="col-12 col-md-6">
			  			<label for="nombre">Telefono</label>
			  			<input class="form-control" type="telefono" name="telefono" value="{{ $messages->telefono }}">
						{!!$errors->first('telefono','<span class=error>:message</span>')!!}
			  		</div>


			  		<div class="col-12 col-md-6">
			  			<label for="nombre">Mensaje</label>
			  			<textarea class="form-control" name="mensaje">{{ $messages->mensaje }}</textarea>
						{!!$errors->first('mensaje','<span class=error>:message</span>')!!}
			  		</div>
			  </div>


			  <div class="row justify-content-center">
			  		<div class="col-12 col-md-4">
			  			<input class="btn btn-primary btn-block" type="submit" value="Enviar">
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