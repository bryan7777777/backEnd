SELECT nomecliente,cidade,estado FROM cliente
WHERE estado LIKE 'sp'



SELECT nomecliente,cidade,estado FROM cliente
WHERE nomeCliente LIKE  'a%'&& estado = 'sp'||nomeCliente LIKE  'a%'&& estado ='rj' 



SELECT nomecliente,cidade,estado,celular FROM cliente
WHERE nomeCliente LIKE  'f%' and estado = 'sp'||nomeCliente LIKE  'f%' and estado ='rj'||nomeCliente LIKE  'f%' and estado ='mg' ||nomeCliente LIKE  'f%' and estado ='es' 



SELECT nomecliente,cidade,celular,tipologradouro,complemento FROM cliente
WHERE complemento IS NULL ||complemento LIKE 'f%'||complemento LIKE 'cas%'
ORDER BY nomeCliente



SELECT nomecliente,cidade,estado,celular,tipologradouro FROM cliente
WHERE estado = 'sp'&&tipologradouro='avenida'
ORDER BY nomeCliente



SELECT nomeCliente, cidade FROM cliente
WHERE nomeCliente LIKE 'R%'
ORDER BY nomeCliente



SELECT idCliente, nomeCliente, email, cpf FROM cliente
WHERE email LIKE ('%@uol.%') AND estado IN ('SP')
ORDER BY nomeCliente


estado IN ('ps','sp')

-- ===========================================================================================

/*Criação da view */
CREATE VIEW vw_ClienteAluguelFuncionario AS 

/*corpo da view*/
SELECT nomeCliente, dataHoraRetirada, nomeFuncionario 
FROM cliente 
INNER JOIN aluguel 
ON cliente.idCliente = aluguel.idCliente
INNER JOIN funcionario
ON funcionario.idFuncionario = aluguel.idFuncionario
 
/*Exclusão da View */
DROP VIEW vw_ClienteAluguelFuncionario
 
/*Utilização da view sem filtros*/
SELECT email FROM vw_ClienteAluguelFuncionario
 
/*Utilização da view com filtros*/
SELECT email FROM vw_ClienteAluguelFuncionario 
WHERE nomeCliente LIKE 'm%'
ORDER by nomeCliente
 
-- ===========================================================================================
--PU

CREATE PROCEDURE pu_valorItemEquipamento (IN valorAtt VARCHAR(50), id VARCHAR(100))
UPDATE equipamento 
SET valor = valor * concat('1.', valorAtt) 
WHERE idEquipamento = id;

CALL pu_valorItemEquipamento('10') /*chamar a procedure e executá-la */
 
--PS

CREATE PROCEDURE ps_PessoaEstado (IN cidade1 VARCHAR(50), estado1 CHAR(2))
SELECT cidade, estado FROM cliente  
WHERE cidade LIKE concat(cidade1,'%') AND estado = estado1
ORDER BY nomeCliente ASC ;

CALL ps_PessoaEstado('São Paulo', 'SP') /*chamar a procedure e executá-la */