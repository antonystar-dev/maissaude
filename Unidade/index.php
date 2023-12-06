<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

    </head>

    <body>
        <div class="menustyle"><?php
            session_start();
            include '../Login/validaLogin.php';
            switch ($_SESSION["perfil"]) {
                case "Administrador":
                    include '../configuracao/menuAdministrador.php';
                    break;
                case "Funcionario":
                    header("location:../");
                    break;
            }
            ?></div>
    <center>


        <div class='text-danger'>

            
        </div>
    </center>
   
       
    
    <div>
        <div class="container">

            
            <?php
            if (!empty($_GET["msg"])) {
               echo "<div class='alert alert-success alert-dismissible'>";
        echo "<a href='index.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  ";
                echo $_GET["msg"];
        echo "</div>";
            }
            ?>
            
            <div class="row">



                <table border="0" class="table table-striped table- table-hover ">
                    <thead>
                        <tr>
                            <th>Unidade</th>
                            <th>Endereço</th>
                            <th>CEP</th>
                            <th>Telefone</th>
                            <th>Latitude</th>
                            <th>Longitude</th>


                            <th colspan="4" style="text-align:center">Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../banco.php';
                        $pdo = Banco::conectar();
                        //$sql = 'SELECT * FROM usuario ORDER BY idusuario DESC';

                        $sql = "select * from unidade";
                        foreach ($pdo->query($sql)as $row) {
                            echo '<tr>';
                            
                            echo '<td>' . $row['nomeunid'] . '</td>';
                            echo '<td>' . $row['endereco'] . '</td>';
                            echo '<td>' . $row['cep'] . '</td>';
                            echo '<td>' . $row['telefone'] . '</td>';
                            echo '<td>' . $row['latitude'] . '</td>';
                            echo '<td>' . $row['longetude'] . '</td>';

                            //echo "<td><div><img src='../imagens/" . $row["imagem"] . "'  width='50' /></div></td>";

                            echo '<td><a class="glyphicon glyphicon-pencil btn btn-warning posicao" href="atualizar.php?idunidade=' . $row['idunidade'] . '"></a></td>';
                            echo ' ';
                            echo '<td><a class="glyphicon glyphicon-trash btn btn-danger posicao" href="excluir.php?idunidade=' . $row['idunidade'] . '"></a></td>';

                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>                   
                </table>               
            </div>
        </div>
    </div>
</body>
</html>
