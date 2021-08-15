<?php
include "./conexion.php";

if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nivel']) ){



                $conexion->query("insert into usuario (nombre,telefono,email,password,nivel) values
                (
                  '".$_POST['nombre']."',
                  ".$_POST['telefono'].",
                  '".$_POST['email']."',
                  '".sha1($_POST['password'])."',
                  '".$_POST['nivel']."'
                )

                ")or die($conexion->error);
                  header("Location: ./admin/dashboard/usuarios.php?success");

}else{
    header("Location: ./admin/dashboard/usuario.php?error=Favor de llenar todos los campos");
}
  ?>
