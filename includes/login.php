<?php 
session_start();


if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}


//GERA UMA CRIPTOGRAFIA DA SENHA
function cripto($senha){
    $c = '';
    for($pos = "0"; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos]) +1;
        $c .= chr($letra);
    }
    return $c;
}

//GERA A HASH DA SENHA
function gerarHash($senha){
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

//COMPARA A SENHA INFORMADA E A HASH
function testarHash($senha, $hash){
    $ok = password_verify($senha, $hash);
    return $ok;
}

//
function logout(){
    
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
}

//VERIFICA SE O USUARIO ESTÁ LOGADO NO SISTEMA
function is_logado(){
    if(empty($_SESSION['user'])){
        return false;
    }else{
        return true;
    }
}

//VERIFICA SE O USUÁRIO LOGADO É ADMIN
function is_admin(){
    $t = $_SESSION['tipo'];
    if(is_null($t)){
        return false;
    }else{
        if($t == "admin"){
            return true;
        }else{
            return false;
        }
    }
}

//VERIFICA SE O USUÁRIO LOGADO É EDITOR
function is_editor(){
    $t = $_SESSION['tipo'];
    if(is_null($t)){
        return false;
    }else{
        if($t == "editor"){
            return true;
        }else{
            return false;
        }
    }
}


