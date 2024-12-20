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
<html>
<head>
    <meta charset="utf-8">
    <title>Registro de Usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/project/css/user_new.css">
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
                <a href="user_new.php" class="navbar-item">Nuevo</a>
                <a href="user_registrados.php" class="navbar-item">Ver usuarios</a>
            </div>
        </div>

        
        <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Insumos</a>

                <div class="navbar-dropdown">
                    <a href="new_insumos.php" class="navbar-item">Nuevo</a>
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
    <h1>Registrar usuarios</h1>
    <form action="/project/php/user_new.php" method="POST">
        <label for="name">Nombre</label>
        <input name="name" type="text" id="name" placeholder="Ingresa el nombre">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="user" placeholder="Ingresa el usuario">
        <label for="password">Contraseña</label>
        <input name="password" type="password" id="password" placeholder="Ingresa la contraseña">
        <label for="ocupacion">Selecciona una ocupacion</label>
        <select name="ocupacion" id="seleccionar">
            <option value="administrador">Administrador</option>
            <option value="supervisor">Supervisor</option>
            <option value="profesor">Profesor</option>
            <option value="estudiante">Estudiante</option>
        </select>
        <input type="submit" value="Guardar">
    </form>
  </div>

</body>
</html>