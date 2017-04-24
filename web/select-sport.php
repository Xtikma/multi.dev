<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seleccionar Deporte</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet"  type="text/css" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="row text-center text-uppercase text-primary"><h1 for="Deporte">Seleccionar Deporte:</h1></div>
            <div class="row col-md-4 col-md-offset-4 text-center">
                <div class="form-group">
                    <select id="deporte">
                        <option value="0">Futbol</option>
                        <option value="1">Baloncesto</option>
                        <option value="2">Voleibol</option>
                        <option value="3">Natación</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="sexo">
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                    </select>
                </div>
            </div>


            <?php
                session_start();
                $_SESSION["username"]=$_REQUEST["user"];
                $_SESSION["password"]=$_REQUEST["pass"];
            ?>
            <script src="js/jquery-3.2.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
    </body>
</html>
