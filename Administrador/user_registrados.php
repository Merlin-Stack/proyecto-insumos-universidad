<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<script language='JavaScript'>
    alert('La sesión ha expirado, inicie sesión nuevamente');
    location.assign('/project/login.html');
    </script>";
    exit();
}

$conex = mysqli_connect('localhost', 'root', '', 'rol');

if (!$conex) {
    die("Error en la conexión: " . mysqli_connect_error());
}


$where = "";
if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];

    $where = " WHERE usuarios.nombre LIKE '%" . $busqueda . "%' OR usuario LIKE '%" . $busqueda . "%'";
}

$sql = "SELECT * from usuarios " . $where;
$resultado = mysqli_query($conex, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usuarios registrados</title>
    <link rel="stylesheet" href="/project/css/user_registrados.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item" href="/project/users/admin.php">
                    <img  src="/project/img/admin.png" width="50" height="50">
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

    <form class="buscador" action="" method="GET">
        <h1>Datos de usuarios</h1>
        <div class="container_1">
            <div class="BS">
                <input class="form-control me-2 centered-input" type="search" placeholder="Búsqueda" name="busqueda"><br>
                <button class="btn btn-outline-info" type="submit" name="enviar">Buscar</button>
            </div>
        </div>
        <table class="table table-striped table-dark usuarios">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php
            while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <th><?php echo $mostrar['id'] ?></th>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['usuario'] ?></td>
                    <td><?php echo $mostrar['contraseña'] ?></td>
                    <td><?php echo $mostrar['id_cargo'] ?></td>
                    <td class="btn1">
                        <a href="/project/Administrador/editar.php?id=<?php echo $mostrar['id']; ?>" style="background-image: url('/project/img/editar.png'); width: 16px; height: 16px; display: inline-block;"></a>
                    </td>
                    <td class="btn2">
                        <a href="/project/php/eliminar.php?id=<?php echo $mostrar['id']; ?>"
                            onclick="return confirmarEliminar(<?php echo $mostrar['id']; ?>)">
                            <img src="/project/img/eliminar.png" alt="Eliminar" width="16" height="16" style="display: inline-block;">
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <input type="submit" value="Regresar" onclick="window.location.href= '/project/users/admin.php'">
    </form>

    <script>
        function confirmarEliminar(id) {
            return confirm("¿Estás seguro de que deseas eliminar este dato?");
        }
    </script>
</body>
</html>
