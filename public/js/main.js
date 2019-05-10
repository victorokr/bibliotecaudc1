// codigo jquery menu


    $(document).ready(function(){
    $('.menu li:has(ul)').click(function(e){
        e.preventDefault(); //no permite redirigir a ningun enlace

        if ($(this).hasClass('activado')){
            $(this).removeClass('activado');
            $(this).children('ul').slideUp();

        } 

        else {
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activado');
            $(this).addClass('activado');
            $(this).children('ul').slideDown();
        }

    });

    //controla el menu para dispositivos moviles
    $('.btn-menu').click(function(){
        $('.contenedor-menu .menu').slideToggle();
    });

    //evita que el menu se oculte en tamaños de pantalla como tablets
    $(window).resize(function(){
        if ($(document).width() > 450){
            $('.contenedor-menu .menu').css({'display' : 'block'});
        }

        //si cambia de posicion la pantalla (ej tablet), vuelve y aparece cerrado el menu
        if ($(document).width() < 450){
            $('.contenedor-menu .menu').css({'display' : 'none'});
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activado');
        }

    });

        //permite redirigir a un enlace, ya que rl e.preventDefault(); no lo permite
        $('.menu li ul li a').click(function(){
            window.location.href = $(this).attr("href");
        });
    
});
