<?php
session_start();
//include 'validaLogin.php';
?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>+ Saúde</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>

            body, 
            .menu,
            .sub-menu {
                margin: 0;
                padding: 0;
            }
            .clearfix:after{
                content: '.';
                display: block;
                clear: both;
                height: 0;
                line-height: 0;
                font-size: 0;
                visibility: hidden;
                overflow: hidden;
            }
            .menu,
            .sub-menu {
                list-style: none;
                background:  #48c9b0;
            }
            .sub-menu {
                background:  #48c9b0  ;
            }
            .menu a {
                text-decoration: none;
                display: block;
                padding: 10px;
                color: #fff;
                font-family: sans-serif;
                font-size: 14px;
                text-transform: uppercase;
                font-weight: 700;
            }
            .menu li {
                position: relative;
            }
            .menu > li {
                float: left;
            }
            .menu > li:hover {
                background:  #1abc9c ;
            }
            .menu li:hover > .sub-menu {
                display: block;
            }
            .sub-menu {
                display: none;
                position: absolute;
                min-width: 150px;
            }
            .sub-menu li:hover {
                background: #48c9b0;
            }
            .sub-menu .sub-menu {
                top: 0;
                left: 100%;
            }
            .login{
                background-color: #48c9b0;
                color: #fff;
                margin: 10px;
            }
            .desce{
                margin-top: 10px;
                background-color: #48c9b0;
                border-color: white;
            }
        </style>


    </head>
    <body>

        <div class="container menu-container ">
            <div>

                <ul class="menu clearfix">

                    <li>
                        <form name="frmBusca" method="post" action="termo-pesquisa.php" target="pesquisa"  >
                            <input type="text" name="palavra" size="40" class="form-control" style="margin-top: 3px;margin-left: 3px;background-color:  #a3e4d7 ;"/>  
                    </li>
                    <li>
                        <button type="submit" class="glyphicon glyphicon-search btn btn-danger"style="margin-top: 2px;margin-left: 3px;background-color: #48c9b0;border-color: white;"></button>
                        </form></li>
                    <li><a href="#">Início</a></li>
                    <li><a href="#upa">O que é Upa</a></li>
                    <li><a href="#hospital">O que é Hospital</a></li>
                    
                     <li><a href="#ubs">O que é UBS</a></li>

                    <li ><a href="Login/redireciona.php">
                            <?php
                            if (!isset($_SESSION["nome"])) {
                                echo " Entrar</a>";

                                echo " <ul class='sub-menu clearfix'>";
                                echo " <li>";
                                echo "<form  action='Login/login-controle.php' method='post' >";
                                echo "  <table border='0'  class='login' align='center'>";
                                echo "   <tbody >";
                                echo "     <tr>";
                                echo "      <td><label>Usuário:</label></td>";
                                echo "  </tr>";
                                echo "   <tr >";
                                echo "    <td><input type='text' name='nome' size='20'class='form-control'/></td>";
                                echo " </tr>";
                                echo " <tr >";
                                echo "     <td><label>Senha:</label></td>";
                                echo "  </tr>";
                                echo " <tr >";
                                echo "      <td><input type='password' name='senha'size='20'class='form-control'/></td>";
                                echo "  </tr>  ";
                                echo "  <tr>    ";
                                echo "    <td colspan='2' align='center'>";

                                echo "        <input type='submit' value='Entrar' class='btn btn-danger desce'/>";
                                echo "    </td>";
                                echo "</tr> ";
                                echo " </tbody>";
                                echo "</table>";

                                echo " </li>";

                                echo "</ul>";
                                echo " </li>";
                            } else {
                                echo "Olá ", $_SESSION["nome"], "</a>";
                                echo '</li>';
                            }
                            ?>
                            <li> <a href="index.php"><img src="imagens/logo-MS.png" height="40" style="position: absolute; margin-top:-10px;"></a></li>  
                </ul>


            </div>
        </div>

    </body>
</html>








