<?php
require('connection.php');

$sql="select * from users where username= :username and password= :password";

$resultado=$base->prepare($sql);
$user=htmlentities(addslashes($_POST["username"]));
$password=htmlentities(addslashes($_POST["password"]));
$resultado->bindValue(":username",$user);
$resultado->bindValue(":password",$password);
$resultado->execute();
$num_register=$resultado->rowCount();

if ($num_register!=0){
    session_start();
    $user=$_POST["username"];
    
    $sql="select * from users where username='$user'";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $registros=$resultado->fetch(PDO::FETCH_ASSOC);
    
    if(strcasecmp($registros["rol"],"admin")==0){
        $_SESSION["rol"]="admin";
        header("location: admin.php");
    }
    if(strcasecmp($registros["rol"],"empleado")==0){
        $_SESSION["rol"]="empleado";
        $_SESSION["username"]=$user;
        $_SESSION["id"]=$registros["id"];
        $_SESSION["productosfacturados"]=1;

        header("location: facturar.php");
    }
}else{
    header("location: usuarionoregistrado.php");
}


?>