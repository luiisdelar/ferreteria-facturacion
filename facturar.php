<?php require("cabecera.php");
session_start();
$session = $_SESSION['rol'];
if($session == null || $session=='' || $session != 'empleado'){
    header("location: usuarionoregistrado.php");
}

if(!isset($_POST['productosfacturados'])){
    $productosfacturados=1;
}else{
    $_POST['productosfacturados']++;
    $productosfacturados=$_POST['productosfacturados'];
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
	<div>  
		<a class="navbar-brand" href="facturar.php"> Variedades en Lubricantes Jhon-Jhonny </a>
	</div>  
	<form action="buscarproducto.php" method="POST">
		<div class="justify-content-end">
			<div class="justify-content-end">
                <input type="search" placeholder="Codigo Producto" name="codigo" class="buscador">
                <input class="btn btn-outline-light" type="submit" name="buscar" value="Buscar">
                <input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Registrar Cliente" onclick="location.href='registrarcliente.php';">
			    <input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Salir" onclick="location.href='close.php';">
			</div>
		</div>
	</form>	
</nav>

<div class="container justify-content-center">
    <div class="row box mt">
        <form action="validarfactura.php" method="POST" class="col-12 mt">
            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <h3 class="text-center">Factura</h3>
                </div>
            
                
            </div>
            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <label for="">Cedula del Cliente</label>
                    <input type="text" required name="cedula_cliente" class="form-control" placeholder="Cedula Cliente">
                </div>
            
                <div class="col-6 form-group">
                    <label for="">Empleado</label>
                    <input type="hidden" name="id_empleado" value="<?php echo $_SESSION['id']; ?>">
                    <input type="text" readonly name="empleado" class="form-control" value="<?php echo $_SESSION['username']; ?>">
                </div>
            </div>
            
            <?php for($i=0;$i<$productosfacturados;$i++){ ?>
            <div class="row justify-content-center">    
                <div class="col-6 form-group">
                    <label for="">Codigo de Producto</label>
                    <input type="text" required name="<?php echo "codigo".($i+1) ?>" class="form-control" placeholder="Codigo">
                </div>
                <div class="col-6 form-group">
                    <label for="">Cantidad</label>
                    <input type="number" required name="<?php echo "cantidadpro".($i+1) ?>" class="form-control" placeholder="Cantidad">
                </div>
               
            </div>
            <?php } ?>
            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <input type="hidden" name="productosfacturados" value="<?php echo $productosfacturados; ?>">
                    <input type="submit" name="facturar" class="form-control btn btn-success" value="Facturar">
                </div>
            </div>

        </form>

        <form class="col-12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                 
            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <?php 
                        if(isset($_POST['productosfacturados'])){
                    ?>
                        <input type="hidden" name="productosfacturados" value="<?php echo $_POST['productosfacturados']; ?>">
                    <?php }else{ ?>
                        <input type="hidden" name="productosfacturados" value="1">
                    <?php } ?>    
                    <input type="submit" class="form-control btn btn-primary" value="Agregar Producto">  
                </div>
            </div>
        </form>
      
    </div>
</div>

<?php require("footer.php"); ?>
