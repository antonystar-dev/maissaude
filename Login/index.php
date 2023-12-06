 <?php
      header("location:../index.php");
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="../imagens/upa logo.png" /><!--Usando faviconIcon na Aba do URL-->
        <link rel="stylesheet" type="text/css" href="../css/menu.css"/>
        <title>Login</title>
    </head>
    <body>
        <center>
        <div id="divlogin">
            <p id="logologin">
                <img src="../Imagens/logo.png" height="200"alt="Logo"/>
            </p>
            <form action="login-controle.php" method="post" id="formlogin">
                <table align="center">
                    <tr>
                        <td>Usuário:</td>
                        <td><input type="text" name="nome"/></td>
                    </tr>
                    <tr>
                        <td>Senha:</td>
                        <td><input type="password" name="senha"/></td>
                    </tr>                
                    <tr>                    
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" value="Entrar"/>
                            <input type="reset" value="Esqueci a senha"/>
                        </td>
                    </tr>                                                                
                </table>
            </form> 
        </div>
        </center>
    <center>
        <?php
        if (!empty($_GET["msg"])) {
            echo "<div id='errorlogin'>", $_GET["msg"], "</div>";
        }
        ?>
    </center>
    <?php
      //  include './footer.php';
    ?>
</body>
</html>
