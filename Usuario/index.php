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
                                <th>Nome</th>
                                <th>Rg</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Tipo</th>
                                <th>Unidade</th>
                                <th colspan="4" style="text-align:center">Ação</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../banco.php';
                            $pdo = Banco::conectar();
                            //$sql = 'SELECT * FROM usuario ORDER BY idusuario DESC';

                            $sql = "Select usuario.idusuario, usuario.nome,usuario.rg, usuario.cpf, usuario.telefone, usuario.senha, perfil.idperfil, perfil.perfil, unidade.idunidade, unidade.nomeunid  from  usuario Inner Join perfil  on usuario.Perfil_idperfil = perfil.idperfil Inner Join unidade on usuario.Unidade_idunidade = unidade.idunidade";
                            foreach ($pdo->query($sql)as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['nome'] . '</td>';
                                echo '<td>' . $row['rg'] . '</td>';
                                echo '<td>' . $row['cpf'] . '</td>';
                                echo '<td>' . $row['telefone'] . '</td>';
                                echo '<td>' . $row['perfil'] . '</td>';
                                echo '<td>' . $row['nomeunid'] . '</td>';

                                echo '<td><a class="glyphicon glyphicon-pencil btn btn-warning posicao" href="atualizar.php?idusuario=' . $row['idusuario'] . '"></a></td>';
                                echo ' ';
                                echo '<td><a class="glyphicon glyphicon-trash btn btn-danger posicao" href="excluir.php?idusuario=' . $row['idusuario'] . '"></a></td>';

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
