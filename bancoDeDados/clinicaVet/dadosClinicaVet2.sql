/* busca generica de dados */
SELECT * FROM animal

/* busca especifica de dados */
SELECT nomeAnimal,peso FROM animal

/* inserção explicita */
INSERT INTO cliente(nomeCliente,cpf,celular,email,cidade,estado,cep,tipoLogradouro,nomeLogradouro,numero,complemento)
VALUES('Augustinho Carrara','00100100101','123451234','augustinho@email.com.br','sp','sp','','avenida sem fim','rua que n existe','00','0000');

/* inserção implicita */
INSERT INTO cliente
VALUES(2,'Beiçola','00100100102','123451232','beicola@email.com.br','sp','sp','','avenida sem fim','rua que n existe','01','0100');



SELECT * FROM cliente