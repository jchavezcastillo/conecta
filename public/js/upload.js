function sessionAlive() {
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    $.ajax({
        url: session_alive,
        type: "post",
        success: function (response) {
            if (response.error_token) {
                window.location.href = session_url_plupload;
            } else {
                if (response.success) {
                    return true;
                }
            }
        }
    });
}

var file_name = "";
var path = "";
var url = "";

function save_productImg()
{
    var _data = {
        file_name: file_name,
        path: path,
        url: url,
        id_product: id_prod
    }

    $.ajax({
        url: url_upd_p_updateImg,
        type: "post",
        data: _data,
        dataType: 'json',
        success: function (response) {
            if(response.success){
                alert("Se actualizó la imagen.");
                $('#modal-upload-img').modal('hide');
                $('#img-prod-' + id_prod).attr("src", response.url_prod);
            }else{
                $('#modal-upload-img').modal('hide');
                alert("No se pudo actualizar la imagen.");
            }
        },
        error: function (response) {
        }
    });
}

jQuery(function () {
  console.log("Al cargar1");
    var createInterval = undefined;
    var interval_duration = (60 * 1000) * 5; // cada 5 minutos

    var uploader = $("#uploader").plupload({
        // General settings
        runtimes: 'html5,flash,silverlight,html4',

        url: upload_url,

        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },

        // Maximum file size
        max_file_size: '40mb',

        chunk_size: '1mb',

        // Rename files by clicking on their titles
        rename: true,

        // Sort files
        sortable: true,

        // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
        dragdrop: true,

        // Views to activate
        views: {
            list: true,
            active: 'list'
        },

        //max_file_count: 15,

        filters: {
            mime_types: [
                {title: "Archivos  png | jpg", extensions: "png,jpg,PNG,JPG"}
            ],
            max_file_size: "40mb",
            prevent_duplicates: true
        },

        multi_selection: true,

        prevent_duplicates: true,

        multipart_params: {
            "originalUpName" : 'product.jpg'
        },

        unique_names : true, //nombres unicos en chunks

        init: {
            BeforeUpload: function (up, file, info) {

                //$('#category-document').prop('disabled', true);//Bloquear combo de categoría
                //set variable originalUpName for servlet post
                //up.settings.multipart_params.originalUpName = file.name;
                //up.settings.multipart_params.category_proposal_id = $('#category-document').find('option:selected').attr('id');//Nueva línea para enviar category_proposal_id

                //valid_date();

                createInterval = setInterval(function () {
                    sessionAlive();
                }, interval_duration);

                //$("#uploader_browse").addClass("button-disabled");
                //$("#uploader_browse").addClass("ui-state-disabled");

                //$('.plupload_right').hide();
            },
            PostInit: function () {
                //$(".plupload_view_switch").hide();
                //$(".plupload_stop").remove();
            },
            UploadComplete: function (up, files) {
                //$('.save-bidders').prop('disabled', false);//Desbloquear botón para generar  postores
                up.refresh();
                up.splice();
                clearInterval(createInterval);
                //$("#uploader_browse").removeClass("button-disabled");
                //$("#uploader_browse").removeClass("ui-state-disabled");
            },
            FileUploaded: function (up, file, response) {
                var response = JSON.parse(response.response);
                /*Se asigna la ruta temporal del excel con los postores*/
                file_name = response.result.file;
                path = response.result.folder;
                url = response.result.ruta_archivo;
                if(response.result.success){
                  save_productImg();//Se actualiza la imagen del producto
                }else{
                    $('#modal-upload-img').modal('hide');
                }
            },
            FilesAdded: function (up, files) {
                /*Se asegura que sólo se pueda subir un excel*/
                var num_file = 0;
                $('#uploader_filelist li').each(function (index) {
                    num_file++;
                });
                if(num_file > 1){
                    $('#uploader_filelist li').each(function (index) {
                        $(this).find('.plupload_action_icon.ui-icon.ui-icon-circle-minus').click();
                        //$('.plupload_action_icon.ui-icon.ui-icon-circle-minus').click();//Se remuevel el último archivo
                        return false;
                    });
                }
            },
            FilesRemoved: function (up, files) {
                plupload.each(files, function (file) {
                    /*Si se elimina la plantilla de excel se bloquea el botón de generar postores*/
                    if (total_files_size > 0) {
                        total_files_size -= file.size;
                        if(total_files_size == 0){
                            //$('.save-bidders').prop('disabled', true);//Bloquear botón para generar  postores ya que no hay plantilla cargada
                        }
                    }
                });
            }
        },

        // Flash settings
        flash_swf_url: flash_swf_url,

        // Silverlight settings
        silverlight_xap_url: silverlight_xap_url
    });
    console.log("Al cargarN");
});
var current_error_log = null;
var total_files_size = 0;
var max_mb = 120;

$(document).ready(function(){
    $('#uploader_browse').prop('disabled', true);
});
