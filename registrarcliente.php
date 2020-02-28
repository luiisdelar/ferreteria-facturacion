<?php require("cabecera.php"); ?>

    <div class="container login-box justify-content-center d-flex">
        <form action="validarcliente.php" method="POST" class="col-4 box mt">

        <div class="row justify-content-center">
            <div class="col-12 form-group">  
                <h2 class="text-center">Registro Cliente</h4>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <label for="">Nombres</label>
                <input type="text" name="nombres" class="form-control" placeholder="Nombres">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos">
            </div>
        </div>
        
        <div class="row justify-content-center">    
            <div class="col-12 form-group">
                <label for="">Cedula</label>
                <input type="number" name="cedula" class="form-control" placeholder="Cedula">
            </div>
        </div>
        
        <div class="row justify-content-center">    
            <div class="col-12 form-group">
                <label for="">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion">
            </div>
        </div>    
        
        <div class="row justify-content-center">        
            <div class="col-12 form-group">
                <input type="submit" class="form-control subnewuser btn btn-success" value="Registrar">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="form-group col-12">
                <input type="button" onclick="location.href='facturar.php';" value="Volver" class="btn btn-primary form-control" />
            </div>
        </div>

        </div>
        </form>
    </div>

<?php require("footer.php"); ?>    