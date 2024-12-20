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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" type = "text/css" href="/project/css/editar.css">
</head>
<body>
<div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item" href= "/project/users/admin.php">
                    <img src="/project/img/admin.png" width="50" height="50">
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
                    <a href="/project/fpdf/index.php" target="_blank" class="navbar-item">Generar reporte</a>
                    <a href="/project/fpdf/index_.php" target="_blank" class="navbar-item">Generar reporte de insumos prestados</a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <a href="/project/php/logout.php" class="button is-link">Salir</a>
        </div>
    </div>
    <?php 
    if(isset($_POST['enviar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $contraseña=$_POST['contraseña'];
        $cargo=$_POST['id_cargo'];

        $sql="update usuarios set nombre ='".$nombre."', usuario='".$usuario."', contraseña='".$contraseña."', id_cargo='".$cargo."' where id = '".$id."'";
        $resultado=mysqli_query($conex,$sql);

        if($resultado){
            echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('user_registrados.php');
            </script>";
        }else{
            echo "<script language='JavaScript'>
            alert('Los datos No se guardaron correctamente');
            location.assign('user_registrados.php');
            </script>";
        }
        mysqli_close($conex);

    }else{
        $id=$_GET['id'];
        $sql="select * from usuarios where id ='".$id."'";
        $resultado=mysqli_query($conex,$sql);

        $fila=mysqli_fetch_assoc($resultado);
        $nombre=$fila["nombre"];
        $usuario=$fila["usuario"];
        $contraseña=$fila["contraseña"];
        $cargo=$fila["id_cargo"];
    ?>
    <div class="form-container">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>

        <label>Usuario</label>
        <input type="text" name="usuario"  value="<?php echo $usuario; ?>"> <br>

        <label>Contraseña</label>
        <input type="text" name="contraseña" value="<?php echo $contraseña; ?>"> <br>

        <label>Cargo</label>
        <select name="id_cargo" id="seleccionar">
            <option value="administrador" <?php if($cargo == "administrador") echo "selected"; ?>>Administrador</option>
            <option value="supervisor" <?php if($cargo == "supervisor") echo "selected"; ?>>Supervisor</option>
            <option value="profesor" <?php if($cargo == "profesor") echo "selected"; ?>>Profesor</option>
            <option value="estudiante" <?php if($cargo == "estudiante") echo "selected"; ?>>Estudiante</option>
        </select> <br>

        <input type="hidden" name="id" value="<?php echo $id; ?>"> 
        <input type="submit" name="enviar" value="Actualizar">
        <input type="button" value="Regresar" onclick="window.location.href='user_registrados.php';">

    </form>

    </div>
    <?php 
     }
    ?> 
</body>
</html>
