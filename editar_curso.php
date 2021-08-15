<?php
include "./conexion.php";

if(isset($_POST['nombre']) && isset($_POST['fecha']) && isset($_POST['descripcion']) && isset($_POST['precio']) ){



        if($nombre=$_FILES['imagen']['name']!=''){
            $carpeta="./img/";
            $nombre=$_FILES['imagen']['name'];

            $temp=explode( '.' ,$nombre);
            $extension=end($temp);

            $nombreFinal = time().'.'.$extension;

            if($extension == 'jpg' || $extension == 'png' ){
                if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreFinal)){
                  $fila = $conexion->query('select imagen from cursos where id='.$_POST['id']);
                  $id = mysqli_fetch_row($fila);
                    if(file_exists('./img/'.$id[0])){
                      unlink('./img/'.$id[0]);
                    }
                      $conexion->query("update cursos set imagen='".$nombreFinal."' where id=".$_POST['id']);
        }
      }
    }

          $conexion->query("update cursos set
           nombre='".$_POST['nombre']."',
           fecha='".$_POST['fecha']."',
           descripcion='".$_POST['descripcion']."',
           precio=".$_POST['precio']."
            where id=".$_POST['id']);
        echo "Se actualizó";
}
 ?>
