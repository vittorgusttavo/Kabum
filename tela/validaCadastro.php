<?php
include_once ('../classes/Cliente.php');
include_once ('../classes/Endereco.php');

session_start();
/*
*   Valida Tela de Cadastro de Cliente
*/
if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['rg']) && isset($_POST['dt_nascimento'])){
    if(isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['cidade']) && isset($_POST['estado'])){
        $db = new DbConnection();
        /* Cliente */
        $cliente = new Cliente();
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $dtNascimento = $_POST['dt_nascimento'];
        if(isset($_POST['telefone'])){
            $telefone = $_POST['telefone'];
            $telefone = str_replace("(", "", $telefone);
            $telefone = str_replace("-", "", $telefone);
        }
        /* Ajustando variaves para enviar ao banco*/
        $rg = trim($rg);
        $rg = str_replace(".", "", $rg);
        $rg = str_replace("-", "", $rg);
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        $nome = retiraAscentos($nome);
        $nome = strtoupper($nome);
        $dtNascimento = implode("-",array_reverse(explode("/",$dtNascimento)));
        /* Setando variaveis no objeto cliente */
        $cliente->setNome($nome);
        $cliente->setCpf($cpf);
        $cliente->setRg($rg);
        $cliente->setDtNascimento($dtNascimento);
        $idCliente = $cliente->insert($cliente);

        /* Endereço */
        $endereco = new Endereco();

        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        if(isset($_POST['complemento'])){
            $complemento = $_POST['complemento'];
            $complemento = retiraAscentos($complemento);
            $complemento = strtoupper($complemento);
        }
        /* Valida Informações para enviar ao banco*/
        $rua = strtoupper($rua);
        $rua = retiraAscentos($rua);
        $cidade = strtoupper($cidade);
        $cidade = retiraAscentos($cidade);
        $estado = retiraAscentos($estado);
        $estado = strtoupper($estado);

        /* Setando variaveis no objeto endereco */
        $endereco->setRua($rua);
        $endereco->setNumero($numero);
        $endereco->setCidade($cidade);
        $endereco->setSiglaEstado($estado);
        $endereco->setIdCliente($idCliente);
        if($endereco->insert($endereco)){
            header('Location: home.php');
        }
    }
}
    /*
    *   Valida Tela de cadastro de Endereço
    */
    
    if(isset($_GET['idCliente']) && !$_GET['update']){
        if(isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['cidade']) && isset($_POST['estado'])){
            $endereco = new Endereco();

            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            if(isset($_POST['complemento'])){
                $complemento = $_POST['complemento'];
                $complemento = retiraAscentos($complemento);
                $complemento = strtoupper($complemento);
            }
            /* Valida Informações para enviar ao banco*/
            $rua = strtoupper($rua);
            $rua = retiraAscentos($rua);
            $cidade = strtoupper($cidade);
            $cidade = retiraAscentos($cidade);
            $estado = retiraAscentos($estado);
            $estado = strtoupper($estado);

            /* Setando variaveis no objeto endereco */
            $endereco->setRua($rua);
            $endereco->setNumero($numero);
            $endereco->setCidade($cidade);
            $endereco->setSiglaEstado($estado);
            $endereco->setIdCliente($_GET['idCliente']);
            $endereco->setComplemento($complemento);
            if($endereco->insert($endereco)){
                header('Location: endereco.php?idCliente='.$_GET['idCliente']);
            }
        }
    }
    /* 
    *   Valida a edição do cliente
    */
    if(isset($_GET['update']) && isset($_GET['idCliente'])){
        if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['rg']) && isset($_POST['dt_nascimento'])){
        if($_GET['update'] == 1){
            $cliente = new Cliente();
            $id = $_GET['idCliente'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $dtNascimento = $_POST['dt_nascimento'];
            if(isset($_POST['telefone'])){
                $telefone = $_POST['telefone'];
                $telefone = str_replace("(", "",$telefone);
                $telefone = str_replace(")", "",$telefone);
                $telefone = str_replace("-", "", $telefone);
            }
            /* Ajustando variaves para enviar ao banco*/
            $rg = trim($rg);
            $rg = str_replace(".", "", $rg);
            $rg = str_replace("-", "", $rg);
            $cpf = str_replace(".", "", $cpf);
            $cpf = str_replace("-", "", $cpf);
            $nome = retiraAscentos($nome);
            $nome = strtoupper($nome);
            $dtNascimento = implode("-",array_reverse(explode("/",$dtNascimento)));
            /* Setando variaveis no objeto cliente */
            $cliente->setId($id);
            $cliente->setNome($nome);
            $cliente->setCpf($cpf);
            $cliente->setRg($rg);
            $cliente->setDtNascimento($dtNascimento);
            $cliente->setTelefone($telefone);
            if($cliente->update($cliente)){
                header('Location: home.php');
            }
        }
        }
    }
    /*
    * Valida a edição do Endereço
    */
    if(isset($_GET['update']) && isset($_GET['idEndereco'])){
        if(isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['cidade']) && isset($_POST['estado'])){
        if($_GET['update'] == 1){
            $endereco = new Endereco();

            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            if(isset($_POST['complemento'])){
                $complemento = $_POST['complemento'];
                $complemento = retiraAscentos($complemento);
                $complemento = strtoupper($complemento);
            }
            /* Valida Informações para enviar ao banco*/
            $rua = strtoupper($rua);
            $rua = retiraAscentos($rua);
            $cidade = strtoupper($cidade);
            $cidade = retiraAscentos($cidade);
            $estado = retiraAscentos($estado);
            $estado = strtoupper($estado);

            /* Setando variaveis no objeto endereco */
            $endereco->setId($_GET['idEndereco']);
            $endereco->setRua($rua);
            $endereco->setNumero($numero);
            $endereco->setCidade($cidade);
            $endereco->setSiglaEstado($estado);
            $endereco->setComplemento($complemento);
            if($endereco->update($endereco)){
                header('Location: endereco.php?idCliente='.$_GET['idCliente']);
            }
        }
        }

    }

    function retiraAscentos($string){
        $ascentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
        $retira   = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
        return str_replace($ascentos, $retira, $string);
    }
?>