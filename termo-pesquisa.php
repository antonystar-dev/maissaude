

<?php
session_start();
//include 'validaLogin.php';
?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        

    </head>
    <body>


        <table class="table table-striped table-bordered">

            <?php
            include 'banco.php';
            $pdo = Banco::conectar();
            $row = 0;
            $busca = $_POST['palavra'];
            
            //$sql = "SELECT * FROM servico WHERE nome like'%$busca%' ";
            $sql = "select * from servico inner join unidade ON unidade.idunidade= Unidade_idunidade where nomeunid like'%$busca%' or descricao like'%$busca%'or disponibilidade like'%$busca%' or nome like'%$busca%'  ";
            
            if ($busca == null) {
             
                 echo "<div class='alert alert-warning alert-dismissible' style='background:yellow; color:black;'>";
                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "<strong>Atenção!</strong> Preencha os dados da maneira correta!";
                    echo "</div>";
            } else {
                echo '<thead>';
                    echo '<tr>';
                    echo '<th>Nome</th>';
                    echo '<th>Descrição</th>';
                    echo ' <th>Disponibilidade</th>';
                     echo ' <th>Unidade</th>';
                    echo '  </tr>';
                    echo '  </thead>';
                foreach ($pdo->query($sql)as $row) {

                    
                    echo '   <tbody>';
                    echo '<tr>';
                    echo '<td>' . $row['nome'] . '</td>';
                    echo '<td>' . $row['descricao'] . '</td>';
                if($row['disponibilidade']=="Sim"){
                    echo '<td style="background-color: #58FA58;text-align: center;font-size:20px;padding-top:35px;">' . $row['disponibilidade'] . '</td>';
                }else{
                    echo '<td style="background-color: #F78181;text-align: center;font-size:20px;padding-top:35px;">' . $row['disponibilidade'] . '</td>';
                }
                    
                    echo '<td>' . $row['nomeunid'] . '</td>';

                    echo '<tr>';
                     
                    
                }
                if ($row == 0) {
                   
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "<strong>Atenção!</strong> Não foi encontrado nenhum registro com o nome <strong>$busca.</strong> Verifique a ortografia e tente novamente.";
                    echo "</div>";
                }
            }

            Banco::desconectar();
            ?>
            
        </tbody>                   
    </table>               
</body>
</html>



