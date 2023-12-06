<?php
require '../banco.php';

$id = null;
if (!empty($_GET['idunidade'])) {
    $id = $_REQUEST['idunidade'];
}

if (null == $id) {
    header("Location: index.php");
}

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
    $latitude = $_POST['latitude'];
    $longetude = $_POST['longetude'];

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


    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE unidade  set nomeunid = ?, endereco = ?, cep = ?, telefone = ?,imagem=?, latitude= ?, longetude =? WHERE idunidade = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $endereco, $cep, $telefone, $imagem, $latitude, $longetude, $id));
        Banco::desconectar();
        //header("Location: index.php");
        $msg = "Atualizado com sucesso";
        echo "<script>";
        echo "window.location.href ='index.php?msg={$msg}';";
        echo "</script> ";
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM unidade where idunidade = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nomeunid'];


    $endereco = $data['endereco'];
    $cep = $data['cep'];
    $telefone = $data['telefone'];
    $latitude = $data['latitude'];
    $longetude = $data['longetude'];


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
                    <form class="form-horizontal" action="atualizar.php?idunidade=<?php echo $id ?>" method="post">
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
                                <input size="80" name="endereco" type="text" placeholder="Endereço" required="" value="<?php echo!empty($endereco) ? $endereco : ''; ?>">
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
                                <input size="40" name="latitude" type="text" placeholder="(00)0000-0000" required="" value="<?php echo!empty($latitude) ? $latitude : ''; ?>">
                                <?php if (!empty($latitudeErro)): ?>
                                    <span class="help-inline"><?php echo $latitudeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="control-group <?php echo!empty($longetudeErro) ? 'error ' : ''; ?>">
                            <label class="control-label">longetude</label>
                            <div class="controls">
                                <input size="40" name="longetude" type="text" placeholder="(00)0000-0000" required="" value="<?php echo!empty($longetude) ? $longetude : ''; ?>">
                                <?php if (!empty($longetudeErro)): ?>
                                    <span class="help-inline"><?php echo $longetudeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------->

                        <div class="form-group">
                            <input name="imagem" type="hidden" id="imagem" placeholder="Logomarca" value="logo-MS-mini.png">			
                        </div>  
                        <!------------------------------------------------------------------------------------------->



                        <div class="form-actions">
                            <br/>
                            <a href="#confirmacao" class="btn btn-success">Atualizar</a>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                        <div id="confirmacao"></div>
                        <div class="geraloculto">
                            <div id="campooculto form-actions" style="margin-left:25%;  width: 40%;">
                                <div class="alert alert-danger">Deseja realmente atualizar a unidade?</div></br>
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

