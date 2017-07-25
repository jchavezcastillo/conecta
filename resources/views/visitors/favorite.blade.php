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

		<!--Mensaje de resultados-->
		<div class="alert alert-warning" role="alert" style="margin-top: 10px;">Socios marcados como favoritos <strong>2</strong> resultados</div>

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
		  				<h4 class="media-heading">Mario Casas</h4>  
		  				 Desde que estaba en la secundaria, Carlos Morales sabía que pondría un negocio de comercio electrónico enfocado a la moda. Siempre le gustó vestir con ropa de marca, pero su presupuesto no era el suficiente para costearlo por ello compraba ropa en páginas de Internet de Estados Unidos.
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
	
</body>
</html>