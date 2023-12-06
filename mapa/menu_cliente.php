<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            img{margin-top: -16px;}
            footer{
                background-color: #222;
                color: #9d9d9d;
                text-align: center;
                width: 98%;
                margin-left: 15px;
            }
            footer:hover{color: white;
            </style>
        </head>
        <body>
            <div class="container" style="width: 100%;margin-top: 5px;">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><img src="../imagens/icon.png" width="100" height="50"></a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="home.php" target="centro">Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastro Foodtrucks<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="formCadastrarCliente.php" target="centro">Cadastrar Cliente</a> </li>
                                    <!--<li> <a href="listarAllCliente.php" target="centro">Listar Cliente</a></li>-->
<!--                                    <li> <a href="../geolocalizacao/todosmapa.php" target="centro">Localização</a></li>-->
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <?php
                                if (isset($_SESSION["usuario"])) {
                                    echo "<a style='text-transform:uppercase;'><span class='glyphicon glyphicon-user'> " . $_SESSION['usuario'] . " | " . $_SESSION["perfil"] . "</span></a>";
                                }
                                ?>
                            </li>
                            <li><a href='../controller/logoffController.php'><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </body>
    </html>