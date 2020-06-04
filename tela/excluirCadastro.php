<?php
include_once ('../classes/Cliente.php');
include_once ('../classes/Endereco.php');

session_start();
    /*
    *   Valida Tela de Exlusão
    */
    if(isset($_GET['idEndereco'])){
        $endereco = new Endereco();
        $endereco->delete($_GET['idEndereco']);
        header('Location: endereco.php');
    }
    if(isset($_GET['idCliente'])){
        $cliente = new Cliente();
        $cliente->delete($_GET['idCliente']);
        header('Location: home.php');
    }

?>