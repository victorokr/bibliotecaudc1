@extends('layouts.app')
@section('content')
 

<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoDeleteAutor'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDeleteAutor') }}
		  <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
				<span arial-hidden="true"> &times; </span>
		  </button>
	    </div>
		@endif
	</div>	
  </div>
</div>


<div class="container-autores">
 <div class="row menuEmpleados">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-diagnoses"></i> Autores <a class="btn btn-outline-primary btn-sm" href="{{ url('autor/create') }}"> <i class="fas fa-plus-circle"></i> AgregarAutor</a></div>
       <div class="card-body">
       	 <form method="GET" action="{{ route('autor.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-3">
			      <label class="sr-only" for="inlineFormInput">Autor</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Nombre')}}" id="prueba" name="Nombre" placeholder="Nombre">
			    </div>
			    
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('autor') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			    <div class="logoudc col-auto " title="logoUDC">
			      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
			      
			    </div>

			  </div>
			</form>
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm  ">
		    <caption>Autores</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>Acciones</th>
				<th>ID</th>   <!--campos de la tabla-->
				<th>Nombre</th>
				
				

			  </tr>


		     </thead>

		     <tbody>
			 @forelse ($listaAutores as $auto) <!--desde el controlador, metodo index, se pasa la variable materialBiblioteca-->

			 <tr>

				<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							
								<a class="editar btn btn-info btn-sm" href="{{route('autor.edit',
								 $auto->id_autor) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
					 
							
							    <button class="eliminar btn btn-danger btn-sm"
								data-toggle="modal" onclick="deleteData({{$auto->id_autor}})" data-target="#delete"
								title="Eliminar"><i class="fas fa-trash-alt"></i></button>
					
				</td>
				<td>{{ $auto->id_autor  }}</td>
				<td>{{ $auto->Nombre  }}</td>
				@empty
			    <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
							
			 </tr>
			 @endforelse
		     </tbody>
		  </table>
		  {{ $listaAutores->render()}}
		        {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Autor</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar este autor?</p>
					        {{-- <input type="hidden" name="id_materialBiblioteca" value=""> --}}
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-danger" data-dismiss="modal"
					      	onclick="formSubmit()">Si</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					      </div>
				    </div>
				   </form>
				  </div>
				           <script type="text/javascript">
						     function deleteData(id_autor)
						     {
						         var id = id_autor;
						         var url = '{{ route("autor.destroy", ":id") }}';
						         url = url.replace(':id', id);
						         $("#deleteForm").attr('action', url);
						     }

						     function formSubmit()
						     {
						         $("#deleteForm").submit();
						     }
						   </script>
			    </div>
		</div>
	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection