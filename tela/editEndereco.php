<?php 
include_once ("../classes/componentes/Template.php");
    session_start();
    _header("Edição de endereço");

    _menu('menu');
    if(isset($_GET['idEndereco'])){
        $db = new DbConnection();
        $con = $db->_connect();
        $sql = "SELECT e.id, e.rua, e.numero, e.cidade, e.sigla_estado, e.complemento, e.id_cliente FROM endereco e WHERE e.id=".$_GET['idEndereco'];
        $res = $con->query($sql);
        $object = $res->fetch_array();
        _formConstruct('validaCadastro.php?update=1&idEndereco='.$object['id'].'&idCliente='.$object['id_cliente'],'POST');
            _fieldSetContruct('cad_endereco', 'Endereço',250, 500);
            _input('rua', 'text', 'Rua:*', 20, 250, $object['rua']);
            _input('numero', 'text', 'Numero:*', 20, 50, $object['numero']);
            _input('cidade', 'text', 'Cidade*', 20, 150, $object['cidade']);
            _input('estado', 'text', 'Estado:*', 20, 50, $object['sigla_estado']);
            _input('complemento', 'text', 'Complemento: ', 20, 180, $object['complemento']);
            _button('bt_submit', 'submit', 'Editar', 30, 70);
            _fieldSetDestruct();
        _formDestruct();
    }
    _footer();

?>

<script>
$('#estado').mask('SS');
$('#bt_submit').click(function (){
        if(!$('#rua').val() || $('#rua').val() == ''){
            alert('Por favor informe os dados obrigatórios do endereço!');
            return false;
        }
        if(!$('#numero').val() || $('#numero').val() == ''){
            alert('Por favor informe os dados obrigatórios do endereço!');
            return false;
        }
        if(!$('#cidade').val() || $('#cidade').val() == ''){
            alert('Por favor informe os dados obrigatórios do endereço!');
            return false;
        }
        if(!$('#estado').val() || $('#estado').val() == ''){
            alert('Por favor informe os dados obrigatórios do endereço!');
            return false;
        }
});
</script>