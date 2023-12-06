<?php
if (!isset($_SESSION["nome"])) {
    echo "<script>";
    echo "window.location.href = '../Login/index.php';";
    echo "</script> ";
}
?>
