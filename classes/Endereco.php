<?php 

    class Endereco{
        private $id;
        private $rua;
        private $numero;
        private $cidade;
        private $siglaEstado;
        private $complemento;
        private $idCliente;


        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }


        public function getRua(){
            return $this->rua;
        }
        public function setRua($rua){
            $this->rua = $rua;
        }


        public function getNumero(){
            return $this->numero;
        }
        public function setNumero($numero){
            $this->numero = $numero;
        }


        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }


        public function getSiglaEstado(){
            return $this->siglaEstado;
        }
        public function setSiglaEstado($siglaEstado){
            $this->siglaEstado = $siglaEstado;
        }


        public function getComplemento(){
            return $this->complemento;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }


        public function getIdCliente(){
            return $this->idCliente;
        }
        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }

        /* 
        * CRUD
        */
        public function insert($objeto){
            $rua = $objeto->getRua();
            $numero = $objeto->getNumero();
            $cidade = $objeto->getCidade();
            $siglaEstado = $objeto->getSiglaEstado();
            $complemento = $objeto->getComplemento();
            $idCliente = $objeto->getIdCliente();

            $sql = 'INSERT INTO endereco (rua, numero, cidade, sigla_estado, complemento, id_cliente)
                    VALUES ("'.$rua.'", "'.$numero.'", "'.$cidade.'", "'.$siglaEstado.'", "'.$complemento.'", "'.$idCliente.'")';

            $db = new DbConnection();
            $con = $db->_connect();
            $con->query($sql);
            return $con->insert_id;
        }

        public function update($objeto){
            $id = $objeto->getId();
            $rua = $objeto->getRua();
            $numero = $objeto->getNumero();
            $cidade = $objeto->getCidade();
            $siglaEstado = $objeto->getSiglaEstado();
            $complemento = $objeto->getComplemento();

            $sql = 'UPDATE endereco SET rua = "'.$rua.'", numero= "'.$numero.'", cidade = "'.$cidade.'", sigla_estado = "'.$siglaEstado.'", complemento = "'.$complemento.'" WHERE id='.$id;
            $db = new DbConnection();
            $con = $db->_connect();
            if($res = $con->query($sql)){
                $db->_disconnect($con);
                return true;
            }
        }

        public function delete($id){
            $sql = 'DELETE FROM endereco WHERE ID='.$id;

            $db = new DbConnection();

            $con = $db->_connect();
            $res = $con->query($sql);
            
            $db->_disconnect($con);
        }
    }
?>