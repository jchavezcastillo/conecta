
	var id_prod = 0;
	var type=0;
	var category_id = 0;//Identificador para saber en que categoría están los productos que se están mostrando

	$(document).ready(function(){
		category_id = $('.category_id').val();
	});

	/*Se edita un producto de la lista*/
	$(document).on('click','.edit-prod',function() {
	   type=2;
	   $('#myModalLabel').text("Modifica los datos que necesites");
	   $('#inputName').show();
	   $('#inputPrecio').show();
	   $('#inputCategory').show();
	   $('#inputUrl').show();
	   $('.lab').show();
	   $('#modificar').show();
	   $('#cancelar').hide();
	   /*Se actualiza el texto dle botón*/
	   $('#modificar').text("Modificar");
	   $('#modal1').modal({backdrop: 'static', keyboard: true});
	   id_prod = $(this).attr('id');
	   //se guardan los valores de los campos ocultos
	   var nombre= $('.name-' + id_prod).val();
	   var description= $('.desc-' + id_prod).val();
	   var price= $('.price-' + id_prod).val();
	   var category= $('.cate-' + id_prod).val();
	   var url_img= $('.url-' + id_prod).val();
	   //se guardan los valores obtenidos(linea 10-14) y se muestran en el modal
	   $('#inputName').val(nombre);
	   $('#inputDescription').val(description);
	   $('#inputPrecio').val(price);
	   $('#inputCategory').val(category);
	   $('#inputUrl').val(url_img);
	});

	/*Se agrega la imagen del producto*/
	$(document).on('click','.edit-img', function() {
		console.log("Se ejecuta");
		id_prod = $(this).attr('id');
		$('#modal-upload-img').modal({backdrop: 'static', keyboard: true});
	});

	/*Se agrega un nuevo producto*/
	$(document).on('click','.add-prod',function() {
		type=1;
		$('#myModalLabel').text("Inserta los datos del producto");
		$('#inputName').show();
	  	$('#inputPrecio').show();
	    $('#inputCategory').show();
	    $('#inputUrl').show();
	    $('.lab').show();
	    $('#modificar').show();
	    $('#cancelar').hide();
	    /*Se actualiza el texto dle botón*/
		$('#modificar').text("Añadir");
		$('#modal1').modal({backdrop: 'static', keyboard: true});
		id_prod = $(this).attr('id');
	});

	/*Borrar producto*/
	$(document).on('click','.del-prod',function() {
	   type=3;
	   $('#myModalLabel').text("Seguro que deseas borrar este producto");
	   $('#inputPrecio').hide();
	   $('#inputCategory').hide();
	   $('#inputUrl').hide();
	   $('.lab').hide();

	   $('#inputName').show();
	   $('#lab1').show();
	   $('#modificar').show();
	   $('#cancelar').show();

	   $('#cancelar').text("cancelar");
	   $('#modificar').text("Borrar");
	   $('#modal1').modal({backdrop: 'static', keyboard: true});

	   id_prod = $(this).attr('id');
	   //se guardan los valores de los campos ocultos
	   var nombre= $('.name-' + id_prod).val();
	   var description= $('.desc-' + id_prod).val();
	   var price= $('.price-' + id_prod).val();
	   var category= $('.cate-' + id_prod).val();
	   var url_img= $('.url-' + id_prod).val();
	   //se guardan los valores obtenidos(linea 10-14) y se muestran en el modal
	   $('#inputName').val(nombre);
	   $('#inputDescription').val(description);
	   $('#inputPrecio').val(price);
	   $('#inputCategory').val(category);
	   $('#inputUrl').val(url_img);
	});

	/*Ver detalles del proyecto*/
	$(document).on('click','.ver-prod',function(){

	   $('#myModalLabel').text("Informacion detallada");
	   $('#modal1').modal({backdrop: 'static', keyboard: true});
	   id_prod = $(this).attr('id');
	   //se guardan los valores de los campos ocultos
	   var nombre= $('.name-' + id_prod).val();
	   var description= $('.desc-' + id_prod).val();
	   var price= $('.price-' + id_prod).val();
	   var category= $('.cate-' + id_prod).val();
	   var url_img= $('.url-' + id_prod).val();
	   //se guardan los valores obtenidos(linea 10-14) y se muestran en el modal
	   $('#inputName').show();
	   $('#inputPrecio').hide();
	   $('#inputCategory').hide();
	   $('#inputUrl').hide();
	   $('.lab').hide();
	   $('#lab1').show();
	   $('#modificar').hide();
	   $('#cancelar').hide();

	   $('#inputName').val(nombre);
	   $('#inputDescription').val(description);
	   $('#inputPrecio').val(price);
	   $('#inputCategory').val(category);
	   $('#inputUrl').val(url_img);
	   $('#modificar').hide();
	});

	/*Se manda a llamar el modal para enviar una solicitud de compra*/
	$(document).on('click','.modal-send-mail',function(){
	   $('#modal-send-email').modal({backdrop: 'static', keyboard: true});
	   id_prod = $(this).data('send');//jhonatan

	});

	/*Cancelar borrado de producto*/
	$(document).on('click','#cancelar',function(){
		$('#modal1').modal('hide');
	});


	/*Actualizar producto*/
	$(document).on('click','#modificar',function() {

		switch(type){
			case 1://Se crea un nuevo producto
				var inputName = $('#inputName').val();
				var inputDescription = $('#inputDescription').val();
				var inputPrecio = $('#inputPrecio').val();
				var inputCategory = $('#inputCategory').val();
				var inputUrl = $('#inputUrl').val();//Esto es unidad disponible
				//arreglo que lleva los datos de la peticion para agregar el registro
				var _data={
					'id':id_prod,
					'name':inputName,
					'description':inputDescription,
					'price':inputPrecio,
					'category_id':category_id,
					'url_img': inputUrl
				};

				$.ajax({
					url: url_upd_p_create,
					type: "post",
					data: _data,
					dataType: 'json',
					success: function (response) {

						if(response.success){

							$('#container-prod').prepend('<div class="col-xs-12 col-sm-12 col-md-4 col-md-lg-4" id="product-card-'+ response.producto.id +'">\
															<input type="text" style="display:none;" class="name-'+ response.producto.id +'" value="'+ response.producto.name +'">\
															<input type="text" style="display:none;" class="desc-'+ response.producto.id +'" value="'+ response.producto.description +'">\
															<input type="text" style="display:none;" class="price-'+ response.producto.id +'" value="'+ response.producto.price +'">\
															<input type="text" style="display:none;" class="cate-'+ response.producto.id +'" value="'+ response.producto.category_id +'">\
															<input type="text" style="display:none;" class="url-'+ response.producto.id +'" value="'+ response.producto.url_img +'">\
															<div class="thumbnail">\
																<img id="img-prod-'+ response.producto.id +'" alt="100%x200" style="height: 200px; width: 100%; display: block;" src="'+ response.producto.url_img +'">\
																<a style="float: right;padding: 10px;" id="'+ response.producto.id +'" class="ver-prod"><span class="glyphicon glyphicon-eye-open"></span></a>\
																<a style="float: right;padding: 10px;" id="'+ response.producto.id +'" class="edit-img" ><span class="glyphicon glyphicon-picture"></span></a>\
																<a style="float: right;padding: 10px;" id="'+ response.producto.id +'" class="edit-prod" ><span class="glyphicon glyphicon-pencil"></span></a>\
																<a style="float: right;padding: 10px;" id="'+ response.producto.id +'" class="del-prod" ><span class="glyphicon glyphicon-trash"></span></a>\
																<div class="caption"> \
																	<h3 id="nombre-prod-'+ response.producto.id +'" style="overflow:hidden; height:26px;">'+ response.producto.name +'</h3> \
																	<p id="descripcion-prod-'+ response.producto.id +'" style="overflow:hidden; height:20px;"class="desc">'+ response.producto.description +'</p>\
																	<p id="precio-prod-'+ response.producto.id +'"> Precio:'+ response.producto.price +'</p>\
																	<p id="unit-prod-'+ response.producto.id +'">Unidades disponibles: '+ response.producto.unit_prod +'</p>\
																</div> \
															</div> \
														</div>');
									//<p><a href="#" class="btn btn-primary" role="button">Solicitud de compra</a></p> \
							alert("Inserción exitosa");
							$('#modal1').modal('hide');
						}else{
							alert("Insercion Fallida");
						}
					},
					error: function (response) {
					}
				});

				//se obtienen los valores de los campos del modal una vez que fueron llenados con la funcion de arriba

				//se actualiza el valor de los campos ocultos en la tarjeta del producto usando las variables de arriba
				$('.name-' + id_prod).val(inputName);//campo oculto
				$('.desc-' + id_prod).val(inputDescription);//campo oculto
				$('.price-' + id_prod).val(inputPrecio);//campo oculto
				$('.cate-' + id_prod).val(inputCategory);//campo oculto
				$('.url-' + id_prod).val(inputUrl);//campo oculto

				//se actualiza el valor de los campos de la tarjeta del producto con valores del modal
				$('#nombre-prod-' + id_prod).text(inputName);//Actualizar la etiqueta del producto
				$('#descripcion-prod-' + id_prod).text(inputDescription);//Actualizar la etiqueta del producto
				$('#precio-prod-' + id_prod).text('Precio: ' + inputPrecio);//Actualizar la etiqueta del producto
				$('#unit-prod-' + id_prod).text('Unidades disponibles: ' + inputUrl);//Actualizar la etiqueta del producto
			break;

			case 2://Se actuaiza un producto

				var inputName = $('#inputName').val();
				var inputDescription = $('#inputDescription').val();
				var inputPrecio = $('#inputPrecio').val();
				var inputCategory = $('#inputCategory').val();
				var inputUrl = $('#inputUrl').val();

				//arreglo que lleva los datos de la peticion para actualizar el registro
				var _data={
					'id':id_prod,
					'name':inputName,
					'description':inputDescription,
					'price':inputPrecio,
					'category_id':category_id,
					'url_img': inputUrl,
				};

				$.ajax({
					url: url_upd_p_update,
					type: "post",
					data: _data,
					dataType: 'json',
					success: function (response) {
						if(response.success){
							alert("Modificacion exitosa");
							$('#modal1').modal('hide');
						}else{
							alert("Modificacion Fallida");
						}
					},
					error: function (response) {
					}
				});
				//se obtienen los valores de los campos del modal una vez que fueron llenados con la funcion de arriba

				//se actualiza el valor de los campos ocultos en la tarjeta del producto usando las variables de arriba
				$('.name-' + id_prod).val(inputName);//campo oculto
				$('.desc-' + id_prod).val(inputDescription);//campo oculto
				$('.price-' + id_prod).val(inputPrecio);//campo oculto
				$('.cate-' + id_prod).val(inputCategory);//campo oculto
				$('.url-' + id_prod).val(inputUrl);//campo oculto

				//se actualiza el valor de los campos de la tarjeta del producto con valores del modal
				$('#nombre-prod-' + id_prod).text(inputName);//Actualizar la etiqueta del producto
				$('#descripcion-prod-' + id_prod).text(inputDescription);//Actualizar la etiqueta del producto
				$('#precio-prod-' + id_prod).text('Precio: ' + inputPrecio);//Actualizar la etiqueta del producto
				$('#unit-prod-' + id_prod).text('Unidades disponibles: ' + inputUrl);//Actualizar la etiqueta del producto
				break;

				case 3://Borrar producto

				var inputName = $('#inputName').val();
				var inputDescription = $('#inputDescription').val();
				var inputPrecio = $('#inputPrecio').val();
				var inputCategory = $('#inputCategory').val();
				var inputUrl = $('#inputUrl').val();

				//arreglo que lleva los datos de la peticion para actualizar el registro
				var _data={
					'id':id_prod,
					'name':inputName,
					'description':inputDescription,
					'price':inputPrecio,
					'category_id':category_id,
					'url_img': inputUrl,
				};

				$.ajax({
					url: url_upd_p_destroy,
					type: "post",
					data: _data,
					dataType: 'json',
					success: function (response) {
						if(response.success){
							$('#product-card-' + id_prod).remove();
							alert("Borrado exitoso");
							$('#modal1').modal('hide');
						}else{
							alert("Borrado Fallido");
						}
					},
					error: function (response) {
					}
				});
				//se obtienen los valores de los campos del modal una vez que fueron llenados con la funcion de arriba

				//se actualiza el valor de los campos ocultos en la tarjeta del producto usando las variables de arriba
				$('.name-' + id_prod).val(inputName);//campo oculto
				$('.desc-' + id_prod).val(inputDescription);//campo oculto
				$('.price-' + id_prod).val(inputPrecio);//campo oculto
				$('.cate-' + id_prod).val(inputCategory);//campo oculto
				$('.url-' + id_prod).val(inputUrl);//campo oculto

				//se actualiza el valor de los campos de la tarjeta del producto con valores del modal
				$('#nombre-prod-' + id_prod).text(inputName);//Actualizar la etiqueta del producto
				$('#descripcion-prod-' + id_prod).text(inputDescription);//Actualizar la etiqueta del producto
				$('#precio-prod-' + id_prod).text('Precio: ' + inputPrecio);//Actualizar la etiqueta del producto
				$('#unit-prod-' + id_prod).text('Unidades disponibles: ' + inputUrl);//Actualizar la etiqueta del producto
				break;
			}

		});

		$(document).on('click','#sendEmail',function() {

				var inputName = $('#inputName').val();
				var inputDescription = $('#inputDescription').val();
				var inputPrecio = $('#inputPrecio').val();
				var inputCategory = $('#inputCategory').val();
				var inputUrl = $('#inputUrl').val();
				/*Producto*/
				var name_product = $('#name-' + id_prod + '.name-' + id_prod).val();
				var price_product = $('#input-price-' + id_prod).val();
				var img_product = $('#img-prod-' + id_prod).attr('src');

				//arreglo que lleva los datos de la peticion para actualizar el registro
				var _data={
					'name':inputName,
					'description':inputDescription,
					'price':inputPrecio,
					'category_id':category_id,
					'url_img': inputUrl,
					'name_product':name_product,
					'price_product':price_product,
					'img_product':img_product
				};

				$.ajax({
					url: url_send_email,
					type: "post",
					data: _data,
					dataType: 'json',
					success: function (response) {
						if(response.success){
							$('#product-card-' + id_prod).remove();
							alert(response.msg);
							$('#modal1').modal('hide');
						}else{
							alert("Borrado Fallido");
						}
					},
					error: function (response) {
					}
			});
		});
