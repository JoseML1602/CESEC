<?php
	session_start();
	if(!isset($_SESSION['cesec'])){
		//header('Location: ./cesec.php'); QUITAR UNA VEZ EXISTAN DATOS EN LA TABLA VENTAS
	}
	$arreglo = $_SESSION['cesec'];

 ?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/aos.css">
  	<meta http-equiv="x-ua-compatible" content="ie-edge">
		<title>(CESEC) - Centro Especializado en Soluciones en Equipos de Cómputo</title>
		<link rel="stylesheet" href="./css/subpagcheckout.css">
	</head>
	<body>
		 <script src="https://www.paypal.com/sdk/js?client-id=AVCSw2kklLJ2nOMrhbKRlocu7OcByjt0DQvfsAD9OB9sHpwAF3mSd0_huRL-aUnhC6YqNNlO7Mek6N_T&currency=MXN"></script>
		<div class="contenedor">
			<header class="header">
				<div class="logo">
					<p class="iniciales-logo">CESEC</p>
					<h1><b>CENTRO ESPECIALIZADO EN SOLUCIONES EN EQUIPOS DE CÓMPUTO</b></h1>
				</div>
				<nav class="menu">
					<a href="CESEC.php">Inicio</a>
					<a href="cursos.php">Cursos</a>
					<a href="blogs.php">Blogs</a>
					<a href="#footer">Contáctanos</a>
					<a href="login.php">Log in</a>
					<a href="cart.php">&#128722;</a>
				</nav>
			</header>

			<main class="contenido">

				<div class="site-wrap">
			 	<?php include("./layouts/footer.php"); ?>
					<form action="./pago.php" method="post">
					<div class="site-section">
						<div class="container">
							<div class="row">
								<div class="col-md-6 mb-5 mb-md-0">
									<center>
									<h2 class="h3 mb-3 text-light">Detalles</h2>
									<div class="p-3 p-lg-5 border">
										<div class="form-group">
											<label for="c_country" class="text-light">País <span class="text-danger">*</span></label>
											<select id="c_country" class="form-control" name="country">
												<option value="1">Selecciona tu país</option>
												<option value="2">Argentina</option>
												<option value="3">Belice</option>
												<option value="4">Costa Rica</option>
												<option value="5">El Salvador</option>
												<option value="6">Guatemala</option>
												<option value="7">Honduras</option>
												<option value="8">México</option>
												<option value="9">Nicaragua</option>
											</select>
										</div>
										<div class="form-group row">
											<div class="col-md-6">
												<label for="c_fname" class="text-light">Nombres<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_fname" name="c_fname">
											</div>
											<div class="col-md-6">
												<label for="c_lname" class="text-light">Apellidos<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_lname" name="c_lname">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-md-12">
												<label for="c_address" class="text-light">Domicilio<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_address" name="c_address" placeholder="Calle">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-md-6">
												<label for="c_state_country" class="text-light">Estado<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_state_country" name="c_state_country">
											</div>
											<div class="col-md-6">
												<label for="c_postal_zip" class="text-light">Código postal<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
											</div>
										</div>

										<div class="form-group row mb-5">
											<div class="col-md-6">
												<label for="c_email_address" class="text-light">Correo electrónico<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_email_address" name="c_email_address">
											</div>
											<div class="col-md-6">
												<label for="c_phone" class="text-light">Teléfono<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
											</div>
										</div>

										<div class="form-group">
											<label for="c_create_account" class="text-light" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account">Ingrese una contraseña</label>
											<div class="collapse" id="create_an_account">
												<div class="py-2">
													<p class="mb-3 text-light">De acuerdo al correo electrónico proporcionado y con la contraseña, podrá iniciar sesión la próxima vez que lo desee.</p>
													<div class="form-group">
														<label for="c_account_password" class="text-light">Ingrese contraseña</label>
														<input type="password" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
													</div>
												</div>
											</div>
										</div>

									</div>
								</center>
								</div>
								<div class="col-md-6">

									<div class="row mb-5 text-align-center">
										<div class="col-md-12">
											<center>
											<h2 class="h3 mb-3 text-light">Su Orden</h2>
											<div class="p-3 p-lg-5 border">
												<table class="table site-block-order-table mb-5">
													<thead>
														<th class="text-light">Producto:</th>
														<th class="text-light">Total</th>
													</thead>
													<tbody>
														<?php
														$iva= 0.16;
														$subtotal =0;
														$totalsi= 0;
														$total= 0;
															for($i=0;$i<count($arreglo);$i++){
																$subtotal= $subtotal +($arreglo[$i]['Precio']);
																$totalsi= $subtotal * $iva;
																$total= $totalsi + $subtotal;

														 ?>
														<tr>
															<td class="text-light"><?php echo $arreglo[$i]['Nombre'];?></td>
															<td class="text-light">$<?php echo $arreglo[$i]['Precio'];?></td>
														</tr>

													<?php
															}
													 ?>

													 <tr>
														 <td class="text-light"><strong>Subtotal</strong></td>
														 <td class="text-light"><strong>$<?php echo number_format($subtotal, 2, '.', '');?></strong></td>
													 </tr>

													 <tr>
														 <td class="text-light"><strong>Total</strong></td>
														 <td class="text-light"><strong>$<?php echo number_format($total, 2, '.', '');?></strong></td>
													 </tr>

													</tbody>
												</table>

												<div class="border p-3 mb-3">

												<div class="border p-3 mb-5">
													<h3 class="h5 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

													<div class="collapse" id="collapsepaypal">
														<div class="py-2">
															<p class="mb-0 text-light">Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Sus cursos no estarán disponibles hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
														</div>
														 <div id="paypal-button-container"></div>
													</div>
												</div>

												<div class="form-group">
													<button class="btn btn-dark btn-lg py-3 btn-block" type="submit">Terminar</button>
												</div>

											</div>
										</center>
										</div>
									</div>

								</div>

							</div>
							<!-- </form> -->
						</div>
					</div>
				</form>
					<?php include("./layouts/footer.php"); ?>

				</div>
			</main>

			<footer><a name="footer">
	       <div class="container-footer-all">
	            <div class="container-body">
	                <div class="colum1">
	                    <h1>Más información de la empresa</h1>
	                    <p>El centro especializado en soluciones en equipos de cómputo nace el 20 de septiembre de 2008 en la
												ciudad de Villahermosa, Tabasco, teniendo un gran impacto en la ciudad en el segundo año después de
												su creación; es una empresa privada que ofrece servicios como: Mantenimiento preventivo y correctivo
												en equipos de cómputo y dispositivos celulares y soporte técnico a distancia y presencial, ofreciendo
												a cada uno de nuestros clientes calidad y compromiso. Las instalaciones se encuentran ubicadas en el
												municipio de Centro y Cárdenas del estado ya mencionado, disco lugar cuenta con las herramientas adecuadas
											  para las soluciones a cada uno de los problemas que presenten nuestros clientes.</p>
	                </div>
	                <div class="colum2">
	                    <h1>Redes Sociales</h1>

	                    <div class="row">
	                        <a href="https://www.facebook.com/"><img src="img/facebook.png"></a>
	                        <label>Síguenos en <strong><a href="https://www.facebook.com/">Facebook</a></strong></label>
	                    </div>
	                    <div class="row">
	                        <a href="https://twitter.com/?lang=es"><img src="img/twitter.png"></a>
	                        <label>Síguenos en <strong><a href="https://twitter.com/?lang=es">Twitter</a></strong></label>
	                    </div>
	                    <div class="row">
	                        <a href="https://www.instagram.com/?hl=es-la"><img src="img/instagram.png"></a>
	                        <label>Síguenos en <strong><a href="https://www.instagram.com/?hl=es-la">Instagram</a></strong></label>
	                    </div>
	                    <div class="row">
	                        <a href="https://www.google.com.mx/?hl=es-419"><img src="img/google-plus.png"></a>
	                        <label>Síguenos en <strong><a href="https://www.google.com.mx/?hl=es-419">Google Plus</a></strong></label>
	                    </div>
	                    <div class="row">
	                        <a href="https://www.pinterest.com.mx/"><img src="img/pinterest.png"></a>
	                        <label>Síguenos en <strong><a href="https://www.pinterest.com.mx/">Pinteres</a></strong></label>
	                    </div>
	                </div>
	                <div class="colum3">
	                    <h1>Informacion Contactos</h1>
	                    <div class="row2">
	                        <img src="img/house.png">
	                        <label>Villahermosa, Tabasco, Av. Gregorio Méndez Magaña #1127</label>
	                    </div>
	                    <div class="row2">
	                        <img src="img/smartphone.png">
	                        <label>+529933058032</label>
	                    </div>
	                    <div class="row2">
	                        <img src="img/contact.png">
	                         <label>Cesec1602@gmail.com</label>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="container-footer">
	               <div class="footer">
	                    <div class="copyright">
	                        © 2021 Todos los Derechos Reservados | <a href="conocenos.html">CESEC</a>
	                    </div>
	                    <div class="information">
	                        <a href="conocenos.php">Informacion Compañia</a> | <a>Privacion y Politica</a> | <a>Terminos y Condiciones</a>
	                    </div>
	                </div>
	            </div>
	   </a></footer>

		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/aos.js"></script>
		<script src="js/main.js"></script>

		<script>
		      paypal.Buttons({

		        // Sets up the transaction when a payment button is clicked
		        createOrder: function(data, actions) {
		          return actions.order.create({
		            purchase_units: [{
		              amount: {
		                value: '1290' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
		              }
		            }]
		          });
		        },

		        // Finalize the transaction after payer approval
		        onApprove: function(data, actions) {
		          return actions.order.capture().then(function(orderData) {
		            // Successful capture! For dev/demo purposes:
		                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
		                var transaction = orderData.purchase_units[0].payments.captures[0];
		                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

		            // When ready to go live, remove the alert and show a success message within this page. For example:
		            // var element = document.getElementById('paypal-button-container');
		            // element.innerHTML = '';
		            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
		            // Or go to another URL:  actions.redirect('thank_you.html');
		          });
		        }
		      }).render('#paypal-button-container');

		    </script>
	</body>
</html>
