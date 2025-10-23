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

CREATE TABLE contatoTelefonico (
idContatoTelefone INT PRIMARY KEY AUTO_INCREMENT,
ddi VARCHAR(5) NOT NULL,
ddd VARCHAR(5) NOT NULL,
numero CHAR(9) NOT NULL,
idCliente INT NOT NULL,
CONSTRAINT fk_ContatoTelefonico_cliente FOREIGN KEY (idCliente)
REFERENCES cliente(idCliente)
);

CREATE TABLE animal(
idAnimal INT PRIMARY KEY AUTO_INCREMENT,
nomeAnimal VARCHAR(50) NOT NULL,
especie VARCHAR(50) NOT NULL,
raca VARCHAR(50) NOT NULL,
peso DECIMAL(5,2),
porte CHAR(1) CHECK (porte="p"||porte="m"||porte="g"||porte="n"),
sexo CHAR(1) CHECK (sexo="m"||sexo="f"),
idCliente INT NOT NULL,
dataNascimento DATE NOT NULL,
CONSTRAINT fk_animal_cliente FOREIGN KEY (idCliente)
REFERENCES cliente(idCliente)
);

CREATE TABLE veterinario(
idVeterinario INT PRIMARY KEY AUTO_INCREMENT,
nomeVet VARCHAR(50) NOT NULL,
celularVet CHAR(11) NOT NULL,
crmv VARCHAR(20) NOT NULL UNIQUE,
especialidade VARCHAR(50)
);

CREATE TABLE consulta (
idconsulta INT PRIMARY KEY AUTO_INCREMENT,
idAnimal INT NOT NULL,
idVeterinario INT NOT NULL,
dataHora DATETIME NOT NULL,
pago BIT NOT NULL DEFAULT 0,
formaPago VARCHAR(50) NOT NULL,
qtdVezes TINYINT DEFAULT 1,
valorTotal DECIMAL(10,2) NOT NULL,
valorPago DECIMAL(10,2),
CONSTRAINT fk_consulta_animal FOREIGN KEY (idAnimal)
REFERENCES animal(idAnimal),
CONSTRAINT fk_consulta_vet FOREIGN KEY (idVeterinario)
REFERENCES veterinario(idVeterinario)
);

CREATE TABLE tipoServico (
idTipoServico INT PRIMARY KEY AUTO_INCREMENT,
nomeServico VARCHAR(50) NOT NULL,
valor DECIMAL(10,2) NOT NULL
);

CREATE TABLE ConsultatipoServicoConsulta (
idConsultatipoServicoConsulta INT PRIMARY KEY AUTO_INCREMENT,
idConsulta INT NOT NULL,
idTipoServico INT NOT NULL,
valorServico DECIMAL(10,2) NOT NULL,
CONSTRAINT fk_ConsultatipoServico_consulta FOREIGN KEY (idConsulta)
REFERENCES consulta(idConsulta),
CONSTRAINT fk_ConsultatipoServico_tipoServico FOREIGN KEY (idTipoServico)
REFERENCES tipoServico(idTipoServico)
);petshoop

SHOW TABLES 

DROP TABLE xxx