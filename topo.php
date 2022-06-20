<?php
    echo"<p class='pequeno'>";
    if(empty($_SESSION['user'])){
        echo"<a href='user-login.php'>Entrar</a>";
    }else{
        echo "Olá " . $_SESSION['nome'];
    }
   
    echo"</p>";