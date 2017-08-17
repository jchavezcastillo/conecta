@extends('visitors.master-visitors')

@section('cssParticular')
   <link rel="stylesheet" type="text/css" href="{{url()}}/assets/jquery-ui/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="{{url()}}/assets/jquery-ui/jquery-ui.theme.css">
   <link rel="stylesheet" type="text/css" href="{{url()}}/assets/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css">
   <link rel="stylesheet" href="{{url()}}/css/bootstrap-select.min.css">
@stop

@section('content')
   <!--Movil-->
   <div class="container-first container" style="max-width: 700px;margin-bottom: 130px;">
      <div class="container-header" style="margin-top: 10px;">
         <img src="{{url()}}/img/header/header.jpg" style="max-width: 200px;">
      </div><br>
      <!--Formulario-->
      <div class="row">
         <div style="max-width:175px; margin-left: 15px;">
            <a class="thumbnail edit-img">
               <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVjY2JlN2FiMjUgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWNjYmU3YWIyNSI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MSIgeT0iOTQuNSI+MTcxeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
            </a>
         </div>
      </div>

      <p><a class="btn btn-primary" role="button"><span class="edit-img">Subir</span></a></p><br>
      <div class="alert alert-info" role="alert"> Los campos obligatorios están marcados con <strong>(*)</strong> </div>
      <div class="alert alert-warning" role="alert">Nota: para que los socios te conozcan mejor te recomendamos completar el formulario.</div><br>
      
      <label for="user-name-partner">(*)Nombre de usuario:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon3">
            <span class="glyphicon glyphicon-user" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="user-name-partner" placeholder="Escribe" aria-describedby="basic-addon3">
      </div><br>
      
      <label for="password-partner">(*)Password:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon3">
            <span class="glyphicon glyphicon-lock" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="password-partner" placeholder="*********" aria-describedby="basic-addon3">
      </div><br>

      <label for="email-partner">(*)Email:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon3">
            <span class="glyphicon glyphicon-envelope" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="email-partner" placeholder="Email" aria-describedby="basic-addon3">
      </div><br>

      <label for="name-partner">Nombre completo:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-user" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="name-partner" placeholder="Ejemplo: Juan Casas Cerdan" aria-describedby="basic-addon1">
      </div><br>

      <label for="business">Empresa:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-briefcase" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="business" placeholder="Ejemplo: SecurityOnline" aria-describedby="basic-addon1">
      </div><br>

      <label for="you-like">¿Qué te gusta hacer?:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-info-sign" id="basic-addon1"></span>
         </span>
         <textarea type="text" class="form-control" id="you-like" placeholder="Ejemplo: SecurityOnline" aria-describedby="basic-addon1"></textarea>
      </div><br>

      <!--Giros de negocio-->
      <label for="basic-url">Giros de negocio:</label>
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
               <select id="lunch" class="selectpicker" data-live-search="true" title="Please select a lunch ...">
                  @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                  @endforeach
               </select>
            </div>
         </div>
   
         <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="panel panel-default">
               <div class="panel-body">
                  <span class="label label-default">
                     <span class="glyphicon glyphicon-remove" id="basic-addon1"></span>
                     Energético
                  </span>
                  <span class="label label-primary">
                     <span class="glyphicon glyphicon-remove" id="basic-addon1"></span>
                     Educación
                  </span>
                  <span class="label label-success">
                     <span class="glyphicon glyphicon-remove" id="basic-addon1"></span>
                     Reclutamiento laboral
                  </span>
               </div>
            </div>
            <label for="basic-url">Otros:</label>
            <div class="input-group">
               <span class="input-group-btn">
                 <button class="btn btn-default" type="button" id="addCategory">Agregar</button>
               </span>
               <input id="newCategory" type="text" class="form-control" placeholder="Nuevo..." required="true">              
            </div><!-- /input-group -->
         </div><!-- /.col-lg-6 -->
      </div><br>
      <!--Fin, giros de negocio-->

      <label for="basic-url">Descripción breve de tu negocio:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-info-sign" id="basic-addon1"></span>
         </span>
         <textarea type="text" class="form-control" placeholder="Escribe" aria-describedby="basic-addon1"></textarea>
      </div><br>

      <label for="basic-url">¿Qué buscas en los eventos?:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-info-sign" id="basic-addon1"></span>
         </span>
         <textarea type="text" class="form-control" placeholder="Escribe" aria-describedby="basic-addon1"></textarea>
      </div><br>

      <label for="basic-url">País:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon3">
            <span class="glyphicon glyphicon-plane" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="basic-url" placeholder="Escribe" aria-describedby="basic-addon3">
      </div><br>

      <label for="basic-url">Ciudad:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon3">
            <span class="glyphicon glyphicon-bed" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="basic-url" placeholder="Escribe" aria-describedby="basic-addon3">
      </div><br>

      <label for="basic-url">Página web URL:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon3">
            <span class="glyphicon glyphicon-globe" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" id="basic-url" placeholder="Ejemplo: http://empresa.com" aria-describedby="basic-addon3">
      </div><br>

      <label for="basic-url">Facebook URL:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-thumbs-up" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" placeholder="Ejemplo: https://www.facebook.com/Empresa" aria-describedby="basic-addon1">
      </div><br>

      <label for="basic-url">Twitter URL:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-globe" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" placeholder="Ejemplo: https://twitter.com/juancasas" aria-describedby="basic-addon1">
      </div><br>

      <label for="basic-url">Teléfono:</label>
      <div class="input-group">
         <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-phone" id="basic-addon1"></span>
         </span>
         <input type="text" class="form-control" placeholder="LADA + número" aria-describedby="basic-addon1">
      </div><br>

      <p><a id="addParther" class="btn btn-primary" role="button">Guardar</a></p>
      <!--Fin, Formulario-->
   </div>

   <!--Modal para subir imagen-->
   <div class="row">
      <div class="col-xs-12">
         <div id="modal-upload-img" class="modal fade " tabindex="-1">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button class="close" type="button" data-dismiss="modal">
                        ×
                     </button>
                     <h4 id="myModalLabel" class="modal-title">Subes la imagen de producto</h4>
                     <div id="uploader">
                          <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
@stop

@section('jsParticular')
   <script src="{{url()}}/assets/jquery-ui/jquery-ui.js"></script>
   <script src="{{url()}}/assets/plupload/js/plupload.full.min.js"></script>
   <script src="{{url()}}/assets/plupload/js/jquery.ui.plupload/jquery.ui.plupload.min.js"></script>
   <script src="{{url()}}/assets/plupload/js/i18n/es.js"></script>
   <script src="{{url()}}/js/upload.js"></script>
   <script src="{{url()}}/js/openmodal.js"></script>
   <script src="{{url()}}/js/bootstrap-select.min.js"></script>
   <script type="text/javascript">
      var upload_url = "{{ route('register.partner') }}";
      var create_category = "{{ route('category.create') }}";
      var flash_swf_url = "{{ url('/assets/plupload/js/Moxie.swf') }}";
      var silverlight_xap_url = "{{ url('/assets/plupload/Moxie.xap') }}";
   </script>
   <script type="text/javascript">
      $(document).on('click','#addParther',function(){
         var _data ={
               nombre: $('#nombre').val(),
               cargo: $('#cargo').val(),
               email: $('#email').val(),
               mision: $('#mision').val(),
               valores: $('#valores').val()
            }
         $.ajax({
            url: upload_url,
            type: "post",
            data: _data,
            dataType: 'json',
            success: function (response) {
               if(response.success){
                  alert("Se guardó con éxito");
                  $('#modal-mision-vision').modal('hide');
               }else{
                  alert("No se pudo guardar");
               }
            },
            error: function (response) {
            
            }
         });
      });

      $(document).on('click','#addCategory',function(){
         if($('#newCategory').val()==="")
            return alert("Campo vacío.");
         var _data ={
            name: $('#newCategory').val()
         }

         $.ajax({
            url: create_category,
            type: "post",
            data: _data,
            dataType: 'json',
            success: function (response) {
               if(response.success){
                  alert("Se guardó con éxito");
               }else{
                  alert("No se pudo guardar");
               }
            },
            error: function (response) {
            
            }
         });
      });
   </script>
@stop