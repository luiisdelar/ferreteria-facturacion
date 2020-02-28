<?php 

	require("connection.php");	
    $server="localhost";
    $userserver="root";
    $passwordserver="";
    $db="ferreteria";
    $connection = mysqli_connect($server,$userserver,$passwordserver,$db);

	if (mysqli_connect_errno()) {
		echo "<script> alert('Error al conectar con la base de datos'); </script>";
		exit();
	}

	mysqli_set_charset($connection,"utf8");

	$consulta="delete from productos where id=".$_GET["id"];

	$resultados=mysqli_query($connection,$consulta);

	if (!$resultados) {
		echo "<script> alert('Fallo intento de borrar'); location.href ='admin.php' </script>";
		exit();
	}else{
		echo "<script> alert('Producto Borrado con exito'); location.href ='admin.php' </script>";
		exit();
	}
	mysqli_close($connection);
?>