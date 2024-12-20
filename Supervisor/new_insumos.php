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
    <title>Registro de Usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/project/css/new_insumos.css">
</head>
<body>

  <div class="navbar">
    <div class="navbar-start">
        <div class="navbar-brand">
            <a class="navbar-item" href="/project/users/supervisor.php">
                <img href= "/project/users/supervisor.php" src="/project/img/supervisor.png" width="50" height="50">
            </a>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Insumos</a>

            <div class="navbar-dropdown">
                <a href="new_insumos.php " class="navbar-item">Nuevo</a>
                <a href="insumos_registrados.php" class="navbar-item">Ver insumos</a>
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

<div class="form-container">
    <h1>Registrar insumos</h1>
    <form action="validar_insumo.php" method="POST">
        <label for="name">Nombre</label>
        <input name="name" type="text" id="name" placeholder="Ingresa el nombre del insumo">
        <label for="numero_serie">Numero Serie</label>
        <input type="text" name="No_serie" id="user" placeholder="Ingresa el numero de serie del producto">
        <label for="cantidad">cantidad</label>
        <input name="cantidad" type="int" id="cantidad" placeholder="Ingresa la cantidad del insumo">
        <input type="submit" value="Guardar">
    </form>
</div>

</body>
</html>
