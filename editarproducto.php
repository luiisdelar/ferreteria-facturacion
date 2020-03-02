<?php require("cabecera.php"); 
	session_start();
    $session = $_SESSION['rol'];
    if($session == null || $session=='' || $session != 'admin'){
        header("location: usuarionoregistrado.php");
    }

    $id=$_POST["id"];
    require("connection.php");
    $sql="select *
          from productos
          where id='$id'";
    $resultado=$base->prepare($sql);
	$resultado->execute();
    $registro=$resultado->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST["save"])) {

        require("connection.php");
    
        $nombre=$_POST["nombre"];
        $codigo=$_POST["codigo"];
        $cantidad=$_POST["cantidad"];
        $cv=$_POST["cantidad_vendidos"];
        $pre=$_POST["precio"];
        $pv=$_POST["precio_venta"];
        
        $sql="update productos 
            set nombre='$nombre', codigo='$codigo', cantidad='$cantidad',
            cantidad_vendidos='$cv', precio='$pre', precio_venta='$pv'
            where id='$id'";

        $resultado=$base->prepare($sql);

        $resultado->execute();

        if (!$resultado) {
            echo "Error editando";
        }else{
            echo "<script> alert('Producto actualizado'); location.href ='admin.php' </script>";
            exit();
        }

    }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
	<div>  
		<a class="navbar-brand" href="admin.php"> Panel de Administracion</a>
	</div>  

	<div class="justify-content-end">
		<div class="justify-content-end">
			<input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Agregar Producto" onclick="location.href='aggproducto.php';">
			<input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Salir" onclick="location.href='close.php';">
		</div>
	</div>
</nav>
    <div class="container d-flex justify-content-center">
       
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="col-12 box mt">
            <div class="row justify-content-center">
                <div class="form-group col-6">
                <h2 class="text-center">Editar Producto</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-4 form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $registro["nombre"]; ?>" class="form-control">
                </div>
            
                <div class="col-4 form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" value="<?php echo $registro["codigo"]; ?>" class="form-control">
                </div>
            
                <div class="col-4 form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" value="<?php echo $registro["cantidad"]; ?>" class="form-control">
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-4 form-group">
                    <label>Cantidad de vendidos</label>
                    <input type="number" name="cantidad_vendidos" value="<?php echo $registro["cantidad_vendidos"]; ?>" class="form-control">
                </div>
            
                <div class="col-4 form-group">
                    <label>Precio</label>
                    <input type="number" name="precio" value="<?php echo $registro["precio"]; ?>" class="form-control">
                </div>
            
                <div class="col-4 form-group">
                    <label>Precio de venta</label>
                    <input type="number" name="precio_venta" value="<?php echo $registro["precio_venta"]; ?>" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
                    <input type="submit" name="save" value="Actualizar" class="btn btn-success form-control" />
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <input type="button" onclick="location.href='admin.php';" value="Volver" class="btn btn-primary form-control" />
                </div>
            </div>
        </form>
      
    </div>

<?php require("footer.php"); ?>