@extends('layouts.app')
@section('content')




<div class="container-autores">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header"><i class="fas fa-file-download"></i> </i>Cargar Archivo <a class="btn btn-success btn-sm" title="inicio"  href="{{ url('empleados/area') }}"> <i class="fas fa-home"></i> </a> </div>
         <div class="card-body">
          <form action="{{ route('import') }}"method="POST" enctype="multipart/form-data" >
            {!!csrf_field() !!}
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