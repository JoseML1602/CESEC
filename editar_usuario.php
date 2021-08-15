<?php
include "./conexion.php";

if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nivel']) ){

                  $fila = $conexion->query('select from usuario where id='.$_POST['id']);
                  $id = mysqli_fetch_row($fila);

          $conexion->query("update usuario set
           nombre='".$_POST['nombre']."',
           telefono='".$_POST['telefono']."',
           email='".$_POST['email']."',
           password='".sha1($_POST['password'])."',
           nivel='".$_POST['nivel']."'
            where id=".$_POST['id']);
        echo "Se actualizó";
}
 ?>
