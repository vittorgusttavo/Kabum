<?php 

    include_once ('../db/db_con.php');

    class Cliente{
        private $id;
        private $nome;
        private $cpf;
        private $rg;
        private $dtNascimento;
        private $telefone;

        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        
        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        
        public function getRg(){
            return $this->rg;
        }

        public function setRg($rg){
            $this->rg = $rg;
        }
 
        
        public function getDtNascimento(){
            return $this->dtNascimento;
        }
        public function setDtNascimento($dtNascimento){
            $this->dtNascimento = $dtNascimento;
        }

        
        public function getTelefone(){
            return $this->telefone;
        }
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }   
        /* 
        * CRUD
        */
        public function insert($objeto){
            $nome = $objeto->getNome();
            $cpf = $objeto->getCpf();
            $rg = $objeto->getRg();
            $dtNascimento = $objeto->getDtNascimento();
            $telefone = $objeto->getTelefone();

            $sql = 'INSERT INTO cliente (nome, cpf, rg, dt_nascimento, telefone) VALUES ("'.$nome.'", "'.$cpf.'", "'.$rg.'", "'.$dtNascimento.'", "'.$telefone.'")';
            $db = new DbConnection();
            $con = $db->_connect();
            $con->query($sql);
            return $con->insert_id;
        }

        public function update($objeto){
            $id = $objeto->getId();
            $nome = $objeto->getNome();
            $cpf = $objeto->getCpf();
            $rg = $objeto->getRg();
            $dtNascimento = $objeto->getDtNascimento();
            $telefone = $objeto->getTelefone();

            $sql = 'UPDATE cliente SET nome = "'.$nome.'", cpf= "'.$cpf.'", rg = "'.$rg.'", dt_nascimento = "'.$dtNascimento.'", telefone = "'.$telefone.'" WHERE id='.$id;
            $db = new DbConnection();
            $con = $db->_connect();
            if($res = $con->query($sql)){
                $db->_disconnect($con);
                return true;
            }
            
        }

        public function delete($id){
            $sql = 'DELETE FROM cliente WHERE ID='.$id;

            $db = new DbConnection();

            $con = $db->_connect();
            $res = $con->query($sql);
            
            $db->_disconnect($con);
        }

    }
?>