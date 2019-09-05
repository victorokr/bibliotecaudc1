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
  <div class="row">
  	<div class="col">
  		<div class="card">
  		  <div class="card-header"><i class=" fab fa-readme"></i>Cargar Archivo</div>
  			 <div class="card-body">
  			 	<form action="{{ route('import') }}"method="POST" enctype="multipart/form-data" >
  			 		@csrf
  			 		<input type="file" name="file" class="form-control">
  			 		<br>
  			 		<button class="btn btn-success">import</button>
  			 		<a class="btn btn-warning" href="{{ route('export') }}">Export</a>
  			 	</form>
  			 </div>
  		</div>
  	</div>
  </div>	
</div>




@endsection