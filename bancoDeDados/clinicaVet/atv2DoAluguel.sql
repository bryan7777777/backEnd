petshoopINSERT INTO aluguel(idFuncionario,idCliente,dataHoraRetirada)
VALUES
/*6)*/
(1,11,'24-12-08 00:01'),
/*8)*/
(1,13,'24-12-27 03:00'),
(1,17,'24-12-27 03:15'),
(1,12,'24-12-27 03:30'),
/*7)*/
(3,9,'24-12-10 00:10'),
/*9)*/
(3,6,'24-12-28 10:10'),
(3,8,'24-12-28 12:10'),
(3,3,'24-12-28 13:10'),
(3,7,'24-12-28 14:10'),
(3,20,'24-12-28 15:10'),
(3,15,'24-12-28 16:10');

INSERT INTO aluguelEquipamento(idaluguel,idequipamento,valorItem,valorUnitario,qtd)
VALUES
/*6)*/
(1,1,'2.0','2.0',1),
/*8)*/
(2,3,'2.0','2.0',1),
(3,3,'2.0','2.0',1),
(4,3,'2.0','2.0',1),
/*7)*/
(5,2,'3.5','3.5',2),
/*9)*/
(6,2,'3.5','3.5',2),
(7,2,'3.5','3.5',2),
(8,2,'3.5','3.5',2),
(9,2,'3.5','3.5',2),
(10,2,'3.5','3.5',2),
(11,2,'3.5','3.5',2),

(6,4,'3.0','3.0',1),
(7,4,'3.0','3.0',1),
(8,4,'3.0','3.0',1),
(9,4,'3.0','3.0',1),
(10,4,'3.0','3.0',1),
(11,4,'3.0','3.0',1);

/*cadeira2 49*/
UPDATE equipamento
SET qtd='49'
WHERE idequipamento=1

/*cadeira4 86*/
UPDATE equipamento
SET qtd='86'
WHERE idequipamento=2

/*guarda sol p 37*/
UPDATE equipamento
SET qtd='37'
WHERE idequipamento=3

/*guarda sol g 54*/
UPDATE equipamento
SET qtd='54'
WHERE idequipamento=4

/*10)Listar o nome e os contatos de todos os clientes da barraca em ordem alfabética. */
SELECT nomeCliente,celular FROM Cliente
ORDER BY nomeCliente;
 
 
/*11)Listar o nome e o contato telefônico de todos os funcionários da barraca em ordem alfabética. */
SELECT nomeFuncionario,celular FROM funcionario
ORDER BY nomeFuncionario;

/*12)Listar todos os dados dos aluguéis realizados em ordem de data da mais antiga para a mais nova.*/
SELECT * FROM aluguel
ORDER BY dataHoraRetirada;

/*13)Listar nome, cidade e estado de todos os clientes da baixada santista em ordem alfabética por 
nome.*/
SELECT nomecliente,cidade, estado FROM cliente
WHERE estado IN ('SP') AND cidade IN ('Bertioga','Cubatão','Guarujá','Itanhaém','Mongaguá','Peruíbe',
'São Vicente','Santos','Praia Grande')
ORDER BY nomeCliente
 
 
/*14)Listar todos os produtos e a quantidade de estoque do produto que tem mais itens para o que tem 
menos.*/
SELECT nomeEquipamento,qtd FROM equipamento
ORDER BY qtd DESC 
 
/*15)Listar o nome, a cidade e o estado de todos os clientes que moram em casa em ordem alfabética.*/
SELECT nomeCliente,cidade,estado FROM cliente
WHERE complemento IN ('casa',NULL,'') 
ORDER BY nomeCliente
 
 
/*16)Listar o nome de todos os clientes e o estado daqueles que não vivem no estado de SP.*/
SELECT nomeCliente,estado FROM cliente
WHERE estado NOT IN ('SP')
 
 
/*17)Listar o nome de todos os clientes que começam com a letra A.*/
SELECT nomeCliente FROM cliente
WHERE nomecliente LIKE 'A%'
 
 
/*18)Listar todos os dados dos clientes que começam com a letra M e vivam no estado de PE.*/
SELECT * FROM cliente
WHERE estado IN ('PE') AND nomecliente LIKE 'M%'  
 
 
/*19)Listar apenas as cadeiras e a quantidade que possui em estoque em ordem de quantidade, da que
mais possui itens para a que menos possui. */
SELECT nomeEquipamento,qtd FROM equipamento
WHERE nomeEquipamento LIKE 'Cadeira%' ORDER BY qtd DESC

/*20)Listar todos os dados dos alugueis que ocorreram entre 25/12 e 31/12 de 2024 em ordem de data da mais antiga para a mais nova. */
SELECT * FROM aluguel
WHERE dataHoraRetirada >='24-12-25 00:00' && dataHoraRetirada <='24-12-31 00:00' ORDER BY dataHoraRetirada ASC

SELECT * FROM cliente ORDER BY nomecliente;

SELECT * FROM funcionario;

SELECT * FROM equipamento;

SELECT * FROM aluguel;

SELECT * FROM aluguelequipamento;

SELECT NOW();




/*=====================================================================OTA ATV========================================================================*/
/*=====================================================================OTA ATV========================================================================*/
/*=====================================================================OTA ATV========================================================================*/
/*1.Criar um aluguel de equipamento para o mês de novembro (qualquer data e hora), qualquer equipamento, qualquer funcionário e qualquer cliente, mas cujo pagamento não tenha sido feito (ficou em aberto).*/

INSERT INTO aluguel(idfuncionario,idCliente,dataHoraRetirada,dataHoraDevolucao,valorPagar,valorPago,pago,FormaPagamento,qtVezes)
VALUES
(1,13,'2024-12-08 00:01:00', NULL, NULL, 0, 0,'pix', 1);


INSERT INTO aluguelEquipamento(idaluguel,idequipamento,valorItem,valorUnitario,qtd)
VALUES
(12,1,2.0,2.0,4);

/*2.Listar nome de todos os funcionários, cpf e os aluguéis feitos por ele (apenas a data e que equipamento alugou). */

SELECT nomefuncionario,cpffuncionario,dataHoraRetirada,idequipamento FROM aluguelequipamento 
JOIN aluguel,funcionario;

/*3.Listar nome do cliente, cpf, datas que ele esteve na praia, quem atendeu este cliente, tudo isto, ordenado por data, da mais nova para a mais antiga, apenas no mês de DEZ24.  */

SELECT nomecliente,cpfcliente,datahoraretirada,nomefuncionario FROM aluguelequipamento 
JOIN cliente,funcionario,aluguel 
WHERE datahoraretirada LIKE '%12-24%'
ORDER BY datahoraretirada;

-- 4.Lista do nome dos equipamentos que foram mais alugados em ordem decrescente, do equipamento mais alugado para o menos alugado. 
-- Equipamentos não alugados devem sair no relatório. 

SELECT nomeequipamento, COALESCE(SUM(ae.qtd),0)total_alugado
FROM equipamento e JOIN aluguelequipamento ae 
ON e.idequipamento = ae.idequipamento
GROUP BY e.idequipamento,e.nomeequipamento
ORDER BY total_alugado DESC;
 
-- 5. Listar a arrecadação bruta da barraca de praia entre Natal e Ano Novo.
 
SELECT COALESCE(SUM(a.valorPago), 0) as arrecadacao_bruta
FROM aluguel a
WHERE a.dataHoraRetirada BETWEEN '2024-12-24' AND '2024-12-31 23:59:59'
AND a.pago = 1;
 
-- 6. Reajustar preço por hora de todos os equipamentos em 10%.
 
UPDATE equipamento
SET valorHora = valorHora * 1.10;
 
SELECT * FROM equipamento
 
-- 7. Listar a quantidade de clientes que pagaram utilizando determinada forma de pagamento,
-- em ordem crescente, do método mais usado para o menos usado.
-- Também é necessário que pagamentos não realizados sejam apontados.
 
SELECT COALESCE(formaPagamento, 'Não realizado') as forma_pagamento, COUNT(*) as quantidade FROM aluguel
GROUP BY formaPagamento
ORDER BY quantidade DESC;
 
-- 8. Listar quanto a barraca faturou por dia, em cada um dos dias do mês de dezembro apenas.
 
SELECT DATE(dataHoraRetirada) as dia,
COALESCE(SUM(valorPago), 0) as faturamento_dia
FROM aluguel
WHERE YEAR(dataHoraRetirada) = 2024 AND MONTH(dataHoraRetirada) = 12
AND pago = 1
GROUP BY DATE(dataHoraRetirada)
ORDER BY dia;

-- 9 Primeiro excluir da tabela aluguelEquipamento (tabela filha)
DELETE FROM aluguelEquipamento
WHERE idaluguel = (SELECT idaluguel FROM aluguel WHERE idFuncionario = 1 AND idCliente = 1 AND dataHoraRetirada = '2024-11-15 10:00:00');
 
-- Depois excluir da tabela aluguel (tabela pai)
DELETE FROM aluguel
WHERE idFuncionario = 1 AND idCliente = 1 AND dataHoraRetirada = '2024-11-15 10:00:00';
 
/*
RESPOSTA: Se tentar excluir direto da tabela aluguel teremos um erro de violação de chave estrangeira.
Isto ocorre porque existem registros na tabela aluguelEquipamento que referenciam o registro na tabela aluguel.
Para resolver, devemos primeiro excluir os registros filhos (aluguelEquipamento) e depois os registros pais (aluguel).
*/
 
-- 10. Listar todos os equipamentos que tiveram a quantidade de aluguéis inferiores a 5 unidades, durante o mês de DEZ24.
 
SELECT e.nomeequipamento, COALESCE(SUM(ae.qtd), 0) as total_alugado
FROM equipamento e
LEFT JOIN aluguelEquipamento ae ON e.idequipamento = ae.idequipamento
LEFT JOIN aluguel a ON ae.idaluguel = a.idaluguel
WHERE (YEAR(a.dataHoraRetirada) = 2024 AND MONTH(a.dataHoraRetirada) = 12) OR a.idaluguel IS NULL
GROUP BY e.idequipamento, e.nomeequipamento
HAVING COALESCE(SUM(ae.qtd), 0) < 5;





