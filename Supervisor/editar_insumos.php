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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" type = "text/css" href="/project/css/editar.css">
</head>
<body>
<div class="navbar">
        <div class="navbar-start">
            <div class="navbar-brand">
                <a class="navbar-item">
                    <img src="/project/img/supervisor.png" width="50" height="50">
                </a>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Insumos</a>

                <div class="navbar-dropdown">
                    <a href="/project/Supervisor/new_insumos.php" class="navbar-item">Nuevo</a>
                    <a href="/project/Supervisor/insumos_registrados.php" class="navbar-item">Ver insumos</a>
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
            <a href="/php/logout.php" class="button is-link">Salir</a>
        </div>
    </div>
    <?php 
    if(isset($_POST['enviar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $serie=$_POST['No_serie'];
        $cantidad=$_POST['cantidad'];

        $sql="update insumos set nombre ='".$nombre."', No_serie='".$serie."', cantidad='".$cantidad."' where id = '".$id."'";
        $resultado=mysqli_query($conex,$sql);

        if($resultado){
            echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('insumos_registrados.php');
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
        $sql="select * from insumos where id ='".$id."'";
        $resultado=mysqli_query($conex,$sql);

        $fila=mysqli_fetch_assoc($resultado);
        $nombre=$fila["nombre"];
        $serie=$fila["No_serie"];
        $cantidad=$fila["cantidad"];
    ?>
    <div class="form-container">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>

        <label>Serie</label>
        <input type="text" name="No_serie"  value="<?php echo $serie; ?>"> <br>

        <label>Cantidad</label>
        <input type="text" name="cantidad" value="<?php echo $cantidad; ?>"> <br>

        <input type="hidden" name="id" value="<?php echo $id; ?>"> 
        <input type="submit" name="enviar" value="Actualizar">
        <input type="button" value="Regresar" onclick="window.location.href='insumos_registrados.php';">

    </form>

    </div>
    <?php 
     }
    ?> 
</body>
</html>
