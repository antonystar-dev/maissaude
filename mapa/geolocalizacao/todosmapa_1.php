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
 <center>
        <a href="../view/home.php" style="color: #ffffff;
           background: #80cc0c;padding: 10px 20px;
           display: inline-block;
           margin: 0 8px !important;
           border: 1px solid #80cc0c;
           text-decoration: none;">Voltar</a>
    </center>
        <?php
        require_once '../dao/clienteDAO.php';
        $clienteDAO = new ClienteDAO();
        $clientes = $clienteDAO->getAllCliente();
        ?>
        <?php
        foreach ($clientes as $c) {
            echo "<input type='hidden' class='empresa' name='empresa[]' value='{$c["empresa"]}'/> ";
            echo "<input type='hidden' class='cardapio' name='cardapio[]' value='{$c["cardapio"]}'/> ";
            echo "<input type='hidden' class='latitude' name='latitude[]' value='{$c["latitude"]}'/> ";
            echo "<input type='hidden' class='longetude' name='longetude[]' value='{$c["longetude"]}'/> ";
            echo "<input type='hidden' class='imagem' name='imagem[]' value='{$c["imagem"]}'/> ";
        }
        ?>
        <script type="text/javascript" src="js/map2.js"></script>
        <div id="map-canvas" style="width: 100%; height:350%; margin-top:60px;"></div>
        <br>
    
</body>
</html>