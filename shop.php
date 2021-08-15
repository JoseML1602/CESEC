<?php
  include("./conexion.php");
  if( isset($_GET['id'])) {
    $resultado = $conexion ->query("select * from cursos where id=".$_GET['id'])or die($conexion->error);
    if(mysqli_num_rows($resultado) > 0 ){
      $fila = mysqli_fetch_row($resultado);
    }else{
      header("Location: ./cursos.php");
    }

  }else{
    header("Location: ./cursos.php");
  }

  session_start();
  include './conexion.php';
  if(isset($_SESSION['cesec'])){
    if(isset($_GET['id'])){
      $arreglo =$_SESSION['cesec'];
      $encontro=false;
      $numero = 0;
      for($i=0;$i<count($arreglo);$i++){
        if($arreglo['Id'] == $_GET['id']){
          $encontro=true;
          $numero=$i;
        }
      }

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
		<link rel="stylesheet" href="css/subpagshop.css">
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
					<a href="login.html">Log in</a>
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

			<main class="contenido">

        <article class="articulo">
					<div class="contenedor-thumbnail">
						<a><img src="img/<?php echo $fila['4'];?>" alt="<?php echo $fila['1'];?>"></a>
					</div>
					<div class="contenedor-texto">
						<div>
							<h2 class="titulo">
								<a><?php echo $fila['1'];?></a>
							</h2>
						</div>
            <h3 class="precio">
              <a>$<?php echo $fila['5'];?></a>
            </h3>
						<p class="extracto">
              El curso incluye videos, evaluaciones y certificado de finalización al completar las actividades de todos los módulos.
              <a><li><b>Autor:</b> Centro Especializado en Soluciones en Equipos de Cómputo (CESEC)</li></a><br>
              <a><li><b>Modalidad:</b> En línea</li></a><br>
              <a><li><b>Forma de pago:</b> Paypal</li></a>
						</p>
						<a href="cart.php?id=<?php echo $fila['0'];?>" class="btn-link">Añadir al carrito</a>
					</div>
				</article>

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
	</body>
</html>
