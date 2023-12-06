<?php

require_once '../banco.php';

class LoginBD {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Banco::conectar();
    }

    public function login($usuario, $senha) {
        try {
            $sql = "SELECT usuario.nome, usuario.Unidade_idunidade, perfil.perfil FROM `usuario` INNER JOIN perfil on usuario.Perfil_idperfil = perfil.idperfil WHERE nome=? and senha=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);
           



            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}

?>
