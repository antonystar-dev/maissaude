<label class="control-label">Unidade</label> 
<select name="Unidade_idunidade">          
    <?php
    $listaunidade = $unidade;
    require '../banco.php';
    $pdo = Banco::conectar();
    //$sqll = "Select * from usuario inner JOIN unidade on usuario.Unidade_idunidade ";
    $sqll = "select * from unidade";
    foreach ($pdo->query($sqll)as $listaunidade) {
        echo ' <option value=' . $listaunidade['Unidade_idunidade'] . '>' . $listaunidade['nomeunid'] . '</option>';
    }
    Banco::desconectar();
    ?>
</select> 










$listaunidade=$unidade;
//require '../banco.php';
$pdo = Banco::conectar();
//$sqll = "Select * from usuario inner JOIN unidade on usuario.Unidade_idunidade ";
//$sql1 = "select * from usuario";
foreach ($pdo->query($sql1)as $listaunidade) {
echo ' <option value=' . $listaunidade['idunidade'] . '>' . $listaunidade['nomeunid'] . '</option>';
}
Banco::desconectar();
?>