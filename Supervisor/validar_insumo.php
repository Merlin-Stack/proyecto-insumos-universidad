<?php
$conex = mysqli_connect('localhost', 'root', '', 'rol');

$serie=$_POST['No_serie'];
$nombre = $_POST['name'];
$cantidad = $_POST['cantidad'];


$sql = "INSERT INTO insumos (No_serie, nombre, cantidad) VALUES ('$serie','$nombre', '$cantidad')";

if ($conex->query($sql) === TRUE) {
    echo "<script language='JavaScript'>
    alert('Los datos se ingresaron correctamente');
    location.assign('/project/Supervisor/new_insumos.php');
    </script>";
} else {
    echo "Error al insertar datos: " . $conex->error;
}

$conex->close();
?>
