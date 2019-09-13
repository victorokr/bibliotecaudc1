@extends('layouts.app')
@section('content')


<div class="container-indexprestamo">
	<div class="row justify-content-center">
		<div class="col-auto col-12">
		  <div class="card border-light">
			<div class="card-header"><i class="fas fa-book-reader"></i> Solicitud de prestamo <a class="btn btn-success btn-sm" title="prestamo"  href="{{ url('prestamo/consultante/create') }}"> <i class="fas fa-book-reader"></i> </a></div>
			   <div class="card-group">
					<div class="card-body">
						
						  


			              <div class="table-responsive">
						      <table class="table table-hover table-sm   ">
							    <caption>Prestamo</caption>
							     <thead class="thead-light">
								
								  <tr>
								  	<th > ID</th>
									<th >TituloDelLibro</th>
									<th >Solicitante</th>
									<th >Sede-Ubicacion</th>
								  </tr>


							     </thead>

							   {{--   <tbody>
							     	<tr>
							     		
							     		<td>{{ auth()->user()->Nombre}}</td>

							     	</tr>
							     </tbody> --}}

							     <tbody>

								 <tr>
								 	<td>{{ Request ('id_materialBiblioteca') }}</td>
									<td>{{ Request ('tituloLibro')}}</td>
									<td>{{ auth()->user()->Nombre}}</td>
									<td>{{ Request ('ubicaciones') }}</td>
									{{--  crear scope where idmaterial=idubicacion --}} 




									
									{{-- <td>{{ $consultamaterial->estado->pluck('Estado')->implode(' - ')}}</td> --}}
									
									{{-- <td>{{ $consultamaterial->temaDelmaterial->pluck('Area')->implode(' - ')}}</td> --}}
									{{-- <td>{{ $consultamaterial->carreras->pluck('Carrera')->implode(' - ')}}</td> --}}

									 

									<td>
												
													
										
									</td>
									
									
									

								 </tr>
							     </tbody>			
							  </table>
							  
						  </div>


						    <form  method="POST" action="{{ route ('consultante.store') }}">
							    {!!csrf_field() !!} 
							    <input type="hidden" name="id_materialBiblioteca"
							     value="{{ request('id_materialBiblioteca') }}">

							    {{-- <input type="hidden" name="id_consultanteBiblioteca"
							     value="{{ ('auth()->id_consultanteBiblioteca()') }}"> --}}

							     <input type="hidden" name="ubicaciones"
							     value="{{ request('ubicaciones') }}">

								<div class="row justify-content-start">
									<div class="col-12">
										<input class="btn btn-success  btn-sm btn-block mt-1" type="submit" value="Solicitar Prestamo">
									</div>
								</div>
						              
							</form>	  
			           
			        </div>
	           </div>



	    </div>
	  </div>
    </div>
</div>

				




@endsection