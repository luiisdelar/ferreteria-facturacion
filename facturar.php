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

<div class="container d-flex justify-content-center">
    <div class="row">
        <form action="validarfactura.php" method="POST" class="col-12 box mt">
           
            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label for="">Username de Empleado</label>
                    <input type="text" readonly name="empleado" class="form-control" value="<?php echo $_SESSION['username']; ?>">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label for="">Cedula del Cliente</label>
                    <input type="text" name="cedula_cliente" class="form-control" placeholder="Cedula Cliente">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 form-group">
                    <label for="">Codigo de Producto</label>
                    <input type="text" name="codigo" class="form-control" placeholder="Codigo">
                </div>
                <div class="col-6 form-group">
                    <label for="">Cantidad</label>
                    <input type="number" name="cantidadpro" class="form-control" placeholder="Cantidad">
                </div>
            </div>

            <div class="flujo">

            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="productosfacturados" value="<?php echo $_POST['productosfacturados']; ?>">
                        <input type="submit" class="form-control btn btn-primary" value="Agregar Producto" onclick='addproduct()'>  
                    </form>
                    
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <input type="hidden" name="productosfacturados" class="herevalue" value="<?php echo $productosfacturados; ?>">
                    <input type="submit" name="facturar" class="form-control btn btn-success" value="Facturar">
                </div>
            </div>

        </form>
    </div>
</div>
<script type="text/javascript">

    function addproduct() {
        
        $('.flujo').addClass('row justify-content-center');
        $('.flujo').append(
            $('<div>',{
                'class': 'col-6 form-group'
            }).append(
                $('<label>',{
                    'text': 'Codigo de Producto'
                }),
                $('<input>',{
                    'type': 'text',
                    'name': 'codigo<?php echo $productosfacturados; ?>',
                    'class': 'form-control',
                    'placeholder': 'Codigo'
                })
            ),
            $('<div>',{
                'class': 'col-6 form-group'
            }).append(
                $('<label>',{
                    'text': 'Cantidad'
                }),
                $('<input>',{
                    'type': 'number',
                    'name': 'cantidadpro<?php echo $productosfacturados; ?>',
                    'class': 'form-control',
                    'placeholder': 'cantidad'
                })
            )
        );
	}
</script>

<?php require("footer.php"); ?>
