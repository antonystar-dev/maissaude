<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>    
        <link rel="stylesheet" href="../css/bootstrap3.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="Jquery/demos/css/themes/default/jquery.mobile.theme-1.4.5.min.css" type="text/css">
        <link rel="stylesheet" href="Jquery/demos/css/themes/default/jquery.mobile.theme-1.4.5.min.css" type="text/css"/>
        <link rel="stylesheet" href="Jquery/demos/css/themes/default/jquery.mobile.icons-1.4.5.min.css" type="text/css">
        <link rel="stylesheet" href="Jquery/jquery.mobile.structure-1.4.5.min.css" type="text/css"/>
        <link rel="stylesheet" href="Jquery/jquery.mobile.structure-1.4.5.min.css" type="text/css">

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
            .th1{background-color: #474e5d; /* Dark Blue */
                 color: #ffffff;text-align: center;}
            </style>
        </head>
        <body>
            <nav class="navbar bg-4 navbar-default">
            <div class="container">
                <h3><i class="fa fa-users fa-2x"  aria-hidden="true"></i>Lista FoodTrucks</h3>
            </div>
        </nav>
        <div class="container-fluid bg-1">
            <div class="container-fluid bg-3">
                <?php
                require_once 'clienteDAO.php';
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->getAllCliente();
                echo "<table data-role='table' data-mode='columntoggle' data-column-btn-text='+Colunas' data-column-btn-theme='b' id='minhatabela' class='ui-responsive table-stroke table-stripe'>";
                echo " <thead>";
                echo "<tr>";
                echo "  <th data-priority='1' style='background-color: #2b669a;; 
                color: #ffffff;'>Nome da Empresa</th>";
                echo "  <th data-priority='2' style='background-color: #2b669a;; 
                color: #ffffff;'>Especialidade</th>";
                echo "  <th data-priority='3' style='background-color: #2b669a;; 
                color: #ffffff;'>Logomarca</th>";
                echo "  <th data-priority='4' style='background-color: #2b669a;; 
                color: #ffffff;text-align: center;'>Excluir</th>";
                echo "  <th data-priority='4' style='background-color: #2b669a;; 
                color: #ffffff;text-align: center;'>Alterar</th>";
                echo "  <th data-priority='4' style='background-color: #2b669a;; 
                color: #ffffff;text-align: center;'>Localização</th>";
                echo "</tr>";
                echo " </thead>";
                foreach ($clientes as $c) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "  <td>{$c["empresa"]}</td>";
                    echo "  <td>{$c["cardapio"]}</td>";
                    echo "<td width='30' height='20' valign='middle'><div align='center'><img src='upload/" . $c["imagem"] . "' class='img-circle'"
                    . " width='120' height='100' /></div></td>";
                    echo "  <td style='text-align: center;'><a href='excluirClienteByIdController.php?id={$c["idcliente"]}'onclick=\"return confirm('Tem certeza que deseja EXCLUIR esse registro?'); return false;\" class='glyphicon glyphicon-remove'></a></td>";
                    echo "  <td style='text-align: center;'><a href='formAlterarCliente.php?id={$c["idcliente"]}'onclick=\"return confirm('Tem certeza que deseja EDITAR esse registro?'); return false;\" class='glyphicon glyphicon-pencil'></a></td>";
                    echo "  <td style='text-align: center;'><a href='geolocalizacao/mapa.php?id={$c["idcliente"]}'><i class='fa fa-map-marker fa-2x' aria-hidden='true'>fff</i></a></td>";
                    echo "</tr>";
                    echo "</tbody>";
                }

                echo "</table>";
                ?>
            </div>
        </div>
    </body>
</html>