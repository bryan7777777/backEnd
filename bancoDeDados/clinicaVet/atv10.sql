CREATE DATABASE sistema_clientes;
 
USE sistema_clientes;
 
CREATE TABLE clientes (
   id INT AUTO_INCREMENT PRIMARY KEY,
   nome VARCHAR(100) NOT NULL,
   endereco VARCHAR(150),
   cidade VARCHAR(100),
   bairro VARCHAR(100)
);

SELECT * FROM clientes;




CREATE DATABASE sistema_produtos;

USE sistema_produtos;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    descricao TEXT
);

SELECT * FROM produtos




CREATE DATABASE sistema_imobiliaria;

USE sistema_imobiliaria;

CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE,
celular CHAR(11) NOT NULL,
email VARCHAR(50) NOT NULL,
cidade VARCHAR(50) NOT NULL,
estado CHAR(2) NOT NULL,
cep CHAR(8),
tipoLogradouro VARCHAR(15) NOT NULL,
nomeLogradouro VARCHAR(50) NOT NULL,
numero VARCHAR(6) NOT NULL,
complemento VARCHAR(30)
);

CREATE TABLE imovel(
idImovel INT PRIMARY KEY AUTO_INCREMENT,
idCliente INT NOT NULL,
tipoImovel VARCHAR(50) NOT NULL,
finalidade VARCHAR(50) NOT NULL,
localizacao VARCHAR(50) NOT NULL,
areaCostruida DECIMAL(10,2) NOT NULL,
areaTerreno DECIMAL(10,2) NOT NULL,
qtdQuartos INT NOT NULL,
qtdBanheiros INT NOT NULL,
qtdGaragem INT NOT NULL,
descricao VARCHAR(50) NOT NULL,
CONSTRAINT fk_imovel_cliente FOREIGN KEY (idCliente)
REFERENCES cliente(idCliente)
);

DROP TABLE imovel;

SELECT * FROM cliente;
SELECT * FROM imovel