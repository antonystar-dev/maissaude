<?php
require '../banco.php';

$id = null;
if (!empty($_GET['idusuario'])) {
    $id = $_REQUEST['idusuario'];
}

if (null == $id) {
    header("Location: index.php");
}

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
    }
    if (empty($perfil)) {
        $perfilErro = 'Por favor digite o campo!';
        $validacao = false;
    }
    if (empty($unidade)) {
        $unidadeErro = 'Por favor digite o campo!';
        $validacao = false;
    }
    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario  set nome = ?, rg = ?, cpf = ?, telefone = ?, senha=?, Perfil_idperfil =?,Unidade_idunidade = ? WHERE idusuario = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $rg, $cpf, $telefone, $senha, $perfil, $unidade, $id));
        Banco::desconectar();
       $msg = "Atualizado com sucesso";
          echo "<script>";
          echo "window.location.href ='index.php?msg={$msg}';";
          echo "</script> "; 
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "SELECT * FROM usuario where idusuario = ?";
    //$sql = "Select *,usuario.telefone as tu from usuario inner JOIN unidade on usuario.Unidade_idunidade where idusuario = ? ";
    $sql = "Select *,usuario.telefone as tu from usuario inner JOIN unidade on usuario.Unidade_idunidade= unidade.idunidade where idusuario = ? ";

    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];


    $rg = $data['rg'];
    $cpf = $data['cpf'];
    $telefone = $data['tu'];
    $senha = $data['senha'];
    $perfil = $data['Perfil_idperfil'];
    $unidade = $data['nomeunid'];
    $unidadeid = $data['idunidade'];

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
                    header("location:../");
                    break;
            }
            ?></div>
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">
                    <h3 class="well"> Atualizar </h3>
                    <form class="form-horizontal" action="atualizar.php?idusuario=<?php echo $id ?>" method="post">
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
                                <input size="50" name="rg" type="text" placeholder="0.000.000" required="" value="<?php echo!empty($rg) ? $rg : ''; ?>">
                                <?php if (!empty($rgErro)): ?>
                                    <span class="help-inline"><?php echo $rgErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($cpfErro) ? 'error ' : ''; ?>">
                            <label class="control-label">CPF</label>
                            <div class="controls">
                                <input size="50" name="cpf" type="text" placeholder="000.000.000-00" required="" value="<?php echo!empty($cpf) ? $cpf : ''; ?>">
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
                            <label class="control-label" >Senha</label>
                            <div class="controls">
                                <input size="1" name="senha" type="text" placeholder="Digite a senha" required="" value="<?php echo!empty($senha) ? $senha : ''; ?>">
                                <?php if (!empty($senhaErro)): ?>
                                    <span class="help-inline"><?php echo $senhaErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->



                        <label class="control-label">Perfil</label>
                        <select name="Perfil_idperfil">




                            <?php
                            if ($perfil == "1") {
                                echo "<option value='1' selected>Administrador</option>";
                                echo "<option value='2'>Funcionario</option>";
                            } else {
                                echo "<option value='2' selected>Funcionario</option>";
                                echo "<option value='1'>Administrador</option>";
                            }
                            ?>


                        </select> 

                        <!------------------------------------------------------------------------------------------->

                            
                        <label class="control-label">Unidade</label> 
                        <select name="Unidade_idunidade">  

                            <?php
                            $pdo = Banco::conectar();
                            $sqll = "select * from unidade";
                            foreach ($pdo->query($sqll)as $listaunidade) {

                                echo ' <option value=' . $listaunidade['idunidade'] . '>' . $listaunidade['nomeunid'] . '</option>';
                            }


                            Banco::desconectar();
                            ?>
                            <option value="<?php echo$unidadeid; ?>" selected><?php echo$unidade; ?></option>
                        </select> 



                        <div class="form-actions">
                            <br/>
                            <a href="#confirmacao" class="btn btn-success">Atualizar</a>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                        <div id="confirmacao"></div>
                        <div class="geraloculto">
                            <div id="campooculto form-actions" style="margin-left:25%;  width: 40%;">
                                <div class="alert alert-danger">Deseja realmente atualizar o usuário?</div></br>
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

