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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
    $nombre = $_POST['name'];
    $cantidad = $_POST['cantidad']; 


    $stmt = $conex->prepare("SELECT cantidad FROM insumos WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
        $cantidad_actual = $fila["cantidad"];

        $nueva_cantidad = $cantidad_actual - $cantidad;

        $stmt = $conex->prepare("UPDATE insumos SET cantidad = ? WHERE nombre = ?");
        $stmt->bind_param("is", $nueva_cantidad, $nombre);
        $stmt->execute();

        
        $insert = $conex->prepare("INSERT INTO insumos_p (nombre_i, nombre_p, cantidad) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $nombre, $_SESSION['usuario'], $cantidad);
        $insert->execute();
    }


}

    if ($stmt->affected_rows > 0) {
        echo "<script language='JavaScript'>
        alert('El préstamo fue correcto');
        window.location.href = 'prestamo.php';
        </script>";
        exit();
    } else {
        echo "<script language='JavaScript'>
        alert('El préstamo no pudo realizarse');
        window.location.href = 'prestamo.php';
        </script>";
        exit();
    }
    
    $stmt->close();

?>

<?php
$conexion = mysqli_connect("localhost", "root","","rol");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

?>