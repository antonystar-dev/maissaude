<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

    </head>

    <body>
     
        <div>
            <div class="container">
               
                </br>
                <div class="row">
                    


                    <table border="0" class="table table-striped table- table-hover ">
                        <thead>
                            <tr>
                                <th>Id unidade</th>
                                <th>Id Servico</th>
                                <th>Nome unidade</th>     
                                
                               

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                          /*
Cliente=Unidade
carro=Servico
Carro_cor= unidade_servico                          *                        
                                                       */
                            
                            include 'banco.php';
                            $pdo = Banco::conectar();
                            //$sql = 'SELECT * FROM usuario ORDER BY idusuario DESC';

                           $sql = "SELECT Cliente.NOME, CARrro.MODELO, COr.COR,
FROM unidade  
INNER JOIN servico 
ON servico.idservico = unidade.id_servico;
INNER JOIN CARRO_COR 
ON CarroCor.ID_CARRO = CARro.IDCARRO
INNER JOIN COR 
ON COr.IDCOR = CarroCor.ID_COR";

                            foreach ($pdo->query($sql)as $row) {
                                echo '<tr>';
                                 echo '<td>' . $row['Unidade_idunidade'] . '</td>';
                                   echo '<td>' . $row['Servico_idservico'] . '</td>';
                                    echo '<td>' . $row['unidade'] . '</td>';
                               
                               
                               
                                
                            }
                            Banco::desconectar();
                            ?>
                        </tbody>                   
                    </table>               
                </div>
            </div>
        </div>
    </body>
</html>
