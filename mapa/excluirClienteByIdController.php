<?php
require_once 'clienteDAO.php';

$idcliente = $_GET["id"];
//echo $idcliente;

$clienteDAO = new ClienteDAO();
$clienteDAO->excluirCliente($idcliente);

echo "<script>";
echo "window.location.href = 'listarAllCliente.php';";
echo "</script> ";
?>
