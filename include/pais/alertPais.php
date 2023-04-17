<?php 

    if(isset($_POST['upPais'])){
        echo("
            <div class='alert alert-primary alert-dismissible fade show text-center' role='alert'>
                Atualizado com sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        ");
    }
    
    if(isset($_POST['cadPais'])){
        echo("
            <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                Cadastrado com sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        ");
    }

    if(isset($_POST['delPais'])){
        echo("
            <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                Excluído com sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        ");
    }

?>