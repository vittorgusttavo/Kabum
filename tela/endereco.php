<?php 
include_once ("../classes/componentes/Template.php");
session_start();

    _header('Endereço');

    _menu('menu');
        _tableConstruct('table_endereco', 'left', '<button onclick="abreTela('.$_GET['idCliente'].')" class="bt_adicionar"><img border="0" src="../img/img_add.png" width="15px" height="15px"> Endereço');
        _colunConstruct();
        _trConstruct();
                _colunLine('Nome', 300);
                _colunLine('Rua', 150);
                _colunLine('Numero', 120);
                _colunLine('Cidade', 140);
                _colunLine('Sigla Estado', 120);
                _colunLine('Complemento', 120);
                _colunLine('Editar', 100);
                _colunLine('Excluir', 100);
        _trDestruct();
        _colunDestruct();
        _bodyConstruct();
        if(isset($_GET['idCliente'])){
                $db = new DbConnection();
                $con = $db->_connect();
                $sql = "SELECT e.id, c.nome, e.rua, e.numero, e.cidade, e.sigla_estado, e.complemento FROM endereco e
                        JOIN cliente c ON (c.id = e.id_cliente)
                        WHERE e.id_cliente=".$_GET['idCliente'];
                if($res = $con->query($sql)){
                        while ($object = $res->fetch_array()){
                                _trConstruct();
                                        _addLine($object['nome'], 'left', 300);
                                        _addLine($object['rua'], 'center', 150);
                                        _addLine($object['numero'], 'center', 120);
                                        _addLine($object['cidade'], 'center', 140);
                                        _addLine($object['sigla_estado'], 'center', 120);
                                        _addLine($object['complemento'], 'center', 120);
                                        _addLine('', 'center', 100, '../img/img_edit.png', 'editEndereco.php?idEndereco='.$object['id']);
                                        _addLine('', 'center', 100, '../img/img_excluir.png', 'excluirCadastro.php?idEndereco='.$object['id']);
                                _trDestruct();
                        }
                }
        }
        _bodyDestruct();

        _tableDestruct();

        _footer();
?>

<script>
    function abreTela(id_cliente){
        window.location.href = 'enderecoCadastro.php?idCliente='+id_cliente;
    }
</script>