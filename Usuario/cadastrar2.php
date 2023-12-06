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
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">
                   
                    <form class="form-horizontal" action="cadastrar.php" method="post">
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($nomeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input size= "50" name="nome" type="text" placeholder="Nome" required="" value="<?php echo!empty($nome) ? $nome : ''; ?>">
                                <?php if (!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------->
                        
                        <div class="control-group <?php echo!empty($rgErro) ? 'error ' : ''; ?>">
                            <label class="control-label">RG</label>
                            <div class="controls">
                                <input size="80" name="rg" type="text" placeholder="0.000.000" required="" value="<?php echo!empty($rg) ? $rg : ''; ?>">
                                <?php if (!empty($rgErro)): ?>
                                    <span class="help-inline"><?php echo $rgErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($cpfErro) ? 'error ' : ''; ?>">
                            <label class="control-label">CPF</label>
                            <div class="controls">
                                <input size="35" name="cpf" type="text" placeholder="000.000.000-00" required="" value="<?php echo!empty($cpf) ? $cpf : ''; ?>">
                                <?php if (!empty($cpfErro)): ?>
                                    <span class="help-inline"><?php echo $cpfErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($telefoneErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Telefone</label>
                            <div class="controls">
                                <input size="40" name="telefone" type="text" placeholder="(00)0000-0000" required="" value="<?php echo!empty($telefone) ? $telefone : ''; ?>">
                                <?php if (!empty($telefoneErro)): ?>
                                    <span class="help-inline"><?php echo $telefoneErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------->
                        
                        <div class="control-group <?php echo!empty($senhaErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Senha</label>
                            <div class="controls">
                                <input size= "50" name="senha" type="text" placeholder="Digite a senha" required="" value="<?php echo!empty($senha) ? $senha : ''; ?>">
                                <?php if (!empty($senhaErro)): ?>
                                    <span class="help-inline"><?php echo $senhaErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($perfilErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Tipo</label>
                            <div class="controls">
                                <input size= "50" name="Perfil_idperfil" type="text" placeholder="Tipo de perfil" required="" value="<?php echo!empty($perfil) ? $perfil : ''; ?>">
                                <?php if (!empty($perfilErro)): ?>
                                    <span class="help-inline"><?php echo $perfilErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($unidadeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Unidade</label>
                            <div class="controls">
                                <input size= "50" name="Unidade_idunidade" type="text" placeholder="Unidade" required="" value="<?php echo!empty($unidade) ? $unidade : ''; ?>">
                                <?php if (!empty($unidadeErro)): ?>
                                    <span class="help-inline"><?php echo $unidadeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="form-actions">
                            <br/>

                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>

                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>


<?php
require '../banco.php';

if (!empty($_POST)) {
    //Acompanha os erros de validação
    $nomeErro = null;
    $rgErro = null;
    $cpfErro = null;
    $telefoneErro = null;
    $senhaErro = null;
     $perfilErro = null;
    $unidadeErro = null;

    $nome = $_POST['nome'];
   
     $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
      $senha = $_POST['senha'];
      $perfil = $_POST['Perfil_idperfil'];
    $unidade = $_POST['Unidade_idunidade'];

    //Validaçao dos campos:
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o campo!';
        $validacao = false;
    }
   

    if (empty($rg)) {
        $rgErro = 'Por favor digite o campo!';
        $validacao = false;
    }

    if (empty($cpf)) {
        $cpfErro = 'Por favor digite o campo!';
        $validacao = false;
    }

    
    if (empty($telefone)) {
        $telefoneErro = 'Por favor digite o campo!';
        $validacao = false;
    }
     if (empty($senha)) {
        $senhaErro = 'Por favor digite o campo!';
        $validacao = false;
    } if (empty($perfil)) {
        $perfilErro = 'Por favor digite o campo!';
        $validacao = false;
    }
    if (empty($unidade)) {
        $unidadeErro = 'Por favor digite o campo!';
        $validacao = false;
    }

    //Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuario (nome,rg,cpf, telefone,senha,Perfil_idperfil,Unidade_idunidade) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $rg, $cpf, $telefone,$senha,$perfil, $unidade));
        Banco::desconectar();
        header("Location: index.php");
    }
}
?>
