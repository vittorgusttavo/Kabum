<?php 

    if(!$_POST['login'] && !$_POST['senha']){
        header('Location: tela/login.php');
    }else{
        header('Location: tela/principal.php');
    }

?>
