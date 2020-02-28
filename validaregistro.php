<?php
include 'connection.php';

$fullname=$_POST["fullname"];
$username=$_POST["username"];
$mail=$_POST["mail"];
$password=$_POST["password"];
$rol=$_POST["rol"];

if (empty($fullname) || empty($username) || empty($mail) || empty($password) || empty($rol)) {
    echo "<script> alert('Error. No dejes espacios en blanco'); location.href ='nuevouser.php' </script>";
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
    $consulta="select username from users";
    $resultados=mysqli_query($connection,$consulta);

    while($fila=mysqli_fetch_row($resultados)){
        if (strcasecmp($fila[0],$username)===0) {
            echo "<script>alert('El usuario ya existe'); location.href ='nuevouser.php'; </script>";
            exit();
        }
    }

    $sql="insert into users (username, password, fullname, mail, rol) values ('$username','$password','$fullname','$mail','$rol')";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $resultado->closeCursor();

    echo "<script> alert('Registrado con exito'); 
            location.href='index.php'; </script>";
    
    exit();

} catch (Exception $e) {
    echo "<script> alert('Error al conectar con la base de datos'); </script>";
    exit();
}


?>