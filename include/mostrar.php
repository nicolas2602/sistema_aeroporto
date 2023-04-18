<?php 

    if(isset($_POST['showPais'])){
        include("table_pais.php");
    }else if(isset($_POST['showCidade'])){
        include("table_cidade.php");
    }
    else{
        echo("
            <div class='d-flex justify-content-center'>
                <div class='container'>
                    <div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                        Bem-vindo ao sistema de aeroporto! Para olhar as tabelas, clique em um dos botões acima!
                    </div>
                </div>
            </div>
        ");
    }
?>