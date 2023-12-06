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
        require_once '../../Unidade/unidadeDAO.php';
        $unidadeDAO = new UnidadeDAO();
        $unidades = $unidadeDAO->getAllUnidade();
        ?>

    <?php
    foreach ($unidades as $c) {
        echo "<input type='hidden' class='nomeunid' name='nomeunid[]' value='{$c["nomeunid"]}'/> ";
        echo "<input type='hidden' class='endereco' name='endereco[]' value='{$c["endereco"]}'/> ";
           echo "<input type='hidden' class='cep' name='cep[]' value='{$c["cep"]}'/> ";
              echo "<input type='hidden' class='telefone' name='telefone[]' value='{$c["telefone"]}'/> ";
        echo "<input type='hidden' class='latitude' name='latitude[]' value='{$c["latitude"]}'/> ";
        echo "<input type='hidden' class='longetude' name='longetude[]' value='{$c["longetude"]}'/> ";
        echo "<input type='hidden' class='imagem' name='imagem[]' value='{$c["imagem"]}'/> ";
        echo "<input type='hidden' class='asdf' name='nomeunid[]' value='{$c["nomeunid"]}'/> ";
    }
    ?>
    <script type="text/javascript" src="js/map2.js"></script>
    <div id="map-canvas" style="width: 100%; height:350%; margin-top:60px;"></div>
    <br>

</body>
</html>