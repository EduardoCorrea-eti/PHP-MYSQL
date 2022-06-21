<?php
    echo"<p class='pequeno'>";
    if(empty($_SESSION['user'])){
        echo"<a href='user-login.php'>Entrar</a>";
    }else{
        echo "Olá <strong>" . $_SESSION['nome'] . "</strong> | ";
        echo "<a href='user-logout.php'>Sair</a>";
        echo " ( usuário do tipo " . $_SESSION['tipo'] . ")";
    }
    
    echo"</p>";