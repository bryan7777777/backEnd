CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpfCliente CHAR(11) NOT NULL UNIQUE
);

CREATE TABLE funcionario (
idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
nomeFuncionario VARCHAR(50) NOT NULL,
cpfFuncionario CHAR(11) NOT NULL UNIQUE,
celularFuncionario CHAR(11) NOT NULL
);

CREATE TABLE equipamento (
idequipamento INT PRIMARY KEY AUTO_INCREMENT,
nomeequipamento VARCHAR(50) NOT NULL,
qtd INT NOT NULL,
valorHora DECIMAL(5,2) NOT NULL
);

CREATE TABLE aluguel (
idaluguel INT PRIMARY KEY AUTO_INCREMENT,
idequipamento INT NOT NULL,
idFuncionario INT NOT NULL,
idCliente INT NOT NULL,
dataHoraRetirada DATETIME NOT NULL,
dataHoraDevolucao DATETIME,
valorPagar DECIMAL (10,2),
valorPago DECIMAL (10,2),
pago BIT,
formaPagamento VARCHAR(50),
qtVezes INT,
CONSTRAINT fk_aluguel_funcionario FOREIGN KEY (idFuncionario)
REFERENCES funcionario(idFuncionario),
CONSTRAINT fk_aluguel_client FOREIGN KEY (idCliente)
REFERENCES cliente(idCliente)
);

CREATE TABLE aluguelEquipamento (
idaluguelEquipamento INT PRIMARY KEY AUTO_INCREMENT,
idequipamento INT NOT NULL,
idaluguel INT NOT NULL,
valorItem DECIMAL (10,2) NOT NULL,
valorUnitario DECIMAL (10,2) NOT NULL,
qtd INT,
CONSTRAINT fk_aluguelEquipamento_equipamento FOREIGN KEY (idequipamento)
REFERENCES equipamento(idequipamento),
CONSTRAINT fk_aluguelEquipamento_aluguel FOREIGN KEY (idaluguel)
REFERENCES aluguel(idaluguel)
);

INSERT INTO cliente(nomeCliente,cpfCliente,email,cidade,estado,cep,tipoLogradouro,nomeLogradouro,numero,complemento)
VALUES
('Donald','32165498700','donald@uol.com.br','Santos','SP','11030001','Rua','das Gaivotas','125','Casa'),
('Margarida','45612378955','margarida@uol.com.br','São Vicente','SP','11320010','Avenida','Flor de Maio','88','Apartamento 12'),
('Patinhas','78965412399','patinhas@uol.com.br','Florianópolis','SC','88015200','Rua','dos Pinhais','410','Casa'),
('Huguinho','14523698701','huguinho@gmail.com','Santos','SP','11050040','Rua','Dom Duarte','233','Apartamento 21'),
('Luizinho','25896314785','luizinho@gmail.com','Praia Grande','SP','11700450','Avenida','Atlântica','915','Apartamento 35'),
('Zezinho','96385274112','zezinho@gmail.com','São Vicente','SP','11350020','Rua','Itororó','56','Casa'),
('Pardal','35795125899','pardal@uol.com.br','Santos','SP','11040030','Rua','Pedro Lessa','725','Casa'),
('Zé Carioca','65478932177','zecarioca@uol.com.br','Rio de Janeiro','RJ','20230015','Rua','das Palmeiras','50','Casa'),
('Mickey','78541236944','mickey@hotmail.com','Recife','PE','50030020','Avenida','Boa Viagem','1420','Apartamento 402'),
('Minie','98745632170','minie@gmail.com','Recife','PE','50060230','Rua','Aurora','98','Apartamento 18'),
('Pateta','12378965420','pateta@gmail.com','Curitiba','PR','80010030','Rua','XV de Novembro','111','Apartamento 15'),
('Branca de Neve','65412398711','brancadeneve@hotmail.com','São Joaquim','SC','88600000','Rua','das Neves','74','Apartamento 03'),
('Aladin','78912365488','aladin@gmail.com','Belém','PA','66010050','Travessa','Nazaré','301','Apartamento 11'),
('Cinderela','96374125833','cinderela@hotmail.com','Goiânia','GO','74000020','Rua','dos Sonhos','400','Casa'),
('Mulan','35715948622','mulan@gmail.com','Rio das Ostras','RJ','28890000','Rua','do Luar','182','Apartamento 22'),
('Moana','85245697130','moana@gmail.com','Paraty','RJ','23970000','Avenida','das Águas','377','Apartamento 02'),
('Asnésio','95135725860','asnesio@uol.com.br','Belo Horizonte','MG','30110020','Rua','Minas Gerais','295','Apartamento 13'),
('Maga Patalógica','75395145699','magapatalogica@gmail.com','Cubatão','SP','11510050','Rua','São Paulo','55','Apartamento 24'),
('Capitão Boeing','85274196310','capitaoboeing@uol.com.br','Manaus','AM','69005100','Rua','Amazonas','101','Casa'),
('Pão Duro Mac Money','78965425871','paoduro@ig.com.br','Osasco','SP','06010120','Rua','dos Economistas','12','Apartamento 44');

INSERT INTO funcionario(nomeFuncionario,cpfFuncionario,celularFuncionario)
VALUES
('Cebolinha','32165498711','91030001'),
('Cascão','32165498701','98030001'),
('Chico Bento','32165498702','18030001');

INSERT INTO equipamento(nomeequipamento,qtd,valorHora)
VALUES
('Cadeira 02 posições','50','2.00'),
('Cadeira 04 posições','100','3.50'),
('Guarda Sol P','40','2.00'),
('Guarda Sol G','60','3.00'),
('Mesinha','30','1.50');


ALTER TABLE cliente ADD(
email VARCHAR(50) NOT NULL,
cidade VARCHAR(50) NOT NULL,
estado CHAR(2) NOT NULL,
cep CHAR(8),
tipoLogradouro VARCHAR(15) NOT NULL,
nomeLogradouro VARCHAR(50) NOT NULL,
numero VARCHAR(6) NOT NULL,
complemento VARCHAR(30)
); 

SHOW TABLES 

SELECT * FROM cliente

SELECT * FROM funcionario

SELECT * FROM equipamento

DROP TABLE 
