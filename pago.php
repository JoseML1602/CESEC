<?php
	session_start();
	include './conexion.php';
	if(!isset($_SESSION['cesec'])){
		//header('Location: ./cesec.php'); QUITAR UNA VEZ EXISTAN DATOS EN LA TABLA VENTAS
	}
	$arreglo = $_SESSION['cesec'];
	$iva= 0.16;
	$subtotal =0;
	$totalsi= 0;
	$total= 0;
	for($i=0; $i<count($arreglo);$i++){
		$subtotal= $subtotal +($arreglo[$i]['Precio']);
		$totalsi= $subtotal * $iva;
		$total= $totalsi + $subtotal;
	}
	$password="";
	if(isset($_POST['c_account_password'])){
		if($_POST['c_account_password']!=""){
			$password = $_POST['c_account_password'];
		}
	}
	$conexion->query("insert into usuario (nombre,telefono,email,password,img_perfil,nivel)
	values(
			'".$_POST['c_fname']." ".$_POST['c_lname']."',
			'".$_POST['c_phone']."',
			'".$_POST['c_email_address']."',
			'".sha1($password)."',
			'default.jpg',
			'cliente'
		)
	")or die($conexion->error);
	$id_usuario = $conexion->insert_id;

	$fecha= date('Y-m-d h:m:s');
	$conexion->query("insert into ventas (id_usuario,total,fecha) values($id_usuario,$total,'$fecha')")or die($conexion->error);
	$id_venta = $conexion->insert_id;

	for($i=0; $i<count($arreglo);$i++){
		$conexion->query("insert into cursos_venta (id_venta,id_curso,precio)
		values(
					$id_venta,
					".$arreglo[$i]['Id'].",
					".$arreglo[$i]['Precio']."
					)")or die($conexion->error);
	}

	$conexion->query("insert into compra_curso(pais,direccion,estado,cp,id_venta) values
  	(
			'".$_POST['country']."',
			'".$_POST['c_address']."',
			'".$_POST['c_state_country']."',
			'".$_POST['c_postal_zip']."',
			$id_venta
		)
		")or die($conexion->error);

	unset($_SESSION['cesec']);
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
			   <?php include("./layouts/header.php"); ?>

			    <div class="site-section">
			      <div class="container">
			        <div class="row">
			          <div class="col-md-12 text-center">
			            <span class="icon-check_circle display-3 text-success"></span>
			            <h2 class="display-3 text-light">¡GRACIAS POR LA COMPRA!</h2>
			            <p class="lead mb-5 text-light display-4">Su resgitro fue un éxito</p>
			            <p><a href="cursos.php" class="btn btn-lg btn-dark"><right>Regresar</right></a></p>
			          </div>
			        </div>
			      </div>
			    </div>

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

	</body>
</html>
