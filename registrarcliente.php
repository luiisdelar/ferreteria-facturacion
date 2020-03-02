<?php require("cabecera.php"); ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <div>  
            <a class="navbar-brand" href="facturar.php"> Nuevo Cliente </a>
        </div>  
        <form action="buscarproducto.php" method="POST">
            <div class="justify-content-end">
                <div class="justify-content-end">
                    <input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Registrar Cliente" onclick="location.href='registrarcliente.php';">
                    <input class="btn btn-outline-light my-2 my-sm-0" type="button" value="Salir" onclick="location.href='close.php';">
                </div>
            </div>
        </form>	
    </nav>

    <div class="container login-box justify-content-center d-flex">
        <form action="validarcliente.php" method="POST" class="col-12 box mt">

        <div class="row justify-content-center">
            <div class="col-6 form-group">  
                <h2 class="text-center">Registro Cliente</h4>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 form-group">
                <label for="">Nombres</label>
                <input type="text" name="nombres" class="form-control" placeholder="Nombres">
            </div>
        
            <div class="col-6 form-group">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos">
            </div>
        </div>

        <div class="row justify-content-center"> 
            <div class="col-6 form-group">
                <label for="">Cedula</label>
                <input type="number" name="cedula" class="form-control" placeholder="Cedula">
            </div>

            <div class="col-6 form-group">
                <label for="">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion">
            </div>
        </div>    
        
        <div class="row justify-content-center">        
            <div class="col-6 form-group">
                <input type="submit" class="form-control subnewuser btn btn-success" value="Registrar">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="form-group col-6">
                <input type="button" onclick="location.href='facturar.php';" value="Volver" class="btn btn-primary form-control" />
            </div>
        </div>

        </div>
        </form>
    </div>

<?php require("footer.php"); ?>    