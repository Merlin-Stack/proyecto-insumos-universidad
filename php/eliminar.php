<?php 
include('conexion.php');
 $id=$_GET['id'];

 $sql="DELETE FROM usuarios where id ='".$id."'";
 $resultado=mysqli_query($conn,$sql);

 if($resultado){
    echo "<script language = 'JavaScript'>
            alert('Los datos fueron eliminados correctamente');
            location.assign('/project/Administrador/user_registrados.php');
            </script>";
 } else{
    echo "<script language = 'JavaScript'>
            alert('Los datos NO  fueron eliminados correctamente');
            location.assign('/project/Administrador/user_registrados.php');
            </script>";
 }

?>
