
        <?php
        session_start();
        include 'validaLogin.php';
        ?> 
        
                    <?php
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                           
                            header("Location:../Servico-admin/"); 
                            break;
                        case "Funcionario":
                             header("Location:../Servico/"); 
                            break;
                       
                    }
                    ?>
               