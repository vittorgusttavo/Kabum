<?php 

header ('Content-type: text/html; charset=UTF-8');
include_once ('../db/db_con.php');
include_once ('Formulario.php');
include_once ('Tabela.php');

    function _header($title){
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                <html xmlns="https://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
                <head>
                <meta charset=UTF-8 />
                <link href="../css/style.css" rel="stylesheet" >
                <script src="../js/jquery-3.5.1.min.js" type="text/javascript"></script>
                <script src="../js/jquery.mask.min.js" type="text/javascript"></script>
                <title>'.$title.'</title>
                </head>
                <body>';
    }

    function _menu($class){
        echo '<header>
              <nav>
                    <ul class="'.$class.'">
                        <li id="home"><a href="../tela/home.php">Home</a></li>
                        <li id="logout"><a href="../tela/logout.php?token='.md5($_SESSION['id']).'">Sair</a></li>
                    </ul>
              </nav>
              </header>';
                    
    }

    function _footer(){
        echo '
              </body></html>';
    }


?>