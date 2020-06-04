create database db_testkabum;
use db_testkabum;

/*
* CRIAÇÕES DE TABELAS
*/

CREATE TABLE usuario (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
nome  VARCHAR(100) NOT NULL,
login VARCHAR(30) NOT NULL,
senha VARCHAR(50) NOT NULL
);

CREATE TABLE cliente (
id    			INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
nome  			VARCHAR(100) NOT NULL,
cpf   			VARCHAR(11) NOT NULL,
rg    			VARCHAR(9) NOT NULL,
dt_nascimento	DATE NOT NULL,
telefone		VARCHAR(11)
); 

CREATE TABLE endereco (
id	INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
rua VARCHAR(50) NOT NULL,
numero VARCHAR(20) NOT NULL,
cidade VARCHAR(50) NOT NULL,
sigla_estado VARCHAR(3) NOT NULL,
complemento VARCHAR(50),
id_cliente INT NOT NULL
);

/*
* Criando as FK's
*/
ALTER TABLE endereco ADD CONSTRAINT fk_id_cliente FOREIGN KEY (id_cliente) REFERENCES cliente (id) ON DELETE CASCADE;
/*
* 
*/

INSERT INTO usuario (nome, login, senha) VALUES ('Admin', 'admin', md5('admin'));