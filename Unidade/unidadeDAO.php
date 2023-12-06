<?php

require_once '../../banco.php';

class UnidadeDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Banco::conectar();
    }

    public function getAllUnidade() {
        try {
            $sql = "SELECT * FROM unidade";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $unidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $unidades;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
      }
        

  

?>
