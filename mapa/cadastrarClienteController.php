<?php
require_once 'clienteDTO.php';
require_once 'clienteDAO.php';
require_once 'Carrega.class.php';
require_once 'Upload.class.php';

if (isset($_FILES["imagem"])) {
    $dir_dest = "upload";
    $upload = new Upload($_FILES['imagem'], $dir_dest);

    // verifica se foi realizado corretamente o upload
    if ($upload->processed) {
        $imagem = $upload->file_dst_name;
    }
}

// recuperei os dados do formulario
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

$clienteDAO = new ClienteDAO();
$sucesso = $clienteDAO->salvarCliente($clienteDTO);

if ($sucesso){
   $msg = "Empresa Cadastrada com Sucesso"; 
   echo "<script>";
   echo "window.location.href = 'formCadastrarCliente.php?msg={$msg}';";
   echo "</script> ";
}
?>

