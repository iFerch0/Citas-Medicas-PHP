<!DOCTYPE html>
<html>
<head>
	<title>CLINICALSERV | Citas</title>
	<link rel="icon" type="icon" href="img/logo.png">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>


<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=CLINICALSERV','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("
		SELECT * FROM citas 
inner join usuario on usuario.iduser=citas.user
inner join medicina_general on medicina_general.idmedicina_general=citas.medicina_general_idmedicina_general
; ");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'VACIO';
}
?>

					<div class="mensaje">
						<h2>CITAS</h2>
					</div>
					<a class="agregar" href="agregarcitasmedgeneral.php">Programar una Cita</a>
					
					<table class="tabla">
						  <tr>
							<th>Id</th>
							<th>Estudiante</th>
							<th>Doctor</th>
							<th>Fecha</th>
							<th>Hora</th>
							
							<th>Observaciones</th>
							<th colspan="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
							<?php echo "<td class='mayusculas'>". $Sql['idcitas']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['username']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['medicina_generalnom']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['fecha']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['hora']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['observaciones']. "</td>"; ?>
                        <?php echo "<td class='centrar'>"."<a href='actualizarcitas_vista.php?idcitas'=".$Sql['idcitas']."' class='editar'>Editar</a>". "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='deletecitas.php?idcitas'=".$Sql['idcitas']."' class='eliminar'>Eliminar</a>". "</td>"; ?>
						</tr>
						<?php endforeach; ?>
						</table>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>	 
				