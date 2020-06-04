<?php 
include_once ("../classes/componentes/Template.php");
    session_start();
    _header("Cadastro de cliente");

    _menu('menu');

    _formConstruct('validaCadastro.php?idCliente='.$_GET['idCliente'],'POST');
        _fieldSetContruct('cad_endereco', 'Endereço',250, 500);
        _input('rua', 'text', 'Rua:*', 20, 250);
        _input('numero', 'text', 'Numero:*', 20, 50);
        _input('cidade', 'text', 'Cidade*', 20, 150);
        _input('estado', 'text', 'Estado:*', 20, 50);
        _input('complemento', 'text', 'Complemento: ', 20, 180);
        _button('bt_submit', 'submit', 'Cadastrar', 30, 70);
        _fieldSetDestruct();
    _formDestruct();
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