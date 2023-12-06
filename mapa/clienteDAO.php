<?php

require_once 'conexao.php';

class ClienteDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function getAllCliente() {
        try {
            $sql = "SELECT * FROM cliente";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function salvarCliente(ClienteDTO $clienteDTO) {
        try {
            $sql = "INSERT INTO cliente (empresa,cardapio,latitude,longetude,imagem) 
                    VALUES (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $clienteDTO->getEmpresa());
            $stmt->bindValue(2, $clienteDTO->getCardapio());
            $stmt->bindValue(3, $clienteDTO->getLocalizacaolatitude());
            $stmt->bindValue(4, $clienteDTO->getLocalizacaolongetude());
            $stmt->bindValue(5, $clienteDTO->getImagem());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluirCliente($idcliente) {
        try {
            $sql = "DELETE FROM cliente 
                   WHERE idcliente = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idcliente);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getClienteById($idcliente) {
        try {
            $sql = "SELECT * FROM cliente WHERE idcliente = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idcliente);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cliente;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function updateClienteById(ClienteDTO $clienteDTO) {
        try {
            $sql = "UPDATE cliente SET empresa=?,
                                       cardapio=?,
                                       latitude=?,
                                       longetude=?,
                                       imagem=?
                    WHERE idcliente= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $clienteDTO->getEmpresa());
            $stmt->bindValue(2, $clienteDTO->getCardapio());
            $stmt->bindValue(3, $clienteDTO->getLocalizacaolatitude());
            $stmt->bindValue(4, $clienteDTO->getLocalizacaolongetude());
            $stmt->bindValue(5, $clienteDTO->getImagem());
            $stmt->bindValue(6, $clienteDTO->getIdcliente());
            $stmt->execute();
            
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}

?>
