<?php 
    // Insert
    include("bd_pais/insertPais.php");
    include("bd_cidade/insertCidade.php");
    include("bd_aeroporto/insertAero.php");
    include("bd_companhia/insertComp.php");
    include("bd_voo/insertVoo.php");
    include("bd_aviao/insertAviao.php");
    include("bd_cargo/insertCargo.php");
    include("bd_genero/insertGen.php");
    include("bd_funcionario/insertFunc.php");
    include("bd_passageiro/insertPassageiro.php");
    include("bd_nacionalidade/insertNac.php");
    include("bd_passageiro_nacionalidade/insertPn.php");
    include("bd_tipo_bagagem/insertTipoBag.php");
    include("bd_bagagem/insertBagagem.php");

    // Update
    include("bd_pais/updatePais.php");
    include("bd_cidade/updateCidade.php");
    include("bd_aeroporto/updateAero.php");

    // Delete
    include("bd_pais/deletePais.php");
    include("bd_cidade/deleteCidade.php");
    include("bd_aeroporto/deleteAero.php");
?>