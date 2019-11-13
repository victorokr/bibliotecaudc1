@extends('layouts.app')

@section('content')
<!--<h5><center>Biblioteca Universitaria de Colombia</center></h5>-->

      
<div class="contenedorimgHome">
<div class="container">
    <div class="row marcoCarousel">
        <div class="col-12">
    <div id="carouselExampleIndicators" class="carousel slide" data-interval="4000" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
  <div class="carousel-inner border-0 rounded">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/biblioteca.jpg" alt="First slide">

     
      <!-- Static Header -->
                <div class="header-text hidden-xs">
                <div class="col-md-12 text-center">
                <h4>
                <span>Bienvenidos</span>
                </h4>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                @if (auth()->guest())
                <div class="">
                <a class="btn btn-theme btn-sm btn-min-block" href="{{ route('mensajes.create') }}">Contacto</a>
                <a class="btn btn-theme btn-sm btn-min-block" href="{{ url('consultantes/login') }}">Login</a></div>
              @endif
                </div>
                </div><!-- /header-text -->
    


    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/biblio2.jpg" alt="Second slide">
    </div>


                


    <div class="carousel-item">
      <img class="d-block w-100" src="images/udc10.jpg" alt="Third slide">
    </div>
     

  

    <div class="carousel-item">
      <img class="d-block w-100" src="images/udc9.jpg" alt="quarter slide">
    </div>
    </div>
    <a class="left carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>



  </a>
  <a class="right carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>  
            </div>
        </div>  
    </div>
</div>



  <div class="container">
      <div class="row tarjetas">
        <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 "> <!--es lo mismo que col-12 -->
          <h5 class="titulo">Información</h5>
            <div class="card-group">
      <div class="card bg-light mb-3 text-center">
   
      <div class="card-body">
          <h5 class="card-title font-italic font-weight-bold">Identificación</h5>
          <p class="card-text font-italic text-justify">Toda persona que ingrese a la biblioteca cuando desee hacer uso de sus servicios
          debe portar el carné vigente que lo acredite como estudiante, profesor, egresado
          o empleado de la Corporación.
          La utilización del carné es personal e intransferible. El préstamo a otra persona es
          considerado como una contravención a los reglamentos de la Corporación.
          En caso de pérdida del carné, el usuario debe informar inmediatamente a la
          Oficina de Bienestar Institucional para obtener copia del mismo y podrá consultar
          en la sala presentando copia del recibo de pago por la reposición del carné.</p>
          <p class="card-text"><small class="text-muted">Last updated 2019</small></p>
      </div>
    </div>
  <div class="card bg-light mb-3 text-center">
    
      <div class="card-body">
        <h5 class="card-title font-italic font-weight-bold">Prestamos</h5>
        <p class="card-text font-italic text-justify">Toda consulta y solicitud de préstamo debe hacerse a través del catálogo. Por ningún motivo se facilitará material bibliográfico que no haya sido solicitado en los terminales de consulta. La devolución del material debe hacerse personal y directamente con el
        funcionario de turno, para que este a su vez devuelva el carné que el
        usuario dejó para realizar el préstamo. Cada usuario es responsable del material que se encuentre cargado en su registro dentro del sistema. Los libros unicamente se prestan para consulta en sala, y en situaciones especiales para el salon de clase. Deben devolverse a la biblioteca inmediatamente termine su consulta.</p>
        <p class="card-text"><small class="text-muted">Last updated 2019</small></p>
      </div>
    </div>
  
      </div>
    </div>
  </div>
</div>






<div class="container">
  <div class="row tarjetas">
    <div class="col-12 ">
      <h5 class="titulo">Sedes</h5>
        <div class="row">
     <div class="contenedor-imagen col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"> <!--es lo mismo que col-12 -->
      
        <div class="card-group">
          <div class="card bg-light mb-3 text-center">
            <img class="card-img-top" src="images/udc8.PNG" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title font-italic font-weight-bold">Sede 1 (Sede verde)</h5>
                <p class="card-text font-italic">La sede uno esta ubicada en la Cl. 36 #7-19, Bogotá. Cuenta actualmente con 917 libros, los cuales se podran consultar de manera presencial de 8am a 8pm de lunes a viernes.</p>
                <p class="card-text"><small class="text-muted">Last updated 2019</small></p>
              </div>
            </div>
          </div>
        </div>

    <div class="contenedor-imagen col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
  <div class="card bg-light mb-3 text-center">
    <img class="card-img-top" src="images/udc2.PNG" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title font-italic font-weight-bold">Sede 2 (Sede ladrillo)</h5>
      <p class="card-text font-italic">La sede uno esta ubicada en la Cra 7 # 35-72. Parque nacional Bogotá. Cuenta actualmente con 1505 libros, los cuales se podran consultar de manera presencial de 8am a 8pm de lunes a viernes..</p>
      <p class="card-text"><small class="text-muted">Last updated 2019</small></p>
    </div>
  </div>
  </div>

   <div class="contenedor-imagen col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
  <div class="card bg-light mb-3 text-center">
    <img class="card-img-top" src="images/udc1.PNG" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title font-italic font-weight-bold">Sede 3 (Carrera 13)</h5>
      <p class="card-text font-italic">La sede uno esta ubicada en la Cra 13 # 35-99. Ecoopetrol, Bogotá. Cuenta actualmente con 1609 libros, los cuales se podran consultar de manera presencial de 8am a 8pm de lunes a viernes..</p>
      <p class="card-text"><small class="text-muted">Last updated 2019</small></p>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
    </div>
    
</div>
@endsection
