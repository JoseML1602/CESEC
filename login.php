<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie-edge">
		<title>(CESEC) - Centro Especializado en Soluciones en Equipos de Cómputo</title>
		<!-- Font Awesome -->

		<!-- icheck bootstrap -->

		<!-- Theme style -->
		<link rel="stylesheet" href="./admin/dashboard/dist/css/adminlte.min.css">

		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="contenedor">
			<header class="header">
				<div class="logo">
					<p class="iniciales-logo">CESEC</p>
					<h1>CENTRO ESPECIALIZADO EN SOLUCIONES EN EQUIPOS DE CÓMPUTO</h1>
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

<section class="mr-8">
			<main class="contenido">


				  <div class="login-logo">

				  </div>
				  <!-- /.login-logo -->

				    <div class="card-body login-card-body" >
				      <p class="login-box-msg">INICIE SESIÓN</p>

				      <form action="./check.php" method="post">
				        <div class="input-group mb-4">
				          <input type="email" class="form-control" placeholder="Email" name="email">
				          <div class="input-group-append">
				            <div class="input-group-text">
				              <span class="fas fa-envelope"></span>
				            </div>
				          </div>
				        </div>
				        <div class="input-group mb-3">
				          <input type="password" class="form-control" placeholder="Password" name="password">
				          <div class="input-group-append">
				            <div class="input-group-text">
				              <span class="fas fa-lock"></span>
				            </div>
				          </div>
				        </div>
				        <div class="row">
				          <div class="col-6">
				            <div class="icheck-dark">
				              <input type="checkbox" id="remember">
				              <label for="remember">
				                Recordar
				              </label>
				            </div>
				          </div>



				          <!-- /.col -->
				          <div class="col-5">
				            <button type="submit" class="btn btn-dark btn-block">Iniciar</button>
				          </div>

				          <!-- /.col -->
									<br><br><br>
									<?php
									if(isset($_GET['error'])){
										echo '<div class="alert	alert-danger case col-12">'.$_GET['error'].'</div>';
									}
									 	?>
								</div>
				      </form>

							<p class="mb-3">
								<center>
								<a href="checkout.php">Registrar usuario</a>
							</center>
							</p>
							<p class="mb-3">
								<center>
								<a href="index.php">Olvidé mis datos</a>
							</center>
							</p>
</div>



			</main>
</section>
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
	   </a></footer>

		<!-- jQuery -->
		<script src="./admin/dashboard/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="./admin/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="./admin/dashboard/dist/js/adminlte.min.js"></script>
	</body>
</html>
