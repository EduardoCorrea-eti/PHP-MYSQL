<!DOCTYPE html>
<?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <!--https://developers.google.com/fonts/docs/material_icons#icon_font_for_the_web-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <title>Cadastrar novo usuário</title>
    </head>
    <body>
    
        <div id="corpo">
           <?php
            if(!is_admin()){
                echo msg_erro("Área Restrita! Você não é administrador.");
            }else{
                if(!isset($_POST['usuario'])){
                    require "user-new-form.php";
                }else{
                    $usuario    = $_POST['usuario'] ?? null;
                    $nome       = $_POST['nome'] ?? null;
                    $senha1     = $_POST['senha1'] ?? null;
                    $senha2     = $_POST['senha2'] ?? null;
                    $tipo       = $_POST['tipo'] ?? null;

                    if($senha1 === $senha2){
                        echo msg_sucesso("Tudo certo para gravar");
                    }else{
                        echo msg_erro("Senhas não conferam. Repita o procedimento");
                    }
                }
            }

            echo voltar();
           ?>

        </div>

    </body>

</html>