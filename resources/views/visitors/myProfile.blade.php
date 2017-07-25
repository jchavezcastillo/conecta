<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" class="ve-animate">
<head></head>
<body>

	@include('visitors.master-visitors')

	<div class="container-first container-fuid" style="width: 100%;">
		@include('visitors.menu')
	</div>

	<!--MOVIL-->
	<div class="container-first container" style="max-width: 700px;margin-bottom: 130px;">

		<div class="container-header" style="margin-top: 10px;">
			<img src="{{url()}}/img/header/header.jpg" style="max-width: 200px;">
		</div>
		<br>
		<h1>git</h1>
		<!--FORMULARIO-->
		<div class="row">
		  <div style="max-width:175px; margin-left: 15px;">
		    <a href="#" class="thumbnail">
		      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVjY2JlN2FiMjUgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWNjYmU3YWIyNSI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MSIgeT0iOTQuNSI+MTcxeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="...">
		    </a>
		  </div>
		</div>
		<p><a href="#" class="btn btn-primary" role="button">Subir</a></p>
		<br>

		<div class="alert alert-info" role="alert"> Los campos obligatorios están marcados con <strong>(*)</strong> </div>
		<div class="alert alert-warning" role="alert">Nota: para que los socios te conozcan mejor te recomendamos completar el formulario.</div>
		<br>

		<label for="basic-url">(*)Nombre de usuario:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-user" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="Escribe" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">(*)Password:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-lock" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="*********" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">(*)Email:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-envelope" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="Email" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">Nombre completo:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-user" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" placeholder="Ejemplo: Juan Casas Cerdan" aria-describedby="basic-addon1">
		</div>
		<br>

		<label for="basic-url">Empresa:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-briefcase" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" placeholder="Ejemplo: SecurityOnline" aria-describedby="basic-addon1">
		</div>
		<br>

		<label for="basic-url">¿Qué te gusta hacer?:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-info-sign" id="basic-addon1"></span>
		  </span>
		  <textarea type="text" class="form-control" placeholder="Ejemplo: SecurityOnline" aria-describedby="basic-addon1"></textarea>
		</div>
		<br>

		<!--Giros de negocio-->
		<label for="basic-url">Giros de negocio:</label>
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-md-lg-4">
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccionar <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#">Energético</a></li>
						<li><a href="#">Educación</a></li>
						<li><a href="#">Reclutamiento laboral</a></li>
						<li><a href="#">Tecnología</a></li>
						<li><a href="#">Optimización de procesos</a></li>
						<li><a href="#">Publicidad</a></li>
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-md-lg-8">
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
		        <button class="btn btn-default" type="button">Agregar</button>
		      </span>
		      <input type="text" class="form-control" placeholder="Nuevo...">
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
		</div>
		<br>
		<!--Fin, giros de negocio-->

		<label for="basic-url">Descripción breve de tu negocio:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-info-sign" id="basic-addon1"></span>
		  </span>
		  <textarea type="text" class="form-control" placeholder="Escribe" aria-describedby="basic-addon1"></textarea>
		</div>
		<br>

		<label for="basic-url">¿Qué buscas en los eventos?:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-info-sign" id="basic-addon1"></span>
		  </span>
		  <textarea type="text" class="form-control" placeholder="Escribe" aria-describedby="basic-addon1"></textarea>
		</div>
		<br>

		<label for="basic-url">País:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-plane" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="Escribe" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">Ciudad:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-bed" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="Escribe" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">Página web URL:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-globe" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="Ejemplo: http://empresa.com" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">Facebook URL:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-thumbs-up" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" placeholder="Ejemplo: https://www.facebook.com/Empresa" aria-describedby="basic-addon1">
		</div>
		<br>

		<label for="basic-url">Twitter URL:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-globe" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" placeholder="Ejemplo: https://twitter.com/juancasas" aria-describedby="basic-addon1">
		</div>
		<br>

		<label for="basic-url">Teléfono:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">
		  	<span class="glyphicon glyphicon-phone" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" placeholder="LADA + número" aria-describedby="basic-addon1">
		</div>
		<br>

		<p><a href="#" class="btn btn-primary" role="button">Guardar</a></p>
		<!--FORMULARIO-->
	</div>


		<!--FOOTER-->
		@include('visitors.footer')

@push('scripts')
<!--<script src='{ {url()}}/js/lib/numeric/jquery.numeric.js'></script>
<script src='{ {url()}}/js/lib/decimal/decimal.min.js'></script>-->
<script type="text/javascript">
    //var waiting_spiner = '<img width="40" src="{ {url()}}/resources/auction_spinner.gif"> Esperando respuesta del modelo de optimización.';
    //var save_url_product = "{! ! route('admin.save.products') !!}";
</script>
/*{ ! ! Html::script('assets/jquery-1.12.4/jquery.min.js') !!}
{ ! ! Html::script('assets/bootstrap-3.3.7-dist/js/bootstrap.min.js') !!}
{ ! ! Html::script('js/admin/dashboard/configurator/ConfiguratorShow.js') !!}*/
@endpush

</body>
</html>
