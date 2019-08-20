@extends('layouts.app')
@section('content')
 

<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
		@if (session()->has('infoDeleteEditorial'))
		<div class="alert alert-success mt-1 text-center" style="width: 900px" id="alerta" >
		  <strong>Aviso: </strong>{{ session('infoDeleteEditorial') }}
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
      <div class="card-header"><i class=" fab fa-readme"></i> Editoriales <a class="btn btn-outline-primary btn-sm" href="{{ url('editorial/create') }}"> <i class="fas fa-plus-circle"></i> AgregarEditorial</a></div>
       <div class="card-body">
       	    <form method="GET" action="{{ route('editorial.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-2">
			      <label class="sr-only" for="inlineFormInput">Editorial</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Editorial')}}" id="prueba" name="Editorial" placeholder="Editorial">
			    </div>
			    
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('editorial') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			    <div class="logoudc col-auto " title="logoUDC">
			      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
			      
			    </div>

			  </div>
			</form>
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm table-light table-bordered ">
		    <caption>Editoriales</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>Acciones</th>
				<th>ID</th>   <!--campos de la tabla-->
				<th>Editorial</th>
				
				

			  </tr>


		     </thead>

		     <tbody>
			 @forelse ($listaEditoriales as $edito) <!--desde el controlador, metodo index, se pasa la variable $listaEditoriales-->

			 <tr>

				<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							
								<a class="editar btn btn-info btn-sm" href="{{route('editorial.edit',
								 $edito->id_editorial) }}"><i class="fas fa-edit"></i></a> <!--crea el enlace sobre editar-->
					 
							
							
							{{-- <form style="display: inline" method="POST" action="{{ route('editorial.destroy', $edito->id_editorial) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}

								<button class="eliminar btn btn-danger btn-sm" type="submit" disabled><i class="fas fa-trash-alt"></i></button>
							</form> --}}

							<button class="eliminar btn btn-danger btn-sm"
								data-toggle="modal" onclick="deleteData({{$edito->id_editorial}})" data-target="#delete"
								title="Eliminar"><i class="fas fa-trash-alt"></i></button>
					
				</td>
				<td>{{ $edito->id_editorial  }}</td>
				<td>{{ $edito->Editorial  }}</td>
				@empty
			    <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
							
			 </tr>
			 @endforelse
		     </tbody>
		  </table>
		      {{ $listaEditoriales->render() }}
		      {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Editorial</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar la editorial?</p>
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
						     function deleteData(id_editorial)
						     {
						         var id = id_editorial;
						         var url = '{{ route("editorial.destroy", ":id") }}';
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