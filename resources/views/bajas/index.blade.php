@extends('layouts.app')
@section('content')
 
@if (session()->has('infoDeleteEjemplar'))
<div class="alert alert-success">{{ session('infoDeleteEjemplar') }}</div>
@endif


<div class="container-autores">
 <div class="row menuEmpleados">
  <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
  	<div class="card">
      <div class="card-header"><i class="fas fa-diagnoses"></i>Motivo de Baja <a class="btn btn-success btn-sm" href="{{ url('ejemplares/create') }}"> <i class="fas fa-plus-circle"></i> Agregar</a></div>
       <div class="card-body">
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm table-light table-bordered ">
		    <caption>Ejemplares</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>Acciones</th>
				<th>Bajas Por</th>   <!--campos de la tabla-->
				<th>Fecha</th>
				<th>Sede</th>
				
				

			  </tr>


		     </thead>

		     <tbody>
			 @foreach ($listaDeBajas as $listBajas) <!--desde el controlador, metodo index, se pasa la variable materialBiblioteca-->

			 <tr>

				<td><!--con esta etiqueta se alinean horizontalmente los botones del crud-->
							
								<a class="editar btn btn-info btn-sm" href="{{route('bajas.edit',
								 $listBajas->id_baja) }}" ><i class="fas fa-edit"></i></a> 
					 
							
							
							<form style="display: inline" method="POST" action="{{ route('bajas.destroy', $listBajas->id_baja) }}" >

								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}

								<button class="eliminar btn btn-danger btn-sm" type="submit" disabled><i class="fas fa-trash-alt"></i></button>
							</form>
					
				</td>
				
				<td>{{ $listBajas->Baja  }}</td>
				<td>{{ $listBajas->Fecha}}</td>
				{{-- <td>{{ optional($listBajas->baja)->Titulo  }}</td> --}}
							
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

@endsection