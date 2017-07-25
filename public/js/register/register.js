$(document).ready(function(){

$(document).on('click','#save-register', function(){
	console.log("click");
	sendData();//Enviar
});

function sendData() {
    /*Obtener centrales creadas*/
    var centrales = [];
    	//var repotenciacion_number = $('.repotenciacion[data-central=' + value + ']').is(':checked') == true ? 0 : 1;
        
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    var data = {input_ejemplo:"aquí"}

    if (typeof respuesta !== 'undefined') {
        respuesta.abort();
    }
    respuesta = $.ajax({
        url: save_url,
        type: "post",
        data: data,
        dataType: 'json',
        success: function (response) {
            
        },
        error: function (response) {
            if(response.status == 401){ location.reload(); }//Si no tiene la sesión activa muestra vista para volverse a loguear
        }
    });
}




});