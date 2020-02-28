<?php require("cabecera.php"); 
	session_start();
    $session = $_SESSION['rol'];
    if($session == null || $session=='' || $session != 'admin'){
        header("location: usuarionoregistrado.php");
    }

    if(isset($_POST["save"])) {

        require("connection.php");
    
        $nombre=$_POST["nombre"];
        $codigo=$_POST["codigo"];
        $cantidad=$_POST["cantidad"];
        $p=$_POST["precio"];
        $pv=$_POST["precio_venta"];

        $sql="insert into productos(nombre,cantidad,codigo,precio,precio_venta) values
            ('$nombre','$cantidad','$codigo','$p','$pv')";

        $resultado=$base->prepare($sql);

        $resultado->execute();

        if (!$resultado) {
            echo "Error editando";
        }else{
            echo "<script> alert('Producto añadido exitosamente'); location.href ='admin.php' </script>";
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
       
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="col-4 box mt">
            <div class="row justify-content-center">
                <div class="form-group col-12">
                <h2 class="text-center">Nuevo Producto</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" placeholder="Codigo" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" placeholder="cantidad" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label>Precio</label>
                    <input type="number" name="precio" placeholder="Precio" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label>Precio de venta</label>
                    <input type="number" name="precio_venta" placeholder="Precio venta" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <input type="submit" name="save" value="Crear" class="btn btn-success form-control" />
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <input type="button" onclick="location.href='admin.php';" value="Volver" class="btn btn-primary form-control" />
                </div>
            </div>
        </form>
      
    </div>

<?php require("footer.php"); ?>