<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

include('conexion.php');

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']=="administrador"){ //administrador
    header("location: /project/users/admin.php");

}else
if($filas['id_cargo']=="supervisor"){ //supervisor
header("location:/project/users/supervisor.php");
}
elseif($filas['id_cargo']=="profesor"){ //profesor
    header("location:/project/users/teacher.php");
}
elseif($filas['id_cargo']=="estudiante"){ //estudiante
    header("location:/project/users/student.php");
}
else{
    ?>
    <?php
    include("login.html");
    ?>
    echo "<script language='JavaScript'>
    alert('Usuario incorrecto, por favor ingrese los datos correctamente');
    location.assign('/project/login.html');
    </script>";
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conn);
?>