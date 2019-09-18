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
      <div class="card-header"><i class="fas fa-diagnoses"></i> Mis Prestamos <a class="btn btn-outline-primary btn-sm" href="{{ url('prestamo/consultante') }}"> <i class="fas fa-plus-circle"></i> </a></div>
       <div class="card-body">
       	 <form method="GET" action="{{ route('misprestamos.index') }}">
			  <div class="form-row align-items-center">
			    <div class=" col-3">
			      <label class="sr-only" for="inlineFormInput">Autor</label>
			      <input type="text" class="form-control mb-2" value="{{ request('Nombre')}}" id="prueba" name="Nombre" placeholder="Material" readonly>
			    </div>
			    
			    <div class="col-auto" title="Buscar">
			      <button type="submit" class="btn btn-primary mt-3 ml-1 mr-1"><i class="fas fa-search"></i></button>
			    </div>
			    <div class="col-auto" title="Restablecer">
			      <a href="{{ url('misprestamos') }}"   class="btn btn-light mt-3 ml-1 "><i class="fas fa-reply"></i></a>
			    </div>
			    <div class="logoudc col-auto " title="logoUDC">
			      <img class="card-img-top img-fluid " src="/images/logoUDC.jpg"  >	
			      
			    </div>

			  </div>
		 </form>
        
		<div class="table-responsive">
	      <table class="table table-hover table-sm  ">
		    <caption>MisPrestamos</caption>
		     <thead class="thead-light">
			
			  <tr>
				<th>FechaInicio</th>
				<th>Fecha de entrega</th>   <!--campos de la tabla-->
				<th>Responsable</th>
				<th>Material</th>
				<th>Estado del prestamo</th>
				<th>Multa</th>
			  </tr>


		     </thead>

		     <tbody>
			 @forelse ($misprestamos as $misprest) <!--desde el controlador, metodo index, se pasa la variable materialBiblioteca-->

			 <tr>

				{{-- {{dd($misprest)}} --}}
				<td>{{ $misprest->Fecha_prestamo }}</td>
				<td>{{ $misprest->Fecha_devolucion }}</td>
				<td>{{ optional($misprest->consultanteBiblioteca)->Nombre }}</td>
				<td>{{ $misprest->materialBibliotecas->pluck('Titulo')->implode(' - ')}}</td>
				<td>{{ optional($misprest->estado)->Estado }}</td>
				<td>{{ $misprest->sanciones->pluck('multa')->implode(' - ')}}</td>
				{{-- <td>{{ optional($misprest->consultanteBiblioteca)->Nombre }}</td> --}}
				{{-- <td>{{ optional($misprest->consultanteBiblioteca)->Fecha_prestamo  }}</td>
				<td>{{ $misprest->prestamo->Fecha_devolucion  }}</td> --}}
				@empty
			    <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
							
			 </tr>
			 @endforelse
		     </tbody>
		  </table>
		 {{--  {{ $listaAutores->render()}} --}}
		        
		</div>
	   </div>
    </div>
  </div>		
 </div>
</div>

@endsection