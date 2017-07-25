$(document).ready(function(){

	$('.nosotros-menu').hover(function() {
		init_popup();

	    $('.popup-container.container.nosotros').addClass('display-block');
	    $('.popup-container.container.nosotros').removeClass('display-none');
	},function() {
	    $('.popup-container.container.nosotros').removeClass('display-block');
	});

	$('.eventos-especiales-menu').hover(function() {
		init_popup();
	    $('.popup-container.container.eventos-especiales').addClass('display-block');
	    $('.popup-container.container.eventos-especiales').removeClass('display-none');
	},function() {
	    $('.popup-container.container.eventos-especiales').removeClass('display-block');
	});

	$('.regalos-menu').hover(function() {
		init_popup();
	    $('.popup-container.container.regalos').addClass('display-block');
	    $('.popup-container.container.regalos').removeClass('display-none');
	},function() {
	    $('.popup-container.container.regalos').removeClass('display-block');
	});

	$('.informacion-menu').hover(function() {
		init_popup();
	    $('.popup-container.container.informacion').addClass('display-block');
	    $('.popup-container.container.informacion').removeClass('display-none');
	},function() {
	    $('.popup-container.container.informacion').removeClass('display-block');
	});

	$('.contacto-menu').hover(function() {
		init_popup();
	    $('.popup-container.container.contacto').addClass('display-block');
	    $('.popup-container.container.contacto').removeClass('display-none');
	},function() {
	    $('.popup-container.container.contacto').removeClass('display-block');
	});


	/*Ocultar popups*/
	$('html').on('click', function(){
		$('.popup-container.container').addClass('display-none');
	});

	function init_popup(){
		$('.popup-container.container').addClass('display-none');
		$('.popup-container.container').removeClass('display-block');
	}

	/*CLICK NAVEGACIÓN*/
	$(document).on('click','li.click-nav',function(){
		var url = $(this).find('a').attr('href');
		window.location.href = url;
	});


});