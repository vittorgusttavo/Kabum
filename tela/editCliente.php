<?php 
include_once ("../classes/componentes/Template.php");
    session_start();
    _header("Edição de cliente");

    _menu('menu');
    $db = new DbConnection();
    $con = $db->_connect();
    $sql = "SELECT id, nome, cpf, rg, DATE_FORMAT(dt_nascimento, '%d/%m/%Y') as dt_nascimento, telefone FROM cliente WHERE id=".$_GET['idCliente'];
    $res = $con->query($sql);
    $object = $res->fetch_array();
    _formConstruct('validaCadastro.php?update=1&idCliente='.$object['id'],'POST');
    _fieldSetContruct('cliente','Cliente', 290, 400);
        _input('nome','text','Nome:*',20,250, $object['nome']);
        _input('cpf', 'text', 'Cpf:*', 20, 110, $object['cpf']);
        _input('rg', 'text', 'Rg:*', 20, 110, $object['rg']);
        _input('dt_nascimento', 'text', 'Dt. Nascimento:*', 20, 80, $object['dt_nascimento']);
        _input('telefone', 'text', 'Telefone:', 20, 100, $object['telefone']);
        echo "<br>";
        _button('bt_submit', 'submit', 'Editar', 30, 70);
    _fieldSetDestruct();
    _formDestruct();
    _footer();

?>

<script>
    $('#cpf').mask('000.000.000-00');
    $('#rg').mask('00.000.000-0');
    $('#dt_nascimento').mask('00/00/0000');
    $('#telefone').mask('(00)0000-0000');

    $('#bt_submit').click(function (){
        if(!$('#nome').val() || $('#nome').val() == ''){
            alert('Por favor informe o Nome!');
            return false;
        }
        if(!$('#cpf').val() || $('#cpf').val() == ''){
            alert('Por favor informe o CPF!');
            return false;
        }
        if(!$('#rg').val() || $('#rg').val() == ''){
            alert('Por favor informe o RG!');
            return false;
        }
        if(!$('#dt_nascimento').val() || $('#dt_nascimento').val() == ''){
            alert('Por favor informe a Dt. de Nascimento!');
            return false;
        }
    });
</script>