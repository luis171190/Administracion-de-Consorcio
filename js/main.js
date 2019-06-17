//$(document).ready(function(){
//    $('.menu li:has(ul)').click(function(e){
//        e.preventDefault();
//        
//        if ($(this).hasClass('activado')){
//            $(this).removeClass('activado');
//            $(this).children('ul').slideUp();
//        } else {
//            $('.menu li ul').slideUp();
//            $('.menu li').removeClass('activado');
//            $(this).addClass('acticado');
//            $(this).children('ul').slideDown();
//        }
//    }); 
//});

$("#item-ingresar").click(function(){
    $(this).children("ul").slideToggle();
})

