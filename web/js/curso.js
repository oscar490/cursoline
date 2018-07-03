$(document).ready(function() {

    //  Mostrar y ocultar módulos de un curso.
    $("button#button_flecha").on('click', function() {
        let modulos = $(this).parent().next().next();
        let icon = '';
        
        if (modulos.css('display') != 'none') {
            icon = 'glyphicon glyphicon-chevron-right';

        } else {
            icon = 'glyphicon glyphicon-chevron-down';
        }

        modulos.slideToggle();

        $(this).find('span').attr('class', icon);
    })
})