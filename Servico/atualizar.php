<?php
require '../banco.php';

$id = null;
if (!empty($_GET['idservico'])) {
    $id = $_REQUEST['idservico'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    //Acompanha os erros de validação
    $nomeErro = null;
    $descricaoErro = null;
    $disponivelErro = null;


    $nome = $_POST['nome'];

    $descricao = $_POST['descricao'];
    $disponivel = $_POST['disponibilidade'];


    //Validaçao dos campos:
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o campo!';
        $validacao = false;
    }

    if (empty($descricao)) {
        $descricaoErro = 'Por favor digite o campo!';
        $validacao = false;
    }

    if (empty($disponivel)) {
        $disponivelErro = 'Por favor digite o campo!';
        $validacao = false;
    }



    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE servico  set nome = ?, descricao = ?, disponibilidade = ? WHERE idservico = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $descricao, $disponivel, $id));
        Banco::desconectar();
        $msg = "Atualizado com sucesso";
          echo "<script>";
          echo "window.location.href ='index.php?msg={$msg}';";
          echo "</script> "; 
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM servico where idservico = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];


    $descricao = $data['descricao'];
    $disponivel = $data['disponibilidade'];



    Banco::desconectar();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <style>
            *{
                margin: 0;
                padding: 0;
            }  
            #confirmacao{
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background-color: white;
                position: fixed;
                display: none;
            }
            #confirmacao:target{
                display: block;
            }
            #confirmacao:target ~.geraloculto{
                top: 150px;
                transition: all .3s;
                transition-delay:.2s;  
            }

            .geraloculto{
                width: 100%;
                height: 405px;
                position: absolute;
               
                
                top:-810px;

            }
            .campooculto{
                width: 100%;
                position: absolute;

            }
            #fechar{
                
                margin-left: 15px;
                position: absolute;
                
                
                
                
            }
            #fechar:hover{
                opacity: .6;
            }
        </style>
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
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">
                    <h3 class="well"> Atualizar </h3>
                    <form class="form-horizontal" action="atualizar.php?idservico=<?php echo $id ?>" method="post">
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($nomeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Serviço</label>
                            <div class="controls">
                                <input size= "50" name="nome" type="text" placeholder="Serviço" required="" value="<?php echo!empty($nome) ? $nome : ''; ?>">
                                <?php if (!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!------------------------------------------------------------------------------------------->

                        <div class="control-group <?php echo!empty($descricaoErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Descrição</label>
                            <div class="controls">
                                <input size="80" name="descricao" type="text" placeholder="Descrição do serviço" required="" value="<?php echo!empty($descricao) ? $descricao : ''; ?>">
                                <?php if (!empty($descricaoErro)): ?>
                                    <span class="help-inline"><?php echo $descricaoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <label class="control-label">Disponível</label>
                        <select name="disponibilidade">

                            <option  required="" value="Sim">Sim</option>
                            <option value="Não">Não</option>

                        </select> 
                        <!------------------------------------------------------------------------------------------->

                        <div class="form-actions">
                            <br/>
                            <a href="#confirmacao" class="btn btn-success">Atualizar</a>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                        <div id="confirmacao"></div>
                        <div class="geraloculto">
                            <div id="campooculto form-actions" style="margin-left:25%;  width: 40%;">
                                <div class="alert alert-danger">Deseja realmente atualizar o serviço?</div></br>
                                <div>
                                    <button type="submit" class="btn btn-success" style="margin-left:40%;">Sim</button>
                                    <a href=""id="fechar" class="btn btn-default">Não</a>
                                </div>
                              
                            </div>
                           

                        </div>




                    </form>
                </div>
            </div>



        </div> 
    </body>
</html>

