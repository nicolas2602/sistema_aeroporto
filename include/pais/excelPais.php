<table border="1">
    <tr>
        <td colspan="5">Países cadastrados</td>
    </tr>

    <tr>
        <td>ID</td>
        <td>País</td>
    </tr>

    <?php
        $pais = "select * from pais";
        $query_pais = mysqli_query($conexao, $pais);
        while($country = mysqli_fetch_assoc($query_pais)){
            $IdPais = $country['IdPais'];
            $nomePais = $country['nomePais'];
    ?>

    <tr>
        <td><?=$IdPais?></td>
        <td><?=$nomePais?></td>
    </tr>

    <?php } ?>


</table>