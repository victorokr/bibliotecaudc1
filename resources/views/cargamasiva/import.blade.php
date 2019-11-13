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
               <div class="col-12">
                  <div class="input-group input-group-sm mb-4"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text">TipoDeMaterial</span>
                      <select name="id_tipoDeMaterial" class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 155px" required>
                      <option value="" selected>seleccionar</option> 
                      @foreach ($tipoDeMateriall as $tipomate=>$Tipo_de_material)    
                      <option value="{{ $tipomate }}" {{ old('id_tipoDeMaterial') }} >
                      {{$Tipo_de_material}} </option>
                      @endforeach
                      </select>
                    </div>
                    <div class="valid-feedback">¡se ve bien!</div> 
                        {!!$errors->first('id_tipoDeMaterial','<span class=error>:message</span>')!!}
                    </div>
               </div>

               {{-- <div class="col-12">
                          <div class="input-group input-group-sm mb-4"> 
                            <div class="input-group-prepend"> 
                              <span class="input-group-text">SedeActual</span>  
                              <select  class="sede form-control custom-select mr-sm-2" id="validationCustom05" name="ubicaciones[]" multiple="multiple" style="width: 205px" required> 
                              @foreach ($ubicacionn  as $ubica => $Sede)
                                <option value="{{ $ubica }}">
                                {{ $Sede }}</option>
                              @endforeach
                               </select>  
                            </div>
                            <script type="text/javascript" >
                                $(document).ready(function() {
                              $('.sede').select2();
                              $(".sede").select2({
                              maximumSelectionLength: 1,
                              
                            });
                            });
                              </script>
                             {!!$errors->first('ubicaciones','<span class=error>:message</span>')!!}
                          </div>  
               </div> --}}

               <div class="col-10">
                  <div class="input-group input-group-sm mb-4"> 
                    <div class="input-group-prepend">
                        <span class="input-group-text">Entradas</span>
                        <select  class="entrada form-control custom-select mr-sm-2" id="validationCustom03" name="entradas[]" multiple="multiple" style="width: 195px" >
                        @foreach ($entradass as $entradas => $Entrada)
                          <option value="{{ $entradas }}">
                          {{ $Entrada }}</option>
                        @endforeach
                        </select>
                    </div>
                        <script type="text/javascript" >
                              $(document).ready(function() {
                              $('.entrada').select2();
                              $(".entrada").select2({
                              maximumSelectionLength: 1,
                              
                            });
                            });
                        </script>
                            
                             {!!$errors->first('entradas','<span class=error>:message</span>')!!}
                  </div>
               </div>

            <input type="file" name="file" class="form-control" required>
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