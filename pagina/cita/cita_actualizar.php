<?php
session_start();
if (empty($_SESSION['id'])) {
    // Redireccionar al inicio de sesión o hacer algo en caso de no estar autenticado
    exit;
}
include('../../dist/includes/dbcon.php');

$id_cita = $_POST['id_cita'];
$id_medico = $_POST['id_medico'];
$observaciones = $_POST['observaciones'];
$fecha = $_POST['fecha'];

// Obtener los datos del usuario que está realizando la modificación
$id_usuario_modificador = $_SESSION['id'];
$nombre_usuario_modificador = $_SESSION['nombre'];

$query = "UPDATE cita SET id_medico='$id_medico', observaciones='$observaciones', fecha='$fecha',
 fecha_actualizacion=NOW() WHERE id_cita='$id_cita'";
mysqli_query($con, $query) or die(mysqli_error());

// Registrar en el historial
$query_historial = "INSERT INTO cita_historial
 (id_cita, id_usuario, nombre_usuario, fecha_actualizacion) VALUES ('$id_cita', '$id_usuario_modificador', 
 '$nombre_usuario_modificador', NOW())";
mysqli_query($con, $query_historial) or die(mysqli_error());

echo "<script>document.location='../cita/cita.php'</script>";
?>
