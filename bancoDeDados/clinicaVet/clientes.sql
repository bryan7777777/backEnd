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



















DELIMITER //

CREATE PROCEDURE attEstoqueAluguel(
    IN idCli INT,
    IN idFunc INT,
    IN idItem INT,
    IN qtdItens INT,
    IN valorIT DECIMAL(10,2),
    IN valorUNI DECIMAL(10,2)
)
BEGIN
    START TRANSACTION;
    
    -- Atualiza o estoque
    UPDATE equipamento
    SET qtd = qtd - qtdItens
    WHERE idEquipamento = idItem;
    
    -- Insere o aluguel
    INSERT INTO aluguel (idCliente, idFuncionario, dataHoraRetirada)
    VALUES (idCli, idFunc, NOW());
    
    -- Insere os detalhes do equipamento alugado
    INSERT INTO aluguelEquipamento (idEquipamento, idAluguel, valorItem, valorUnitario, qtd)
    VALUES (idItem, LAST_INSERT_ID(), valorIT, valorUNI, qtdItens);
    
    COMMIT;
END //

DELIMITER ;

CALL attEstoqueAluguel(1, 2, 3, 5, 100.00, 20.00);