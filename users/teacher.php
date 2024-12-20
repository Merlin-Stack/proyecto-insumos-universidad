<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<script language='JavaScript'>
    alert('La sesion expiro, inicie sesion nuevamente');
    location.assign('/project/login.html');
    </script>";
    exit();
}

$conex=mysqli_connect('localhost', 'root','','rol' );

if (!$conex) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Profesor</title>
    <link rel="stylesheet" href="/project/css/admin.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item" href="/users/teacher.php">
                    <img src="/project/img/profe.png" width="80" height="80">
                </a>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Insumos</a>

                <div class="navbar-dropdown">
                    <!--Aqui puedo agregar nuevas categorias-->
                    <a href="/project/Profesor/prestamo.php" class="navbar-item">Prestar insumos</a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <a href="/project/php/logout.php" class="button is-link">Salir</a>
        </div>
    </div>

    <div class="container is-fluid">
        <h1 class="title">Home</h1>
        <h2 class="subtitle">¡Bienvenido Profesor!</h2>
    </div>
</body>

</html>
