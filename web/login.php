<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet"  type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php
            
        ?>
        
        <div class="container">
            <div class="row text-center text-uppercase text-primary"><h1>Inicio de sesión</h1></div>
            <div class="row col-md-4 col-md-offset-4">
                <div class="form-horizontal con">
                    <form action="select-sport.php" method="post" class="form-group">
                        <div class="form-group">                        
                            <label for="username"> Nombre de Usuario</label>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <input class="form-control" type="text" placeholder="Usuario" id="username" name="user">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"> Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input class="form-control" type="password" placeholder="Contraseña" id="password" name="pass">
                            </div>
                        </div>
                        <input type="submit" href="#" class="btn btn-primary btn-md center-block" value="Confirmar"/>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
