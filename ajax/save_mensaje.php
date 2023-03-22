<?php require_once '../conexion.php';
$con = conectar();

$mensaje = $_POST["mensaje"];
$calificacion = $_POST["calificacion"];
$fecha = date("Y-m-d H:i:s");

$crear_mensaje = "INSERT INTO mensajes(fecha, mensaje, calificacion) VALUES ('$fecha', '$mensaje','$calificacion');";
$resultado = mysqli_query($con, $crear_mensaje);
if ($resultado == 1) {
    echo 1;
} else {
    echo 0;
}
