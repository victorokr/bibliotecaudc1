@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row contacto">
		<div class="col-12">
			<h5 class="tituloContacto" >Contactanos</h5>





@if(session()->has('info'))
	<h3>{{ session ('info') }}</h3>
@else


<div class="card-group">
	<div class="card-body">
		<div class="card bg-light mb-3 text-center">
			<form method="POST" action="{{ route('mensajes.store') }}" >
				{!!csrf_field() !!} 
					<div class="form-group row">
						<div class="col-12 col-md-6">
							<label for="nombre">Nombre</label>
							<input class="form-control" type="text" placeholder="ingresa tu nombre" name="nombre" 
							value="{{ old('nombre') }}">
							{!!$errors->first('nombre','<span class=error>:message</span>')!!}
						</div>
						<div class="col-12 col-md-6">
							<label for="email">Email</label>
							<input class="form-control" type="text" placeholder="ingresa tu correo" name="email" 
							value="{{ old('email') }}">
							{!!$errors->first('email','<span class=error>:message</span>')!!}
						</div>			
					</div>


		
				
		


					<div class="form-group row">
						<div class="col-12 col-md-6">
							<label for="telefono">Telefono</label>
							<input class="form-control" type="telefono" placeholder="ingresa tu telefono" name="telefono" value="{{ old('telefono') }}">
							{!!$errors->first('telefono','<span class=error>:message</span>')!!}
						</div>
						<div class="col-12 col-md-6">
							<label for="mensaje">Mensaje</label>
							<textarea class="form-control" placeholder="escribe tu mensaje" name="mensaje">
							{{ old('mensaje') }}</textarea>
							{!!$errors->first('mensaje','<span class=error>:message</span>')!!}
								
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 col-md-4">
							<button class="btn btn-primary btn-block" type="submit">Enviar</button>
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