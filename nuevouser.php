<?php require("cabecera.php"); 
	session_start();
    $session = $_SESSION['rol'];
    if($session == null || $session=='' || $session != 'admin'){
        header("location: usuarionoregistrado.php");
    } 
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <div>  
        <a class="navbar-brand" href="facturar.php"> Nuevo Empleado</a>
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
        <form action="validaregistro.php" method="POST" class="col-12 box mt">

        <div class="row justify-content-center">
            <div class="col-6 form-group">  
                <h2 class="text-center">Datos del Empleado</h4>
            </div>
        </div>
        
        <div class="row justify-content-start">
            <div class="col-6 form-group">
                <label for="">Nombre Completo</label>
                <input type="text" name="fullname" class="form-control" placeholder="Nombre Completo">
            </div>
       
            <div class="col-6 form-group">
                <label for="">Tipo de usuario</label>
                <select readonly name="rol" class="form-control">
                    <option value="Empleado">Empleado</option>
                </select>
            </div>
        </div>
        
        <div class="row justify-content-start">    
            <div class="col-6 form-group">
                <label for="">Correo</label>
                <input type="mail" name="mail" class="form-control" placeholder="Correo">
            </div>
        
            <div class="col-6 form-group">
                <label for="">Nombre de usuario</label>
                <input type="text" name="username" class="form-control" placeholder="Nombre de usuario">
            </div>
        </div>    
        
        <div class="row justify-content-start">    
            <div class="col-6 form-group">
                <label for="">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
        </div>
        
        <div class="row justify-content-center">        
            <div class="col-6 form-group">
                <input type="submit" class="form-control subnewuser btn btn-success" value="Registrarse">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="form-group col-6">
                <input type="button" onclick="location.href='admin.php';" value="Volver" class="btn btn-primary form-control" />
            </div>
        </div>

        </div>
        </form>
    </div>

<?php require("footer.php"); ?>    