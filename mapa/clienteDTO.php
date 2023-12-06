<?php

class ClienteDTO {

    private $idcliente;
    private $empresa;
    private $cardapio;
    private $localizacaolatitude;
    private $localizacaolongetude;
    private $imagem;

    function getIdcliente() {
        return $this->idcliente;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getCardapio() {
        return $this->cardapio;
    }

    function getLocalizacaolatitude() {
        return $this->localizacaolatitude;
    }

    function getLocalizacaolongetude() {
        return $this->localizacaolongetude;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setCardapio($cardapio) {
        $this->cardapio = $cardapio;
    }

    function setLocalizacaolatitude($localizacaolatitude) {
        $this->localizacaolatitude = $localizacaolatitude;
    }

    function setLocalizacaolongetude($localizacaolongetude) {
        $this->localizacaolongetude = $localizacaolongetude;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

}

?>
