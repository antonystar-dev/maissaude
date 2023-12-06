<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>+ Saude</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .topo{

                margin-left: 100%;





            } 
        </style>
    </head>
    <body>
        <div class="container">
            <div style="position:fixed;">
                <?php
                require_once './configuracao/menu.php';
                ?>
            </div>

            <?php
            if (!empty($_GET["msg"])) {
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<a href='index.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  ";
                echo $_GET["msg"];
                echo "</div>";
            }
            ?>

 <!--<iframe scrolling="no" width="100%" height="50px" frameborder="1" src="menu.php"></iframe>-->
            <iframe scrolling="no" width="100%" height="500px" frameborder="0" src="mapa/geolocalizacao/todosmapa.php"></iframe>
            <iframe scrolling="yes" width="100%" height="300px" name="pesquisa" frameborder="0" src=""></iframe>
            <div>
                <div>
                    <a name="upa"></a>
                    <br><br><br><br>
                    <h3>O que é upa?</h3>
                    <p> A UPA, sigla de Unidade de Pronto Atendimento, é um serviço intermediário entre a atenção básica (ESF/UBS) e as unidades hospitalares. Trata-se de uma unidade de saúde que funciona em horário integral, inclusive nos fins de semana. É um novo modelo de atendimento, um novo conceito em saúde. A unidade está equipada para atender aos usuários em necessidades de pronto atendimento e qualquer situação de emergência.</p>
                    <p>UPA tem consultórios de clínica médica, pediatria e odontologia, serviços de laboratório e raio-x. Também conta com leitos de observação para adultos e crianças, salas de medicação, nebulização, ortopedia e uma "sala de emergência", para estabilizar os pacientes mais graves até serem levados a um hospital. A UPA 24 horas também está preparada para realizar pequenas suturas </p>
                    <img src="imagens/UPA.jpg">
                </div>
                <div>
                    <a name="hospital"></a>
                    <br><br><br><br>
                    <h3>O que é Hospital?</h3>
                    <p>Hospital é um local destinado ao atendimento de doentes, para proporcionar o diagnóstico, que pode ser de vários tipos (laboratorial, clínico, cinesiológico-funcional) e o tratamento necessário. Documenta-se o vocábulo português "hospital" no século XVI talvez por influência do francês "hôpital" do século XII derivados da forma culta do latim "hospitale" relativo a hospede, hospitalidade, adjetivo neutro substantivado de "hospitalis (domus) - (casa) que hospeda.[1]</p>

                    <p>Historicamente, os hospitais surgiram como lugares de acolhida de doentes e peregrinos, durante a Idade Média. A denominação "Hotel-Dieu", que foi empregada para um conjunto de instituições francesas do século VII, já traz em si a noção de hospedagem e o caráter religioso que caracterizou a origem dessa instituição na Europa.[2][3] Acredita-se que o 1º "Hotel-Dieu" foi fundado em Paris nos anos 651 ou 829 (reconstruído ?) de nossa era. Rosen (o.c.)</p>
                    <img src="imagens/hospital.png">
                </div>

            </div>
            <div>
                <a name="ubs"></a>
                <br><br><br><br>
                <h3>O que é UBS?</h3>
                <p>As Unidades Básicas de Saúde (UBS) são popularmente conhecidas como postos de saúde. São locais onde o cidadão pode receber, gratuitamente, os atendimentos essenciais em saúde da criança, da mulher, do adulto e do idoso, em odontologia, ter acesso a medicamentos e outros atendimentos primários. As Unidades Básicas de Saúde resolvem 80% dos problemas de saúde da população do território que ela é responsável e promovem hábitos saudáveis de vida. </p>
                <img src="imagens/ubs.jpg">
            </div>
<div>
            <?php
            require_once './configuracao/rodape.php';
            ?>
        </div>
        </div>
        


    </body>
</html>






