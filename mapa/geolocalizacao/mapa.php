<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" href="../imagens/icon.png" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWCDPxblmnChMQbJFpNyeB3w9xMFRWiZM"></script>   
    </head>
    <body>
        <?php
        require_once '../clienteDAO.php';
        $idcliente = $_GET["id"];
        $clienteDAO = new ClienteDAO();
        $cliente = $clienteDAO->getClienteById($idcliente);
        ?>
<center>
        <a href="../listarAllCliente.php" style="color: #ffffff;
           background: #80cc0c;padding: 10px 20px;
           display: inline-block;
           margin: 0 8px !important;
           border: 1px solid #80cc0c;
           text-decoration: none;">Voltar</a>
    </center>
        <input type="hidden" name="idcliente" value="<?php echo $cliente["idcliente"] ?>"/> 
        <input type="hidden" id="empresa"  value="<?php echo $cliente["empresa"] ?>" />
        <input type="hidden" id="cardapio"  value="<?php echo $cliente["cardapio"] ?>" />
        <input type="hidden" id="imagem"  value="<?php echo $cliente["imagem"] ?>" />
        <input type="hidden" id="lagitude"  value="<?php echo $cliente["latitude"] ?>" />
        <input type="hidden" id="longitude"  value="<?php echo $cliente["longetude"] ?>" />
        

        <script type="text/javascript" src="js/map.js"></script>
        <div id="map-canvas" style="width: 100%; height:350%; margin-top:60px;"></div>
        <br>
</body>
</html>