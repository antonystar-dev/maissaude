<?php
require '../banco.php';

$id = 0;

if(!empty($_GET['idusuario']))
{
    $id = $_REQUEST['idusuario'];
}

if(!empty($_POST))
{
    $id = $_POST['idusuario'];


    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM usuario where idusuario = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    $msg = "Excluído com sucesso";
          echo "<script>";
          echo "window.location.href ='index.php?msg={$msg}';";
          echo "</script> "; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
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
            <div class="span10 offset1">
                <div class="row">
                    
                </div>
                <form class="form-horizontal" action="excluir.php" method="post">
                    <input type="hidden" name="idusuario" value="<?php echo $id;?>"/>
                    <div class="alert alert-danger"> Deseja realmente Excluir o Usuário?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="index.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>           
        </div>
    </body>    
</html>

