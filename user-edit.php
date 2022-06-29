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
        <title>Edição de dados do usuário</title>
    </head>
    <body>
    
        <div id="corpo">
        <?php 
            if(!is_logado()){
                echo msg_erro("Efetue <a href='user-login.php'>login</a> para editar seus dados.");
            }else{
                if(!isset($_POST['usuario'])){
                    include 'user-edit-form.php';
                }else{

                    //se  a variavel de ambiente post'usuario' estiver setada
                   $usuario = $_POST['usuario'] ?? null;
                   $nome    = $_POST['nome'] ?? null;
                   $tipo    = $_POST['tipo'] ?? null;
                   $senha1  = $_POST['senha1'] ?? null;
                   $senha2  = $_POST['senha2'] ?? null;

                   $q = "update usuarios set usuario = '$usuario', nome ='$nome'";

                   //verifica se a senha foi altarada
                   if(empty($senha1) || is_null($senha1)){
                    echo msg_aviso("A senha antiga foi mantida");
                   }else{

                    //
                    if($senha1 === $senha2){
                        $senha = gerarHash($senha1);
                        $q .= ", senha = '$senha'";  
                    }else{
                        echo msg_erro("Senhas não conferem. A senha anterior foi mantida.");
                    }
                   }

                   $q .= " where usuario = '" . $_SESSION['user'] ."'";
                   //echo $q;

                   if($banco->query($q)){

                    echo msg_sucesso("Dados alterados com sucesso!");
                    logout();
                    echo msg_aviso("Por segurança, efetue o <a href='user-login.php'>login</a> novamente.");
                   
                }else{
                    echo msg_erro("Não foi possível alter os dados.");
                }

                }
            }
            
            
        ?>

            <?php echo voltar();  ?>
        </div>
        <?php require_once "rodape.php"; ?>

    </body>

</html>