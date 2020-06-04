<?php 
include_once ("../classes/componentes/Template.php");
        session_start();
        _header("Cadastro de cliente");

        _menu('menu');
        
        _formConstruct('validaCadastro.php','POST');
        _fieldSetContruct('cliente','Cliente', 500, 500);
            _input('nome','text','Nome:*',20,250);
            _input('cpf', 'text', 'Cpf:*', 20, 110);
            _input('rg', 'text', 'Rg:*', 20, 110);
            _input('dt_nascimento', 'text', 'Dt. Nascimento:*', 20, 80);
            _input('telefone', 'text', 'Telefone:', 20, 100);
            echo "<br>";
            _fieldSetContruct('endereco', 'Endereço',200, 500);
            _input('rua', 'text', 'Rua:*', 20, 250);
            _input('numero', 'text', 'Numero:*', 20, 50);
            _input('cidade', 'text', 'Cidade*', 20, 150);
            _input('estado', 'text', 'Estado:*', 20, 180);
            _input('complemento', 'text', 'Complemento: ', 20, 180);
            _fieldSetDestruct();
            _button('bt_submit', 'submit', 'Cadastrar', 30, 70);
        _fieldSetDestruct();
        _formDestruct();
        _footer();
?>

<script>
    $('#cpf').mask('000.000.000-00');
    $('#rg').mask('00.000.000-0');
    $('#dt_nascimento').mask('00/00/0000');
    $('#telefone').mask('(00) 0000-0000');
    $('#estado').mask('SS');

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