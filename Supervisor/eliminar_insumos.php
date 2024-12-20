<?php 
$conex=mysqli_connect('localhost', 'root','','rol' );
 $id=$_GET['id'];

 $sql="DELETE FROM insumos where id ='".$id."'";
 $resultado=mysqli_query($conex,$sql);

 if($resultado){
    echo "<script language = 'JavaScript'>
            alert('Los datos fueron eliminados correctamente');
            location.assign('/project/Supervisor/insumos_registrados.php');
            </script>";
 } else{
    echo "<script language = 'JavaScript'>
            alert('Los datos NO  fueron eliminados correctamente');
            location.assign('/project/Supervisor/insumos_registrados.php');
            </script>";
 }

?>
