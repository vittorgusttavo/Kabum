<?php 

    class DbConnection{

        public function _connect ($host = '127.0.0.1:3306', $login = 'root', $senha = '', $database = 'db_testkabum'){
            return mysqli_connect($host, $login, $senha, $database);
        }

        public function _disconnect($conectar){
            $conectar->close();
        }
        
    }

?>