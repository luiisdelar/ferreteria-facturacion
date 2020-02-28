<?php
include 'connection.php';

$productosfacturados=$_POST["productosfacturados"];
$usermpleado=$_POST["empleado"];
$cedula_cliente=$_POST["cedula_cliente"];


$codigopro=$_POST["codigo"];
$cantidadpro=$_POST["cantidadpro"];

if(isset($codigopro1) && isset($codigopro1)){
    $codigopro1=$_POST["codigo1"];
    $cantidadpro1=$_POST["cantidadpro1"];
}

if (empty($cedula_cliente) || empty($codigopro) || empty($cantidadpro)) {
    echo "<script> alert('Error. No dejes espacios en blanco'); location.href ='facturar.php' </script>";
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
    
    $consulta="select * from clientes where cedula='$cedula_cliente'";
    $resultados=mysqli_query($connection,$consulta);

    if($fila=mysqli_fetch_row($resultados)==NULL){
        echo "<script>alert('El cliente no esta registrado'); location.href ='registrarcliente.php'; </script>";
        exit();
    }
    
    $codigopro=$_POST["codigo"];
    $sql="select * from productos where codigo='$codigopro'";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $registros=$resultado->fetch(PDO::FETCH_ASSOC);
    
    if(!$registros){
        echo "<script>alert('El producto no existe'); location.href ='facturar.php'; </script>";
        exit();
    }

    if($cantidadpro>$registros['cantidad']){
        echo "<script>alert('Noo hay disponibilidad de ese producto codigo:".$codigopro."'); location.href ='facturar.php'; </script>";
        exit();
    }

    $cantidadA=$registros['cantidad']-$cantidadpro;
    $cantidadB=$registros['cantidad_vendidos']+$cantidadpro;

    if($cantidadA<0){
        echo "<script>alert('Noo hay disponibilidad de ese producto codigo:".$codigopro."'); location.href ='facturar.php'; </script>";
    }else{
        $sql="update productos 
        set cantidad='$cantidadA', cantidad_vendidos='$cantidadB'
        where codigo='$codigopro'";
        $resultado=$base->prepare($sql);
        $resultado->execute();
    }
    
    //echo "<script>alert('listo'); location.href ='facturar.php'; </script>";

    $codigopro1=$_POST["codigo1"];
    
    if(!empty($codigopro1)){

        $sql="select * from productos where codigo='$codigopro1'";
        $resultado1=mysqli_query($connection,$sql);

        if($fila1=mysqli_fetch_row($resultado1)==NULL){
            echo "<script>alert('El producto no existe. Codigo:".$codigopro1."'); location.href ='facturar.php'; </script>";
            exit();
        }
        if($cantidadpro1>$fila1['cantidad']){
            echo "<script>alert('No hay disponibilidad de ese producto codigo:".$codigopro1."'); location.href ='facturar.php'; </script>";
            exit();
        }
    }



} catch (Exception $e) {
    echo "<script> alert('Error al conectar con la base de datos'); </script>";
    exit();
}

?>