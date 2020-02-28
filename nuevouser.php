<?php require("cabecera.php"); ?>

    <div class="container login-box justify-content-center d-flex">
        <form action="validaregistro.php" method="POST" class="col-4 box mt">

        <div class="row justify-content-center">
            <div class="col-12 form-group">  
                <h2 class="text-center">Registro</h4>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <label for="">Nombre Completo</label>
                <input type="text" name="fullname" class="form-control" placeholder="Nombre Completo">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <label for="">Tipo de usuario</label>
                <select name="rol" class="form-control">
                    <option value="Cliente">Cliente</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Colaborador">Colaborador</option>
                </select>
            </div>
        </div>
        
        <div class="row justify-content-center">    
            <div class="col-12 form-group">
                <label for="">Correo</label>
                <input type="mail" name="mail" class="form-control" placeholder="Correo">
            </div>
        </div>
        
        <div class="row justify-content-center">    
            <div class="col-12 form-group">
                <label for="">Nombre de usuario</label>
                <input type="text" name="username" class="form-control" placeholder="Nombre de usuario">
            </div>
        </div>    
        
        <div class="row justify-content-center">    
            <div class="col-12 form-group">
                <label for="">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
        </div>
        
        <div class="row justify-content-center">        
            <div class="col-12 form-group">
                <input type="submit" class="form-control subnewuser btn btn-success" value="Registrarse">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="form-group col-12">
                <input type="button" onclick="location.href='index.php';" value="Inicio" class="btn btn-primary form-control" />
            </div>
        </div>

        </div>
        </form>
    </div>

<?php require("footer.php"); ?>    