<!DOCTYPE html>
<?php

?> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>+ Saúde</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
       <link rel="stylesheet" href="../css/bootstrap3.3/css/bootstrap.min.css">
        <style>
    
 
.menu,
.sub-menu {
    margin: 0;
    padding: 0;
}
.clearfix:after{
    content: '.';
    display: block;
    clear: both;
    height: 0;
    line-height: 0;
    font-size: 0;
    visibility: hidden;
    overflow: hidden;
}
.menu,
.sub-menu {
    list-style: none;
    background: #00b7ef;
}
.sub-menu {
    background: #00b7ef;
}
.menu a {
    text-decoration: none;
    display: block;
    padding: 10px;
    color: #fff;
    font-family: sans-serif;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 700;
}
.menu li {
    position: relative;
}
.menu > li {
    float: left;
}
.menu > li:hover {
    background: #6666;
}
.menu li:hover > .sub-menu {
    display: block;
}
.sub-menu {
    display: none;
    position: absolute;
    min-width: 150px;
}
.sub-menu li:hover {
    background: #6666;
}
.sub-menu .sub-menu {
    top: 0;
    left: 100%;
}
.btn-primary{
    background-color: #00A6FF;
    border:none;
}
</style>
    </head>
    <body>
        <?php
                            
                             
               
                 $asdf=$_SESSION["Unidade_idunidade"];
                            ?>
        <div class="container menu-container ">
            <div>		
                <ul class="menu clearfix">
                    <li><a href="../Servico-admin/index.php"class="text-danger">Inicio</a></li>
                    <li  ><a href="../Usuario/">Usuarios</a>
                        <ul class="sub-menu clearfix">
                            <li><a href="../Usuario/cadastrar.php" class="text-danger">Cadastrar</a></li>
                            <li><a href="../Usuario/index.php"class="text-danger">listar</a></li>
                        </ul>
                    </li>
                    <li><a href="../Unidade/">Unidades</a>
                        <ul class="sub-menu clearfix">
                            <li><a href="../Unidade/cadastrar.php"class="text-danger">Cadastrar</a></li>
                            <li><a href="../Unidade/index.php"class="text-danger">Lista</a></li>
                        </ul>
                    </li>
                    <li><a href="../Servico-admin">Serviços</a>
                        <ul class="sub-menu clearfix">
                            <li><a href="../Servico-admin/cadastrar.php"class="text-danger">Cadastrar</a></li>
                            <li><a href="../Servico-admin/index.php"class="text-danger">Listar</a></li>

                        </ul>
                    </li>

                    <li ><a href="../Usuario/index.php">Administrador</a>
                        
                        <ul class="sub-menu clearfix">
                            <li>
                                <a href="#"><?php
                            echo $_SESSION["nome"]; ?></a>
                                <a href="../index.php">Mapa</a>

                                <a href="../Login/sair.php" >Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <hr>
        </div>
        <div>
        </div>
    </body>
</html>






