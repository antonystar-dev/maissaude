<?php

require_once 'clienteDTO.php';
require_once 'clienteDAO.php';
require_once 'Carrega.class.php';
require_once 'Upload.class.php';

if (isset($_FILES["imagem"])) {
    $dir_dest = "../upload";
    $upload = new Upload($_FILES['imagem'], $dir_dest);

    // verifica se foi realizado corretamente o upload
    if ($upload->processed) {
        $imagem = $upload->file_dst_name;
    }
}

$idcliente = $_POST["idcliente"];
$empresa = $_POST["empresa"];
$cardapio = $_POST["cardapio"];
$localizacaolatitude = $_POST["localizacaolatitude"];
$localizacaolongetude = $_POST["localizacaolongetude"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setEmpresa($empresa);
$clienteDTO->setCardapio($cardapio);
$clienteDTO->setLocalizacaolatitude($localizacaolatitude);
$clienteDTO->setLocalizacaolongetude($localizacaolongetude);
$clienteDTO->setImagem($imagem);
$clienteDTO->setIdcliente($idcliente);

$clienteDAO = new ClienteDAO();
$clienteDAO->updateClienteById($clienteDTO);


echo "<script>";
echo "window.location.href = 'listarAllCliente.php';";
echo "</script> ";
?>
