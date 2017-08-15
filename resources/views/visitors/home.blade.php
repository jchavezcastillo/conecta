<!-- <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" class="ve-animate">
<head></head>
<body> -->

	@include('visitors.master-visitors')

	<div class="container-first container-fuid" style="width: 100%;">
		@include('visitors.menu')
	</div>	
	
	<!--MOVIL-->
	<div class="container-first container" style="max-width: 700px;margin-bottom: 130px;">

		<div class="container-header" style="margin-top: 10px;">
			<img src="{{url()}}/img/header/header.jpg" style="max-width: 200px;">
		</div>

		<!--Input del nombre-->
		<div class="row" style="margin-top: 30px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-md-lg-12" style="width: auto;">
				<!--INPUT SEARCH-->
				<div class="input-group"> 
					<div class="input-group-btn"> 
						<button type="button" class="btn btn-default">Buscar por</button> 
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
							<span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> 
						</button> 
						<ul class="dropdown-menu"> 
							<li><a href="#">Nombre</a></li> 
							<li><a href="#">Empresa</a></li> 
							<li><a href="#">Filtros</a></li> 
						</ul> 
					</div> 
					<input class="form-control" aria-label="Text input with segmented button dropdown" placeholder="Escribe"> 
				</div>
				<!--FIN, INPUT SEARCH-->
			</div>

			<!--Seleccionar giros de negocio-->
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-md-lg-8" style="width: auto; margin-left:15px;">
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
					<span class="label label-info">
						<span class="glyphicon glyphicon-remove" id="basic-addon1"></span>
						Tecnología
					</span>
					<span class="label label-warning">
						<span class="glyphicon glyphicon-remove" id="basic-addon1"></span>
						Optimización de procesos
					</span>
					<span class="label label-danger">
						<span class="glyphicon glyphicon-remove" id="basic-addon1"></span>
						Publicidad
					</span>
				</div>
			</div>
		</div>

		<!--Botón buscar-->
		<div class="row" style="margin-top: 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-md-lg-12" style="width: auto;">
				<div class="btn-group"> 
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros <span class="caret"></span></button> 
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
		</div>

		<!--Mensaje de resultados-->
		<div class="alert alert-success" role="alert" style="margin-top: 10px;">Se encontraron <strong>2</strong> resultados</div>

		<!--Lista de reultados-->
		<div class="list-group">
		  <button type="button" class="list-group-item">
		  	<!--INFO-->
		  	<div class="bs-example" data-example-id="default-media"> 
		  		<!--SOCIO 1-->
		  		<div class="media"> 
		  			<div class="media-left"> 
		  				<a href="#"> 
		  					<img alt="64x64" class="media-object redondeo-img" src="http://elempresario.mx/sites/default/files/imagecache/nota_miniatura/Francisco%20Alan%C3%ADs.png" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
		  				</a> 
		  			</div> 
		  			<div class="media-body"> 
		  				<h4 class="media-heading">Juan Nuñez</h4>  
		  				 Encabezo una de las cabeceras indiscutibles del top ten del Ranking de Medios Digitales de El Economista y comScore, que mide el desempeño de sitios de contenido nacidos en internet con capital mexicano.
		  			</div> 
		  		</div>  
		  	</div> 
		  	<!--FIN INFO-->
		  </button>
		</div>

		<!--Lista de reultados-->
		<div class="list-group">
		  <button type="button" class="list-group-item">
		  	<!--INFO-->
		  	<div class="bs-example" data-example-id="default-media"> 
		  		<!--SOCIO 2-->
		  		<div class="media"> 
		  			<div class="media-left"> 
		  				<a href="#"> 
		  					<img alt="64x64" class="media-object redondeo-img" src="http://elempresario.mx/sites/default/files/imagecache/nota_miniatura/cluster%20ok.png" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
		  				</a> 
		  			</div> 
		  			<div class="media-body"> 
		  				<h4 class="media-heading">
		  					<div class="row">
		  						<div class="col-xs-4 col-sm-4 col-md-4 col-md-lg-4">
					  			Mario Casas
						  		</div>
						  		<div class="col-xs-6 col-sm-6 col-md-6 col-md-lg-6"></div>
						  		<div class="col-xs-1 col-sm-1 col-md-1 col-md-lg-1">
						  			<span class="glyphicon glyphicon-heart" id="basic-addon1"></span>
						  		</div>
						  		<div class="col-xs-1 col-sm-1 col-md-1 col-md-lg-1">
						  			<span class="glyphicon glyphicon-eye-open" id="basic-addon1"></span>
						  		</div>
		  					</div>
		  				</h4>  
		  				 Desde que estaba en la secundaria, Carlos Morales sabía que pondría un negocio de comercio electrónico enfocado a la moda. Siempre le gustó vestir con ropa de marca, pero su presupuesto no era el suficiente para costearlo por ello compraba ropa en páginas de Internet de Estados Unidos.
		  			</div> 
		  		</div>  
		  	</div>
		  	<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-md-lg-8" style="width: auto; margin-left:15px;">
					<span class="label label-default">Energético</span>
				</div>
			</div>
		</div>
		  	<!--FIN INFO-->
		  </button>
		</div>
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
	
<!-- </body>
</html> -->