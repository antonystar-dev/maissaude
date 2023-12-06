<!DOCTYPE html>
<?php
//session_start();
//include 'validaLogin.php';
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>+ Saude</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="../css/bootstrap3.3/css/bootstrap.min.css">
        <style>
    
 body, 
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
    background: #e74c3c;
}
.sub-menu {
    background: #e74c3c;
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
    background: #DF4545 ;
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
    background: #DF4545;
}
.sub-menu .sub-menu {
    top: 0;
    left: 100%;
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
                    <li><a href="../Servico/index.php"class="text-danger">Inicio</a></li>
                    
                    
                    <li><a href="../Servico">Servicos</a>
                        <ul class="sub-menu clearfix">
                            <li><a href="../Servico/cadastrar.php"class="text-danger">Cadastrar</a></li>
                            <li><a href="../Servico/index.php"class="text-danger">Listar</a></li>
                            

                        </ul>
                    </li>

                    <li ><a href="#">Funcionário</a>
                        
                        <ul class="sub-menu clearfix">
                            <li>
                                <a href="#"><?php
                            echo $_SESSION["nome"];
                          
                            
                           
                            ?></a>
                                <li><a href="../">Mapa</a></li>
                                
                                <a href="../Login/sair.php">Sair</a>
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






