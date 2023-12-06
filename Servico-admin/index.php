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
                             include '../configuracao/menuFuncionario.php';
                            break;
                        }
                    ?></div>
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
               
                </br>
                <div class="row">


                    <table border="0" class="table table-striped table- table-hover ">
                        <thead>
                            <tr>
                              
                                <th>Servicccços</th>
                                <th>Descrição</th>
                                <th>Disponível</th>
                                <th>Unidade</th>
                               
                                
                                <th colspan="4" style="text-align:center">Ação</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../banco.php';
                            $pdo = Banco::conectar();
                            //$sql = 'SELECT * FROM usuario ORDER BY idusuario DESC';

                            //$sql = "select * from servico inner join unidade on servico.Unidade_idunidade";
                           $sql = "select * from servico inner join unidade ON unidade.idunidade= Unidade_idunidade";
                            //$sql = "select * from servico inner join unidade ON unidade.idunidade= Unidade_idunidade";

                            foreach ($pdo->query($sql)as $row) {
                                echo '<tr>';
                                
                                echo '<td>' . $row['nome'] . '</td>';
                                echo '<td>' . $row['descricao'] . '</td>';
                                echo '<td>' . $row['disponibilidade'] . '</td>';
                                echo '<td>' . $row['nomeunid'] . '</td>';
                         
                               
                               
                               
                                echo '<td><a class="glyphicon glyphicon-pencil btn btn-warning posicao" href="atualizar.php?idservico=' . $row['idservico'] . '"></a></td>';
                                echo ' ';
                                echo '<td><a class="glyphicon glyphicon-trash btn btn-danger posicao" href="excluir.php?idservico=' . $row['idservico'] . '"></a></td>';

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
