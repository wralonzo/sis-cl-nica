


<?php session_start();
if(empty($_SESSION['id'])):
endif;
include('../../dist/includes/dbcon.php');

		$id_cita = $_POST['id_cita'];
	$id_medico = $_POST['id_medico'];
	$observaciones = $_POST['medicina'];
	$fecha = $_POST['fecha'];


	mysqli_query($con,"update cita set id_medico='$id_medico',medicina='$observaciones',fecha='$fecha' where id_cita='$id_cita'")or
	e die(mysqli_error());


echo "<script>document.location='../preescripcion/preescripcion.php'</script>";	

?>
