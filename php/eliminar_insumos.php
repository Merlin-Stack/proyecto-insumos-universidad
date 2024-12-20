<?php 
include('conexion.php');
 $id=$_GET['id'];

 $sql="DELETE FROM insumos where id ='".$id."'";
 $resultado=mysqli_query($conn,$sql);

 if($resultado){
    echo "<script language = 'JavaScript'>
            alert('Los datos fueron eliminados correctamente');
            location.assign('/project/Administrador/insumos_registrados.php');
            </script>";
 } else{
    echo "<script language = 'JavaScript'>
            alert('Los datos NO  fueron eliminados correctamente');
            location.assign('index.php');
            </script>";
 }

?>
