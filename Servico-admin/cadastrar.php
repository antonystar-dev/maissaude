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
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">

                    <form class="form-horizontal" action="cadastrar.php" method="post">
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($nomeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Serviço</label>
                            <div class="controls">
                                <input size= "50" name="nome" type="text" placeholder="Nome do serviço" required="" value="<?php echo!empty($nome) ? $nome : ''; ?>">
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
                          <label class="control-label">Unidade</label> 
                        <select name="Unidade_idunidade">          
                            <?php
                            require '../banco.php';
                            $pdo = Banco::conectar();
                            //$sqll = "Select * from usuario inner JOIN unidade on usuario.Unidade_idunidade ";
                            $sqll = "select * from unidade";
                            foreach ($pdo->query($sqll)as $listaunidade) {
                                echo ' <option value=' . $listaunidade['idunidade'] . '>' . $listaunidade['nomeunid'] . '</option>';
                            }
                            Banco::desconectar();
                            ?>
                        </select>                 
                        <!------------------------------------------------------------------------------------------->

                        <label class="control-label">Disponível</label>
                        <select name="disponibilidade">

                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>


                        </select> 
                        <!------------------------------------------------------------------------------------------->




                      

                        
                        
                        
                        
                        
                        <div class="form-actions">
                            <br/>

                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>

                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>


<?php
//require '../banco.php';

if (!empty($_POST)) {
    //Acompanha os erros de validação
    $nomeErro = null;
    $descricaoErro = null;
   
    
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $disponivel = $_POST['disponibilidade'];
    $unidade = $_POST['Unidade_idunidade'];
     
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

    


    //Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO servico (nome,descricao,disponibilidade, Unidade_idunidade) VALUES(?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $descricao, $disponivel,$unidade));
        Banco::desconectar();
        $msg = "Gravado com sucesso";
          echo "<script>";
          echo "window.location.href ='index.php?msg={$msg}';";
          echo "</script> "; 
    }
}
?>
