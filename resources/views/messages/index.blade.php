@extends('layouts.app')


@section('content')

<div class="continer">
	<div class="row contaco">
		<div class="col-12">
			<h5><p class="text-center font-weight-light text-info ">Lista de mensajes</h5></p>


	

	<div class="table-responsive">
	<table class="table table-hover table-sm table-light table-bordered">
		<caption>Lista de Mensajes</caption>
		<thead class="thead-dark">
			
			<tr>
				<th>ID</th>   <!--campos de la tabla-->
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>Mensaje</th>
				<th>Acciones</th>

			</tr>


		</thead>

		<tbody>
			
			@foreach ($messages as $message)  <!--muestra el contenido de la bd en la tabla -->
			<tr>
				<td>{{ $message->id_mensajeContacto}} </td>
				<td>
					<a href="{{route('mensajes.show', $message->id_mensajeContacto) }}"> <!--crea un enlace sobre los nombres de la tabla-->
						{{ $message->nombre}}
					</a>
				</td>

				
				<td>{{ $message->email}} </td>
				<td>{{ $message->telefono}} </td>
				<td>{{ $message->mensaje}} </td>
				<td>
					
					<a class="btn btn-info btn-sm" href="{{route('mensajes.edit', $message->id_mensajeContacto) }}">Editar</a> <!--crea el enlace sobre editar-->



					<form style="display: inline"method="POST" action="{{ route('mensajes.destroy', $message->id_mensajeContacto) }}" >

						{!! csrf_field()!!}
						{!! method_field('DELETE')!!}

						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>

				</td>
			</tr>
			@endforeach

		</tbody>



	</table>
	  </div>
	</div>
  </div>

</div>
	@stop