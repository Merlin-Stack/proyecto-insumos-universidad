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
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="/project/css/admin.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item" href="/project/users/admin.php">
                    <img href= "/project/users/admin.php" src="/project/img/admin.png" width="50" height="50">
                </a>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Usuarios</a>

                <div class="navbar-dropdown">
                    <a href="/project/Administrador/user_new.php" class="navbar-item">Nuevo</a>
                    <a href="/project/Administrador/user_registrados.php" class="navbar-item">Ver usuarios</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Insumos</a>

                <div class="navbar-dropdown">
                    <a href="/project/Administrador/new_insumos.php" class="navbar-item">Nuevo</a>
                    <a href="/project/Administrador/insumos_registrados.php" class="navbar-item">Ver insumos</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Reportes</a>

                <div class="navbar-dropdown">
                    <a href="/project/fpdf/index.php" target="_blank" class="navbar-item">Generar reporte de insumos disponibles</a>
                    <a href="/project/fpdf/index_.php" target="_blank" class="navbar-item">Generar reporte de insumos prestados</a>
                </div>
            </div>
        </div>


        <div class="navbar-end">
            <a href="/project/php/logout.php" class="button is-link">Salir</a>
        </div>
    </div>

    <div class="container is-fluid">
        <h1 class="title">Home</h1>
        <h2 class="subtitle">¡Bienvenido Administrador Principal!</h2>
    </div>
</body>

</html>
