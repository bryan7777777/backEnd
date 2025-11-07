SELECT * FROM cliente
SELECT * FROM animal
SELECT * FROM veterinario
SELECT * FROM consulta
SELECT * FROM consultatiposervicoconsulta
SELECT * FROM tiposervico
DROP TABLE contatotelefonico

INSERT INTO animal (idCliente, nomeAnimal, especie, raca, peso, porte, sexo, dataNascimento)
VALUES
(1,  'Thor',  'Canino', 'SRD', 12.40, 'M', 'M', 2021),
(7,  'Maya',  'Felino', 'Siames', 4.20, 'P', 'F', 2023),
(12, 'Pingo', 'Canino', 'Pinscher', 3.10, 'P', 'M', 2022),
(18, 'Luna',  'Felino', 'Persa', 3.80, 'P', 'F', 2020),
(22, 'Zeca',  'Ave',    'Calopsita', 0.09, 'P', 'M', 2024);
 
INSERT INTO veterinario (nomeVet, celularVet, crmv, especialidade)
VALUES 
('Farinhas Breno', 999999993, 19234511070, 'Vet de Animais Intolerantes Celíacos'),
('Camila Souza', 988887777, 20234511111, 'Cirurgiã de Pequenos Animais'),
('Rafael Nogueira', 997654321, 18256722222, 'Clínico Geral e Emergencista'),
('Larissa Almeida', 996543210, 17287633333, 'Especialista em Felinos'),
('Pedro Henrique', 995432109, 16234544444, 'Anestesista Veterinário'),
('Juliana Ribeiro', 994321098, 19298755555, 'Dermatologista de Animais Domésticos'),
('Lucas Fernandes', 993210987, 15287666666, 'Ortopedista Veterinário'),
('Ana Beatriz Costa', 992109876, 14234577777, 'Especialista em Animais Silvestres'),
('Gabriel Martins', 991098765, 13287688888, 'Cardiologista Veterinário'),
('Patrícia Lima', 990987654, 12234599999, 'Nutricionista Animal');
 
/* 1 */
INSERT INTO consulta (idanimal,idveterinario,datahora,pago,formapago,qtdvezes,valortotal,valorpago)
VALUES 
(2,1,'24-06-02',1,'dinheiro',2,300,150),
(2,2,'24-07-05',1,'dinheiro',2,300,150);

INSERT INTO consultatiposervicoconsulta (idconsulta,idtiposervico,valorservico)
VALUES 
(NULL,4,300);

/* 2 */
INSERT INTO consulta (idanimal,idveterinario,datahora,pago,formapago,qtdvezes,valortotal,valorpago)
VALUES 
(2,3,'24-08-02',1,'dinheiro',2,400,400),

INSERT INTO consultatiposervicoconsulta (idconsulta,idtiposervico,valorservico)
VALUES 
(NULL,4,300),
(NULL,3,100);


/* 1 */
INSERT INTO consulta (IdAnimal, IdVeterinario, DataHora, pago, formapagto, qtdvezes, Valortotal, ValorPago)
VALUES (1,1,'2025-10-10 20:20:20',1,'débito',1, 100.00,100.00);
INSERT INTO consulta (IdAnimal, IdVeterinario, DataHora, pago, formapagto, qtdvezes, Valortotal, ValorPago)
VALUES (1,1,'2025-11-11 20:20:20',1,'débito',1, 100.00,100.00);

INSERT INTO consultatiposervico (idconsulta, idtiposervico, valorservico)
VALUES (3,3,100.00);
INSERT INTO consultatiposervico (idconsulta, idtiposervico, valorservico)
VALUES (4,5,100.00);


/* 2 */
INSERT INTO consulta (IdAnimal, IdVeterinario, DataHora, pago, formapagto, qtdvezes, Valortotal, ValorPago)
VALUES (2,1,'2025-09-09 20:21:20',1,'débito',1, 200.00,200.00);

INSERT INTO consultatiposervico (idconsulta, idtiposervico, valorservico)
VALUES (5,3,100.00);
INSERT INTO consultatiposervico (idconsulta, idtiposervico, valorservico)
VALUES (5,5,100.00);
 



/*FROM veterinario (dentro da... meu id esta na consulta) INNER JOIN (dentro de mim... idveterinario esta em mim)consulta*/
SELECT nomeveterinario,crmv,datahora FROM veterinario
INNER JOIN consulta
/*ON (tabela1).(id da tabela1)=(tabela2).(id da tabela2 que corresponde com a tabela1 assim ele se auto iguala, por ex o veterinario é 1? ent ele é o 1!)*/
ON veterinario.idveterinario=consulta.idveterinario

/*LEFT JOIN - ordenado por nome, depois por data - apenas veterinarios com a letra P*/ 
SELECT nomeVeterinario, crmv, dataHora, valorTotal 
FROM veterinario LEFT JOIN consulta
ON veterinario.idveterinario = consulta.idVeterinario
WHERE nomeVeterinario LIKE 'P%'
ORDER BY nomeVeterinario,dataHora ASC


/* A - Nome do animal, nome do cliente, contatos do cliente 
em ordem alfabética por nome do animal
apenas clientes que morem no estado SP*/
SELECT nomeanimal,nomecliente,estado,celular FROM cliente
INNER JOIN animal
ON cliente.idcliente=animal.idcliente
WHERE estado LIKE 'sp'
ORDER BY nomeCliente 
 
/* B - Nome do animal, peso, que animal que é, nome do cliente de todos os animais
em ordem alfabética por nome do animal */
SELECT nomeanimal,peso,especie,nomecliente FROM cliente
INNER JOIN animal
ON cliente.idcliente=animal.idcliente
ORDER BY nomeanimal

/* C - Nome do procedimento, seu valor, de todos os procedimentos que foram realizados
em alguma consulta, em ordem alfabética por nome do procedimento. Também se requer a data
em que foram realizados os procedimentos.*/  
SELECT nomeservico,valor,datahora FROM consultatiposervicoconsulta
INNER JOIN consulta, tiposervico
/*ON consulta.idconsulta=consultatiposervicoconsulta.idconsulta && tiposervico.idTipoServico=consultatiposervicoconsulta.idTipoServico*/
ORDER BY nomeservico



SELECT ts.nomeServico, ts.valor, c.dataHora AS data_realizacao
FROM tipoServico ts
JOIN ConsultatipoServicoConsulta ctsc ON ts.idTipoServico = ctsc.idTipoServico
JOIN consulta c ON ctsc.idConsulta = c.idConsulta
ORDER BY ts.nomeServico;

/* D - Nome do procedimento, seu valor, de todos os procedimentos cadastrados sejam
realizados ou não em alguma consulta, em ordem alfabética por nome do procedimento. 
Também se requer a data em que foram realizados os procedimentos.*/
SELECT nomeservico,valor,datahora FROM consultatiposervicoconsulta
LEFT JOIN consulta, tiposervico

ORDER BY nomeservico
 
/* E - Nome do cliente, cpf, cidade, estado de todos os clientes
que vivem na região sudeste em ordem alfabética por nome e cidade.*/
SELECT nomecliente,cpf,cidade,estado FROM cliente
WHERE estado IN ('sp','es','rj','mg');

/*function agre*/
SELECT COUNT(idanimal) AS 'qtd de donos de humanos' FROM animal 

SELECT MAX(idcliente) AS 'o ultimo caba' FROM cliente
SELECT MIN(idcliente) AS 'o primeiro caba' FROM cliente

SELECT AVG(peso) AS 'média de coxinhas comidas por dia' FROM animal

SELECT SUM(valorpago) AS 'dinheiro total conseguido de forma honesta sem tigrinho' FROM consulta

/*group by*/
SELECT estado, COUNT(idcliente) AS 'cabas' FROM cliente
WHERE estado IN ('sp') /*FILTRO*/
GROUP BY estado        /*AGRUPAMENTE*/
ORDER BY estado DESC   /*ORDENAÇÃO*/


SELECT * FROM animal

SELECT especie, COUNT(idanimal) AS 'animais fonfis' FROM animal
GROUP BY especie

SELECT especie, COUNT(idanimal) AS 'animais fonfis' FROM animal
GROUP BY especie
HAVING COUNT(idanimal)>1