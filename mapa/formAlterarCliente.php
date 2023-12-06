<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
        <style>
            body {
                font: 20px Montserrat, sans-serif;
                line-height: 1.8;
                color: #f5f6f7;
            }
            p {font-size: 16px;}
            .margin {margin-bottom: 45px;}
            .bg-1 { 
                background-color: #80cc0c; /* azul */
                color: #ffffff;
            }
            .bg-2 { 
                background-color: #474e5d; /* Dark Blue */
                color: #ffffff;
            }
            .bg-3 { 
                background-color: #ffffff; /* White */
                color: #555555;
            }
            .bg-4 { 
                background-color: #2b669a; /* Black Gray */
                color: #fff;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 5px;
            }
            .navbar-nav  li a:hover {
                color: #1abc9c !important;
            }
        </style>
    </head>
    <?php
    require_once 'clienteDAO.php';


    $idcliente = $_GET["id"];
    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->getClienteById($idcliente);
    ?>
    <body>
        <nav class="navbar bg-4 navbar-default">
            <div class="container">
                <h3><i class="fa fa-users fa-2x"  aria-hidden="true"></i>Alterar FoodTrucks</h3>
            </div>
        </nav>
        <div class="container-fluid bg-1">
            <div class="container-fluid bg-3">
                <form action="alterarClienteController.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idcliente" value="<?php echo $cliente["idcliente"] ?>"/>
                    <table  width="100%">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="empresa">Nome da Empresa(Foods):</label><br>
                                    <input type="text" value="<?php echo $cliente["empresa"] ?>" name="empresa" size="50"/>			
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="cardapio">Especialidade(Cardápio Principal)</label><br>
                                    <input type="text" value="<?php echo $cliente["cardapio"] ?>" name="cardapio"/>			
                                </div>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="localizacaolatitude"> <a href="http://www.mapcoordinates.net/pt" onclick="window.open(this.href, 'galeria', 'width=680,height=470'); return false;" title="Galeria de fotos" id="galeria">
                                            Clique Aqui Latidude/Longetude</a></label><br>
                                    <input type="text" value="<?php echo $cliente["latitude"] ?>" name="localizacaolatitude"/>
                                    <input type="text" value="<?php echo $cliente["longetude"] ?>" name="localizacaolongetude"/>	
                                </div>  
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="imagem">Logomarca</label><br>
                                    <input type="file" value="<?php echo $cliente["imagem"] ?>" name="imagem"/>			
                                </div>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="enviar"></label>
                                    <button type="submit" value="Cadastrar" style="color: #ffffff;
                                            background: #80cc0c;padding: 2px 5px;
                                            display: inline-block;
                                            margin: 0 4px !important;
                                            border: 1px solid #80cc0c;">Alterar</button>
                                    <center>
                                        <?php
                                        if (!empty($_GET["msg"])) {
                                            echo $_GET["msg"];
                                        }
                                        ?>
                                    </center>
                                </div>       
                            </td>
                        </tr>
                    </table>
                </form>  
            </div>
        </div>
    </body>
</html>
