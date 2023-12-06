<?php
session_start();
require_once './loginBD.php';

$usuario = $_POST["nome"];
$senha = $_POST["senha"];
//$senha = md5($_POST["senha"]);
//$logado = ["logado"];

$loginBD = new LoginBD();
$usuario = $loginBD->login($usuario, $senha);

if (!empty($usuario)) {
    $_SESSION["nome"] = $usuario["nome"];
    $_SESSION["Unidade_idunidade"] = $usuario["Unidade_idunidade"];
    $_SESSION["perfil"] = $usuario["perfil"];
    
     //echo $_SESSION["Unidade_idunidade"];
    echo "<script>";
    echo "window.location.href = 'redireciona.php';";
    echo "</script> ";
} else {
    $msg = "Usuário ou senha incorreto";
    echo "<script>";
    echo "window.location.href = '../index.php?msg={$msg}';";
    echo "</script> ";
    
}
?>
