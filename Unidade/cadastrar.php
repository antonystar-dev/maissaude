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
                            <label class="control-label">Unidade</label>
                            <div class="controls">
                                <input size= "50" name="nomeunid" type="text" placeholder="Unidade" required="" value="<?php echo!empty($nome) ? $nome : ''; ?>">
                                <?php if (!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!------------------------------------------------------------------------------------------->

                        <div class="control-group <?php echo!empty($enderecoErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Endereço</label>
                            <div class="controls">
                                <input size="80" name="endereco" type="text" placeholder="Endereco" required="" value="<?php echo!empty($endereco) ? $endereco : ''; ?>">
                                <?php if (!empty($enderecoErro)): ?>
                                    <span class="help-inline"><?php echo $enderecoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($cepErro) ? 'error ' : ''; ?>">
                            <label class="control-label">CEP</label>
                            <div class="controls">
                                <input size="35" name="cep" type="text" placeholder="00.000-000" required="" value="<?php echo!empty($cep) ? $cep : ''; ?>">
                                <?php if (!empty($cepErro)): ?>
                                    <span class="help-inline"><?php echo $cepErro; ?></span>
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
                         <div class="control-group <?php echo!empty($latitudeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">latitude</label>
                            <div class="controls">
                                <input size="40" name="latitude" type="text" placeholder="Latitude" required="" value="<?php echo!empty($latitude) ? $latitude : ''; ?>">
                                <?php if (!empty($latitudeErro)): ?>
                                    <span class="help-inline"><?php echo $latitudeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
 <div class="control-group <?php echo!empty($longetudeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">longetude</label>
                            <div class="controls">
                                <input size="40" name="longetude" type="text" placeholder="Longetude" required="" value="<?php echo!empty($longetude) ? $longetude : ''; ?>">
                                <?php if (!empty($longetudeErro)): ?>
                                    <span class="help-inline"><?php echo $longetudeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
               <!------------------------------------------------------------------------------------------->
                        <div class="form-group">
                  
                            <input name="imagem" type="hidden" id="imagem" placeholder="Logomarca" value="logo-MS-mini.png">			
                        </div>  
                        



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
require '../banco.php';

if (!empty($_POST)) {
    //Acompanha os erros de validação
    $nomeErro = null;
    $enderecoErro = null;
    $cepErro = null;
    $telefoneErro = null;

    $nome = $_POST['nomeunid'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $telefone = $_POST['telefone'];
    $imagem = $_POST['imagem'];
    $longetude = $_POST['longetude'];
    $latitude = $_POST['latitude'];

    //Validaçao dos campos:
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o campo!';
        $validacao = false;
    }


    if (empty($endereco)) {
        $enderecoErro = 'Por favor digite o campo!';
        $validacao = false;
    }

    if (empty($cep)) {
        $cepErro = 'Por favor digite o campo!';
        $validacao = false;
    }


    if (empty($telefone)) {
        $telefoneErro = 'Por favor digite o campo!';
        $validacao = false;
    }



   




    //Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO unidade (nomeunid,endereco,cep, telefone,latitude, longetude, imagem ) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $endereco, $cep, $telefone, $latitude, $longetude, $imagem));
        Banco::desconectar();
        $msg = "Gravado com sucesso";
          echo "<script>";
          echo "window.location.href ='index.php?msg={$msg}';";
          echo "</script> "; 
    }
}
?>
