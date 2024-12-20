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

<?php
$conex=mysqli_connect('localhost', 'root','','rol' );
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Realizar prestamo</title>
    <link rel="stylesheet" href="/project/css/prestamo.css">
</head>

<body>
<div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item" href="/project/users/teacher.php" >
                    <img  src="/project/img/profe.png" width="50" height="50">
                </a>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Insumos</a>

                <div class="navbar-dropdown">
                    <a href="prestamo.php" class="navbar-item">Prestar Insumo </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <a href="/project/php/logout.php" class="button is-link">Salir</a>
        </div>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
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
                <td> <?php echo $mostrar['cantidad']?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="form-container">
    <h1>Ingresa los datos correspondientes</h1>
    <form action="procesar_prestamo.php" method="POST">
        <label for="name">Nombre</label>
        <input name="name" type="text" id="name" placeholder="Ingresa el nombre del insumo">

        <label for="cantidad">cantidad</label>
        <input name="cantidad" type="number" id="cantidad" placeholder="Ingresa la cantidad del insumo">
        <input type="submit" name="enviar" value="Prestar">
    </form>
</div>
</body>
</html>
