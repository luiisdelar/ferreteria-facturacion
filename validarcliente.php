<?php
include 'connection.php';

$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$cedula=$_POST["cedula"];
$direccion=$_POST["direccion"];

if (empty($nombres) || empty($apellidos) || empty($cedula) || empty($direccion)) {
    echo "<script> alert('Error. No dejes espacios en blanco'); location.href ='registrarcliente.php' </script>";
    exit();
}

try {

    $server="localhost";
    $userserver="root";
    $passwordserver="";
    $db="ferreteria";
    $connection = mysqli_connect($server,$userserver,$passwordserver,$db);
	$base=new PDO("mysql:host=localhost; dbname=ferreteria","root","");
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$base->exec("set character set utf8");
    $consulta="select cedula from clientes";
    $resultados=mysqli_query($connection,$consulta);

    while($fila=mysqli_fetch_row($resultados)){
        if (strcasecmp($fila[0],$cedula)===0) {
            echo "<script>alert('El cliente ya esta registrado'); location.href ='registrarcliente.php'; </script>";
            exit();
        }
    }

    $sql="insert into clientes (nombres, apellidos, cedula, direccion) values ('$nombres','$apellidos','$cedula','$direccion')";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $resultado->closeCursor();

    echo "<script> alert('Registrado con exito'); 
            location.href='facturar.php'; </script>";
    
    exit();

} catch (Exception $e) {
    echo "<script> alert('Error al conectar con la base de datos'); </script>";
    exit();
}


?>