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