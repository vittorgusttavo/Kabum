<?php 
    include_once ('../db/db_con.php');

        session_start();

        if(isset($_POST['usuario']) && isset($_POST['senha'])){
            
            $db = new DbConnection();
            $login       = $_POST["usuario"];
            $senha       = md5($_POST["senha"]);
            $con = $db->_connect();

            /*Busca na tabela usuario*/
             $sql = 'SELECT * FROM usuario u WHERE u.login = "'.$login.'"';
             $res = $con->query($sql);
             if($res->num_rows > 0){
                $row = $res->fetch_object();
                if($login == $row->login && $senha==$row->senha){
                    $_SESSION['usuario'] = $row->login;
                    $_SESSION['nome'] = $row->nome;
                    $_SESSION['id'] = $row->id;
                    header('Location: home.php');   
                }else{
                    $_SESSION['erro'] = 1;
                    header('Location: login.php');
                }
             }else{
                 $_SESSION['erro'] = 1;
                 header('Location: login.php');
             }
             
        }

?>