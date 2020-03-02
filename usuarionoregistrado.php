<?php require("cabecera.php"); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
	<div>  
		<a class="navbar-brand" href="index.php">Variedades en Lubricantes Jhon-Jhonny</a>
	</div>  
	<form action="buscarproducto.php" method="POST">
		<div class="justify-content-end">
			<div class="justify-content-end">
				<input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Salir" onclick="location.href='close.php';">
			</div>
		</div>
	</form>	
</nav>
<div class="container login-box mt">
    <div class="row justify-content-center">
        <div class="col-4 form-group caja">
            <h3 class="text-center">Usuario no registrado</h3>
            <form action="index.php" method="post">
                <input type="submit" class="btn btn-primary form-control" value="Ir al inicio">
            </form>
    
        </div>
    </div>
</div>

<?php require("footer.php"); ?>