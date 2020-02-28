<?php require("cabecera.php"); ?>

        <div class="login-box login-boxx container d-flex justify-content-center">
           <form action="validar.php" method="POST" class="box col-4">
    
            <div class="row justify-content-center ">
                <div class="col-12">
                    <h1 class="text-center">Acceso</h1>
                </div>
            </div>
              
            <div class="row justify-content-center">
                <div class="textbox form-group col-12">
                    <input type="text" class="form-control" placeholder="&#128100;Usuario" name="username" id="username" required autofocus/>
                </div>
            </div>    
            
            <div class="row justify-content-center">
                <div class="textbox form-group col-12">
                    <input type="password" class="form-control" placeholder="&#x1f512;Contraseña" name="password" id="password" required />
                </div>
            </div>    
             
            <div class="row justify-content-center">
                <div class="form-group col-12">
                    <input type="submit" name="btn" value="Ingresar" class="btn btn-success form-control" />
                </div>
            </div>
         
            <div class="row justify-content-center">
                <div class="form-group col-12">
                    <input type="button" onclick="location.href='nuevouser.php';" value="Registrarse" class="btn btn-primary form-control" />
                </div>
            </div>

            </form>
        </div>
    
<?php require("footer.php"); ?>        