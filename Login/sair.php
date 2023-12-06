
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
       <div class="menustyle"><?php
         session_start();
        include '../Login/validaLogin.php';
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            include '../configuracao/menuAdministrador.php';
                            break;
                        case "Funcionario":
                             include '../configuracao/menuFuncionario.php';
                            break;
                        }
                    ?></div>
        <div class="container">
            <div class="span10 offset1">
                
                <form class="form-horizontal" action="logoff-controle.php" method="post">
                  
                    <div class="alert alert-danger"> Deseja realmente sair?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        
                        <?php
                        switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            $sair="Servico-admin";
                            break;
                        case "Funcionario":
                               $sair="Servico";
                            break;
                        }
                        ?>
                        
                        
                        <a href="../<?php echo $sair;?>/index.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>           
        </div>
    </body>    
</html>

