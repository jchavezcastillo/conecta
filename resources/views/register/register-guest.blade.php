<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" class="ve-animate">
<head></head>
<body>

	@include('visitors.master-visitors')

	<div class="container-first container-fuid" style="width: 100%;">
		
	</div>	
	
	<!--MOVIL-->
	<div class="container-first container" style="max-width: 700px;margin-bottom: 130px;">

		<div class="container-header" style="margin-top: 10px;">
			<img src="{{url()}}/img/header/header.jpg" style="max-width: 200px;">
		</div>
		<br>

		<!--FORMULARIO-->
		<div class="alert alert-info" role="alert"> Los campos obligatorios están marcados con <strong>(*)</strong> </div>
		<div class="alert alert-warning" role="alert">Registra tus datos para confirmar tu asistencia a la junta iberoamericana.</div>
		<br>		

		<label for="basic-url">(*)Email:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-envelope" id="basic-addon1"></span>
		  </span>
		  <input type="text" class="form-control" id="basic-url" placeholder="Email" aria-describedby="basic-addon3">
		</div>
		<br>

		<label for="basic-url">(*)Password:</label>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon3">
		  	 <span class="glyphicon glyphicon-lock" id="basic-addon1"></span>
		  </span>
		  <input type="password" class="form-control" id="basic-url" placeholder="*********" aria-describedby="basic-addon3">
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

		<div class="input-group">
	      <span class="">
	        <input type="checkbox" aria-label="...">
	      </span>
	      <a href="#">Aceptar términos y condiciones.</a>
	    </div><!-- /input-group -->
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