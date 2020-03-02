<?php

require("cabecera.php");
session_start();
$session = $_SESSION['rol'];
if($session == null || $session=='' || $session != 'empleado'){
    header("location: usuarionoregistrado.php");
}
include 'connection.php';
$productosfacturados=$_POST["productosfacturados"];
$userempleado=$_POST["empleado"];
$cedula_cliente=$_POST["cedula_cliente"];
$idcliente=null;
$idempleado=$_POST['id_empleado'];

if (empty($cedula_cliente)) {
    echo "<script> alert('Error. La cedula del cliente no puede estar vacia'); location.href ='facturar.php' </script>";
    exit();
}

for($i=0;$i<$productosfacturados;$i++){
    if (empty($_POST["codigo".($i+1)])) {
        echo "<script> alert('Error. Campos de productos vacios'); location.href ='facturar.php' </script>";
        exit();
    }
    if (empty($_POST["cantidadpro".($i+1)])) {
        echo "<script> alert('Error. Campos de productos vacios'); location.href ='facturar.php' </script>";
        exit();
    }
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

    $sql="select * from clientes where cedula='$cedula_cliente'";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $registros=$resultado->fetch(PDO::FETCH_ASSOC);
    
    if(!$registros){
        echo "<script>alert('El cliente no esta registrado'); location.href ='registrarcliente.php'; </script>";
        exit();
    }

    $idcliente=$registros['id'];
    $preciototal=0;

    for($i=0;$i<$productosfacturados;$i++){
        
        $codigopro=$_POST["codigo".($i+1)];
        $cantidadpro=$_POST["cantidadpro".($i+1)];
        $sql="select * from productos where codigo='$codigopro'";
        $resultado=$base->prepare($sql);
        $resultado->execute();
        $registros=$resultado->fetch(PDO::FETCH_ASSOC);
        
        if(!$registros){
            echo "<script>alert('El producto no existe, codigo incorrecto'); location.href ='facturar.php'; </script>";
            exit();
        }

        if($cantidadpro>$registros['cantidad']){
            echo "<script>alert('No hay disponibilidad de: ".$registros['nombre']." Codigo:".$codigopro."'); location.href ='facturar.php'; </script>";
            exit();
        }
        $preciototal+=$registros['precio_venta']*$cantidadpro;
    }

    $sql="insert into facturas (id_users, id_cliente, monto) values ('$idempleado','$idcliente','$preciototal')";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $resultado->closeCursor();

    $sql="select max(id) from facturas";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $registros=$resultado->fetch(PDO::FETCH_ASSOC);
    $idfactura=$registros['max(id)'];

    for($i=0;$i<$productosfacturados;$i++){
       
        $codigopro=$_POST["codigo".($i+1)];
        $cantidadpro=$_POST["cantidadpro".($i+1)];
        $sql="select * from productos where codigo='$codigopro'";
        $resultado=$base->prepare($sql);
        $resultado->execute();
        $registros=$resultado->fetch(PDO::FETCH_ASSOC);
        $idpro=$registros['id'];
        $cantidadA=$registros['cantidad']-$cantidadpro;
        $cantidadB=$registros['cantidad_vendidos']+$cantidadpro;

        $sql="update productos 
        set cantidad='$cantidadA', cantidad_vendidos='$cantidadB'
        where codigo='$codigopro'";
        $resultado=$base->prepare($sql);
        $resultado->execute();
        
        $sql="insert into detalle_factura (id_factura, id_producto, cantidad) values ('$idfactura','$idpro','$cantidadpro')";
        $resultado=$base->prepare($sql);
        $resultado->execute();
        $resultado->closeCursor();
    }  

} catch (Exception $e) {
    echo "<script> alert('Error al conectar con la base de datos'); </script>";
    exit();
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
	<div>  
		<a class="navbar-brand" href="facturar.php"> Facturando </a>
	</div>  
	<form action="buscarproducto.php" method="POST">
		<div class="justify-content-end">
			<div class="justify-content-end">
                <input type="text" placeholder="Codigo Producto" name="codigo" class="buscador">
                <input class="btn btn-outline-light" type="submit" name="buscar" value="Buscar">
                <input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Registrar Cliente" onclick="location.href='registrarcliente.php';">
			    <input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Salir" onclick="location.href='close.php';">
			</div>
		</div>
	</form>	
</nav>

<?php
    $sql="select * from clientes where id='$idcliente'";
    $resultado=$base->prepare($sql);
    $resultado->execute();
    $registros=$resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="container justify-content-center dot mt">
    
    <div class="row justify-content-center">
        <div class="col-8">
            <h2 class="text-center">Factura codigo: <?php echo $idfactura; ?></h2>
            <input type="hidden" name="titulo" value="<?php echo $idfactura; ?>">
            <input type="hidden" name="idfac" value="<?php echo $idfactura; ?>">
        </div>
    </div>
    
    <div class="row justify-content-start">
        <div class="col-4 text-center">
            <label>Cliente:</label>
            <label><b><?php echo $registros['nombres']." ".$registros['apellidos']; ?></b></label>
            <input type="hidden" name="fila1a" value="Cliente: <?php echo $registros['nombres']." ".$registros['apellidos']; ?>">
        </div>
        <div class="col-4 text-center">
            <label>CI: </label>
            <label><b><?php echo $registros['cedula']; ?></b></label>
            <input type="hidden" name="fila1b" value="CI: <?php echo $registros['cedula']; ?>">
        </div>
        <div class="col-4 text-center">
            <label>Dirección:</label>
            <label><b><?php echo $registros['direccion']; ?></b></label>
            <input type="hidden" name="fila1c" value="Direccion: <?php echo $registros['direccion']; ?>">
        </div>
    </div>
    <div class="row justify-content-center mt dot3">
        <div class="col-4 text-center">
            <label>Productos</label>
        </div>
        <div class="col-4 text-center">
            <label>Cantidad</label>
        </div>
        <div class="col-4 text-center">
            <label>Precio</label>
        </div>
    </div>

    <div class="row justify-content-center">
    <?php 
        $sql="select p.nombre, d.cantidad, (d.cantidad*p.precio_venta) as venta 
              from detalle_factura d 
              join productos p
              on d.id_producto=p.id
              where d.id_factura='$idfactura'";

        $resultado=$base->prepare($sql);
        $resultado->execute();
        $vara=0;
        while($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
            $vara++;
            ?>
            
            <div class="col-4 text-center">
                <label><b><?php echo $registros['nombre']; ?></b></label>
            </div>
            <div class="col-4 text-center">
                <label><b><?php echo $registros['cantidad']; ?></b></label>
            </div>
            <div class="col-4 text-center">
                <label><b><?php echo $registros['venta']; ?> Bs</b></label>
            </div>
            <input type="hidden" name="fila<?php echo $vara; ?>" value="<?php echo $registros['nombre']; ?>">
            <input type="hidden" name="filab<?php echo $vara; ?>" value="<?php echo $registros['cantidad']; ?>">
            <input type="hidden" name="filac<?php echo $vara; ?>" value="<?php echo $registros['venta']; ?>">
            <?php
            
        }
        
        $sql="select monto from facturas where id='$idfactura'";
        $resultado=$base->prepare($sql);
        $resultado->execute();
        $registros=$resultado->fetch(PDO::FETCH_ASSOC);
    ?>
    </div>
    <input type="hidden" name="vueltas" value="<?php echo $vara; ?>">
    <div class="row justify-content-end dot4">
        <div class="col-4 text-center">
            <label class="verde">Total</label>
        </div>
        <div class="col-4 text-center dot2">
            <label class="verde"><b><?php echo $registros['monto']; ?> Bs</b></label>
            <input type="hidden" name="total" value="<?php echo $registros['monto']; ?>">
        </div>
    </div>

    <div class="row justify-content-center mt">
            <div class="form-group col-4">
                <input type="button" onclick="location.href='facturar.php';" value="Nueva Factura" class="btn btn-primary form-control" />
            </div>
    
    </div>
</div>