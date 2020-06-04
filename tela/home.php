<?php

include_once ("../classes/componentes/Template.php");

        session_start();

        _header("Inicio");

        _menu('menu');
        _tableConstruct('table_cliente', 'left', '<button onclick="abreTela()" class="bt_adicionar"><img border="0" src="../img/img_add.png" width="15px" height="15px"> Cliente');
        _colunConstruct();
        _trConstruct();
                _colunLine('Nome', 300);
                _colunLine('CPF', 300);
                _colunLine('RG', 90);
                _colunLine('Dt. Nascimento', 90);
                _colunLine('Telefone', 90);
                _colunLine('Cidades', 90);
                _colunLine('Editar', 90);
                _colunLine('Excluir', 90);
        _trDestruct();
        _colunDestruct();
        _bodyConstruct();
        $db = new DbConnection();
        $con = $db->_connect();
        $sql = "SELECT id, nome, cpf, rg, DATE_FORMAT(dt_nascimento, '%d/%m/%Y') as dt_nascimento, telefone FROM cliente";

        if($res = $con->query($sql)){
                while ($object = $res->fetch_array()){
                        _trConstruct();
                                _addLine($object['nome'], 'left', 300);
                                _addLine($object['cpf'], 'center', 150);
                                _addLine($object['rg'], 'center', 120);
                                _addLine($object['dt_nascimento'], 'center', 140);
                                _addLine($object['telefone'], 'center', 120);
                                _addLine('', 'center', 90, '../img/img_listar.png', 'endereco.php?idCliente='.$object['id']);
                                _addLine('', 'center', 100, '../img/img_edit.png', 'editCliente.php?idCliente='.$object['id']);
                                _addLine('', 'center', 100, '../img/img_excluir.png', 'excluirCadastro.php?idCliente='.$object['id']);
                        _trDestruct();
                }
        }
        
        _bodyDestruct();

        _tableDestruct();

        _footer();
?>

<script>
        function abreTela(){
                window.location.href ='clienteCadastro.php';
        }
</script>