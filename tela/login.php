<?php 
include_once ("../classes/componentes/Template.php");
include_once ("validaLogin.php");
        _header("Login");
        
        _formConstruct('validaLogin.php','POST');
        _fieldSetContruct('login', '', 200, 290, '', '../img/img_user.png');
        
        _input('usuario','text','Usuário:',20,180);
        _input('senha', 'password', 'Senha:', 20, 180);
        _button('bt_submit', 'submit', 'Entrar', 30, 70);

        if(isset($_SESSION['erro'])){
            if($_SESSION['erro']==1){
                echo '<p class="erro">Usuário ou senha incorreto!</p>';
            }
        }

        _fieldSetDestruct();
        _formDestruct();


        _footer();
        session_destroy();
?>


<script>
    var login = $("#login").val();
    $("#bt_submit").click(function (){
        if($("#usuario").val() == '' || !$("#usuario").val()){
            alert("Por favor informe o usuario.");
            return false;
        }
        if($("#senha").val() == '' || !$("#senha").val()){
            alert("Por favor informe a senha.");
            return false;
        }
    });
</script>