<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<script language='JavaScript'>
    alert('La sesion expiro, inicie sesion nuevamente');
    location.assign('/project/login.html');
    </script>";
    exit();
}

$conex = mysqli_connect('localhost', 'root', '', 'rol');

if (!$conex) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

<?php
$conex = mysqli_connect('localhost', 'root', '', 'rol');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Insumos disponibles</title>
    <link rel="stylesheet" href="/project/css/insumos_registrados.css">
</head>

<body>
<div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item" href= "/project/users/supervisor.php">
                    <img  src="/project/img/supervisor.png" width="50" height="50">
                </a>
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
    <div>
        <h1>Insumos</h1>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Numero de serie</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php 
            $sql = "SELECT * from insumos ";
            $resultado = mysqli_query($conex, $sql);

            while($mostrar = mysqli_fetch_array($resultado)){
            ?>
            <tr>
                <th> <?php echo $mostrar['id']?></th>
                <td> <?php echo $mostrar['nombre']?></td>
                <td> <?php echo $mostrar['No_serie']?></td>
                <td> <?php echo $mostrar['cantidad']?></td>
                <td class="btn1">
                    <?php echo "<a href='/project/Supervisor/editar_insumos.php?id=".$mostrar['id']."'>EDITAR</a>" ?>
                </td>
                <td class="btn2">
                    <?php echo "<a href='/project/Supervisor/eliminar_insumos.php?id=".$mostrar['id']."' onclick='return confirmar()'>ELIMINAR</a>"?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <input type="button" value="Regresar" onclick="window.history.back();">
    </div>
</body>
</html>
