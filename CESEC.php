<?php
	session_start();
	include './conexion.php';
	if(isset($_SESSION['cesec'])){
		if(isset($_GET['id'])){
			$arreglo =$_SESSION['cesec'];
			$encontro=false;
			$numero = 0;
			for($i=0;$i<count($arreglo);$i++){
				if($arreglo[$i]['Id'] == $_GET['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			if($encontro == true){
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
				$_SESSION['cesec']=$arreglo;
			}else{
				$nombre ="";
				$precio ="";
				$imagen ="";
				$res = $conexion->query('select * from cursos where id='.$_GET['id'])or die($conexion->error);
				$fila = mysqli_fetch_row($res);
				$nombre=$fila['1'];
				$precio=$fila['5'];
				$imagen=$fila['4'];
				$arregloNuevo= array(
					'Id'=> $_GET['id'],
					'Nombre'=> $nombre,
					'Precio'=> $precio,
					'Imagen'=> $imagen,
					'Cantidad' => 1
				);
				array_push($arreglo, $arregloNuevo);
				$_SESSION['cesec']=$arreglo;
			}
		}
	}else{
		if(isset($_GET['id'])){
			$nombre ="";
			$precio ="";
			$imagen ="";
			$res = $conexion->query('select * from cursos where id='.$_GET['id'])or die($conexion->error);
			$fila = mysqli_fetch_row($res);
			$nombre=$fila['1'];
			$precio=$fila['5'];
			$imagen=$fila['4'];
			$arreglo[] = array(
				'Id'=> $_GET['id'],
				'Nombre'=> $nombre,
				'Precio'=> $precio,
				'Imagen'=> $imagen,
				'Cantidad' => 1
			);
			$_SESSION['cesec']=$arreglo;
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie-edge">
		<title>(CESEC) - Centro Especializado en Soluciones en Equipos de Cómputo</title>
		<link rel="stylesheet" href="css/CESEC.css">
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
					<a href="cart.php">&#128722;
						<?php
							if(isset($_SESSION['cesec'])){
									echo count ($_SESSION['cesec']);
							}else{
								echo 0;
							}
						 ?>
					</a>
				</nav>
			</header>

			<article class="articulo destacado">
				<div class="contenedor-texto">
					<div>
						<h2 class="titulo"><a href="shop.php?id=10">Curso de IoT</a></h2>
						<p class="fecha">
							<time>Noviembre 30, 2021</time>
						</p>
					</div>
					<p class="extracto">
						Anímate y conoce nuestro nuevo curso acerca de IoT, no te quedes en el pasado y
						conoce más sobre este amplio mundo llamado "internet", ya que IoT es una tendencia
						tecnológica que va a estar evolucionando continuamente y que va a ser imparable.
					</p>
					<a href="shop.php?id=10" class="btn-link">$368</a>
				</div>
				<div class="contenedor-thumbnail">
					<a href="shop.php?id=10">
						<img src="img/IoT.jpg" alt="w-15 h-20">
					</a>
				</div>
			</article>

			<main class="contenido">

				<div class="content-car">
		        <div class="content-carrousel">
		            <figure><a href="cursos.php"><img src="img/Img1.png"></a></figure>
		            <figure><a href="cursos.php"><img src="img/Img2.png"></a></figure>
		            <figure><a href="cursos.php"><img src="img/Img3.png"></a></figure>
		            <figure><a href="blogs.php"><img src="img/Img4.png"></a></figure>
		            <figure><a href="cursos.php"><img src="img/Img5.png"></a></figure>

		        </div>
		    </div>

				<article class="articulo">
					<div class="contenedor-thumbnail">
						<a href="shop.php?id=1"><img src="img/pcbasico.jpg" alt=""></a>
					</div>
					<div class="contenedor-texto">
						<div>
							<h2 class="titulo">
								<a href="shop.php?id=1">CURSO#01 - Conoce sobre lo básico de un equipo de cómputo</a>
							</h2>
							<p class="fecha">
								<time>Septimebre 21, 2021</time>
							</p>
						</div>
						<p class="extracto">
							En este curso, aprenderás lo básico sobre como operar un equipo de cómputo
							hasta como preservar de este ante amenzazas como malwares o posibles riesgos físicos.
						</p>
						<a href="shop.php?id=1" class="btn-link">$399.99</a>
					</div>
				</article>

				<article class="articulo">
					<div class="contenedor-thumbnail">
						<a href="blogs/internet_lento.php"><img src="img/internet.png" alt=""></a>
					</div>
					<div class="contenedor-texto">
						<div>
							<h2 class="titulo">
								<a href="blogs/internet_lento.php">¿Por qué mi internet está demasiado lento?</a>
							</h2>
							<p class="fecha">
								<time>Octubre 02, 2021</time>
							</p>
						</div>
						<p class="extracto">
							No pierdas más tú tiempo, conoce las posibles causas por las que tu internet
							está lento y te diremos como solucionarlo.
						</p>
						<a href="blogs/internet_lento.php" class="btn-link">Leer más</a>
					</div>
				</article>

				<article class="articulo">
					<div class="contenedor-thumbnail">
						<a href="blogs/pc_no_enciende.php"><img src="img/pc.jpg" alt="" /></a>
					</div>
					<div class="contenedor-texto">
						<div>
							<h2 class="titulo">
								<a href="blogs/pc_no_enciende.php">Mi computadora no enciende</a>
							</h2>
							<p class="fecha">
								<time>Agosto 29, 2021</time>
							</p>
						</div>
						<p class="extracto">
						  Lo sabemos, ¡es la peor pesadilla de todos! Pero calma, puede deberse a un
							problema eléctrico; prueba conectando el dispositivo con otro cable de alimentación
							o en un enchufe diferente. Si, aún así, no lográs encender tu computadora, entra
							y conoce sus posibles soluciones.
						</p>
						<a href="blogs/pc_no_enciende.php" class="btn-link">Leer más</a>
					</div>
				</article>
			</main>

			<aside class="sidebar">
				<div class="acerca-de">
					<img src="img/CESEC.png" class="img-perfil" alt="">

					<div class="bio">
						<p class="titulo">¡ANÍMATE!</p>
						<p>
							Somos un centro de calidad y prestigio, buscamos la solución
							a cada uno de los problemas que se presenten.
						</p>
					</div>
				</div>
				<nav class="menu">
					<a href="https://www.microsoft.com/es-mx/software-download/">Descarga windows 10</a>
				  <a href="https://www.google.com/intl/es/chrome/?brand=UUXU&gclid=CjwKCAjwt8uGBhBAEiwAayu_9b33jWldoR7PkFC-A0tPSZYXNB7Id7G4KW4ywl7-qrr385vaMxwY2BoC-t0QAvD_BwE&gclsrc=aw.ds">Descarga chrome</a>
					<a href="https://www.microsoft.com/es-mx/microsoft-365/buy/compare-all-microsoft-365-products?tab=1">Descarga paquetería Office</a>
					<a href="https://www.antivirusguide.com/es/mejor-antivirus/?lp=default&utm_source=google&utm_medium=cpc&sgv_medium=search&utm_campaign=11189230689&utm_content=109699979517&utm_term=antivirus&cid=467240266059&pl=&feeditemid=&targetid=kwd-10745101&mt=b&network=g&device=c&adpos=&p1=&p2=&geoid=1010177&gclid=CjwKCAjwt8uGBhBAEiwAayu_9bfilLTH_85IhfBlp7onLD3AW2QrkWvqivkiJFVsr0ZfmM-SkTLpzxoChHgQAvD_BwE">Descarga antivirus</a>
					<a href="https://www.softonic.com/descargas/sistema-operativo">Descarga otro S.O.</a>
					<a href="#"></a>
				</nav>
			</aside>

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
	                        © 2021 Todos los Derechos Reservados | <a href="conocenos.php">CESEC</a>
	                    </div>
	                    <div class="information">
	                        <a href="conocenos.php">Informacion Compañia</a> | <a>Privacion y Politica</a> | <a>Terminos y Condiciones</a>
	                    </div>
	                </div>
	            </div>
	   </a></footer>

		</div>
	</body>
</html>
