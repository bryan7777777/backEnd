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