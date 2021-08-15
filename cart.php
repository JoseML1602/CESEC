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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

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

			<main class="contenido">

        <div class="site-wrap">

          <div class="site-section">
            <div class="container">
              <div class="row mb-6">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="product-thumbnail text-uppercase">Imagen</th>
                          <th class="product-name text-uppercase">Curso</th>
                          <th class="product-price text-uppercase">Precio</th>
                          <th class="product-remove text-uppercase">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
												<?php
													$iva= 0.16;
													$subtotal =0;
													$totalsi= 0;
													$total= 0;
													if(isset($_SESSION['cesec'])){
														$arregloCarrito =$_SESSION['cesec'];
														for($i=0;$i<count($arregloCarrito);$i++){
															$subtotal= $subtotal +($arregloCarrito[$i]['Precio']);
															$totalsi= $subtotal * $iva;
															$total= $totalsi + $subtotal;

												 ?>
                        <tr>
                          <td class="product-thumbnail">
                            <img src="img/<?php echo $arregloCarrito [$i]['Imagen'];?>" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black"><?php echo $arregloCarrito [$i]['Nombre'];?></h2>
                          </td>
                          <td>$<?php echo $arregloCarrito [$i]['Precio'];?></td>
                          <td><a href="#" class="btn btn-dark btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id'];?>">X</a></td>
                        </tr>
											<?php }	} ?>

                      </tbody>
                    </table>
                  </div>
                </form>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-dark btn-sm" onclick="window.location='cart.php'">Actualizar carrito</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-dark btn-sm" onclick="window.location='cursos.php'">Continuar comprando</button>
                    </div>
                  </div>

                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase text-center">Resumen</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$<?php echo $subtotal; ?></strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$<?php echo $total; ?></strong>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-dark btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Pagar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
				$(document).ready(function(){
					$(".btnEliminar").click(function(event){
						event.preventDefault();
						var id = $(this).data('id');
						var boton = $(this);
						$.ajax({
							method:'POST',
							url:'./eliminarCarrito.php',
							data:{
								id:id
							}
					  }).done(function(respuesta){
								boton.parent('td').parent('tr').remove();
						});
					});
				});
		</script>

	</body>
</html>
