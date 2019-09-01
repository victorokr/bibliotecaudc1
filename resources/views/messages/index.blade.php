@extends('layouts.app')

@section('content')

<div class="container-mensajes">
  <div class="continer">
    <div class="row ">
      <div class="col-12">		
		<div class="card">
		  <div class="card-header"><i class="icono fas fa-envelope-open-text"></i> <small>{{ __('lista Mensajes') }}</small></div>
		   <div class="card-body">	
	         <div class="table-responsive">
		       <table class="table table-hover table-sm ">
			   <caption>Lista de Mensajes</caption>
			   <thead class="thead-light">
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

					{{-- <td>
						<a href="{{route('mensajes.show', $message->id_mensajeContacto) }}"> crea un enlace sobre los nombres de la tabla
							{{ $message->nombre}}
						</a>
					</td> --}}

					<td>{{ $message->nombre}}</td>
					<td>{{ $message->email}} </td>
					<td>{{ $message->telefono}} </td>
					<td>{{ $message->mensaje}} </td>
					<td>
						
						<a class="editar btn btn-info btn-sm" href="{{route('mensajes.edit', $message->id_mensajeContacto) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->



						<form style="display: inline"method="POST" action="{{ route('mensajes.destroy', $message->id_mensajeContacto) }}" >

							{!! csrf_field()!!}
							{!! method_field('DELETE')!!}

							<button class="eliminar btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
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
    </div>
  </div>
</div>
@stop