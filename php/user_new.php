<?php
include('conexion.php');

$nombre = $_POST['name'];
$usuario=$_POST['usuario'];
$contraseña = $_POST['password'];
$ocupacion = $_POST['ocupacion'];


$sql = "INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo) VALUES ('$nombre','$usuario', '$contraseña', '$ocupacion')";

if ($conn->query($sql) === TRUE) {
    echo "<script language='JavaScript'>
            alert('Los datos se insertaron correctamente');
            location.assign('/project/Administrador/user_new.php');
            </script>";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

$conn->close();
?>
