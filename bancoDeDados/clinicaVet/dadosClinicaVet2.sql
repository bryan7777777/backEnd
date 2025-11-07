/* busca generica de dados */
SELECT * FROM animal

/* busca especifica de dados */
SELECT nomeAnimal,peso FROM animal

/* inserção explicita */
INSERT INTO cliente(nomeCliente,cpf,celular,email,cidade,estado,cep,tipoLogradouro,nomeLogradouro,numero,complemento)
VALUES('bom dia','20100100101','123451234','augustinho@email.com.br','sp','sp','','avenida sem fim','rua que n existe','00','0000');

INSERT INTO cliente (nomeCliente,cpf,celular, email, cidade, estado, cep, tipologradouro,nomelogradouro, numero, complemento) 
VALUES
('João da Silva' , '12345678900' , '11912345678' , 'joao.silva@email.com' , 'São Paulo' , 'SP' , '01001000' , 'Rua' , 'Augusta' , '123' , 'Apto 12'),
('Ana Pereira' , '98765432199' , '21998765432' , 'ana.pereira@email.com' , 'Rio de Janeiro' , 'RJ' , '22041001' , 'Avenida' , 'Atlântica' , '456' , 'Bloco B'),
('Carlos Souza' , '34567890122' , '31991234567' , 'carlos.souza@email.com' , 'Belo Horizonte' , 'MG' , '30130110' , 'Rua' , 'da Bahia' , '890' , 'Sala 3'),
('Mariana Oliveira' , '45678901233' , '41987654321' , 'mariana.oliveira@email.com' , 'Curitiba' , 'PR' , '80010000' , 'Alameda' , 'Cabral' , '77' , 'Casa 2'),
('Pedro Gomes' , '56789012344' , '51999887766' , 'pedro.gomes@email.com' , 'Porto Alegre' , 'RS' , '90010150' , 'Rua' , 'dos Andradas' , '345' , 'Fundos'),
('Luciana Alves' , '67890123455' , '61912349876' , 'luciana.alves@email.com' , 'Brasília' , 'DF' , '70040010' , 'Setor' , 'Comercial Norte' , '25' , 'Sala 201'),
('Rafael Lima' , '78901234566' , '85998761122' , 'rafael.lima@email.com' , 'Fortaleza' , 'CE' , '60060350' , 'Avenida' , 'Beira Mar' , '999' , 'Cobertura'),
('Patrícia Ferreira' , '89012345677' , '71991238899' , 'patricia.ferreira@email.com' , 'Salvador' , 'BA' , '40015970' , 'Ladeira' , 'da Barra' , '58' , null),
('Fernando Costa' , '90123456788' , '19987654433' , 'fernando.costa@email.com' , 'Campinas' , 'SP' , '13010200' , 'Rua' , 'Conceição' , '312' , 'Sala 5'),
('Gabriela Santos' , '01234567899' , '27992345566' , 'gabriela.santos@email.com' , 'Vitória' , 'ES' , '29010180' , 'Avenida' , 'Beira Rio' , '500' , null),
('Bruno Rocha' , '11122233344' , '62981233344' , 'bruno.rocha@email.com' , 'Goiânia' , 'GO' , '74003010' , 'Rua' , '24 de Outubro' , '210' , 'Loja 1'),
('Isabela Mendes' , '22233344455' , '95992223344' , 'isabela.mendes@email.com' , 'Boa Vista' , 'RR' , '69301040' , 'Travessa' , 'das Flores' , '14' , null),
('Felipe Araújo' , '33344455566' , '92988775566' , 'felipe.araujo@email.com' , 'Manaus' , 'AM' , '69005040' , 'Avenida' , 'Eduardo Ribeiro' , '801' , 'Apto 303'),
('Larissa Martins' , '44455566677' , '48991112233' , 'larissa.martins@email.com' , 'Florianópolis' , 'SC' , '88010400' , 'Rua' , 'Felipe Schmidt' , '230' , null),
('André Teixeira' , '55566677788' , '98999001111' , 'andre.teixeira@email.com' , 'São Luís' , 'MA' , '65010030' , 'Avenida' , 'Pedro II' , '77' , 'Casa 1'),
('Beatriz Nogueira' , '66677788899' , '13988223344' , 'beatriz.nogueira@email.com' , 'Santos' , 'SP' , '11010001' , 'Rua' , 'Conselheiro Nébias' , '920' , 'Bloco A'),
('Rodrigo Ribeiro' , '77788899900' , '16991225566' , 'rodrigo.ribeiro@email.com' , 'Ribeirão Preto' , 'SP' , '14010060' , 'Avenida' , 'Independência' , '410' , null),
('Carla Fernandes' , '88899900011' , '84998123344' , 'carla.fernandes@email.com' , 'Natal' , 'RN' , '59020120' , 'Rua' , 'das Dunas' , '199' , null),
('Ricardo Barbosa' , '99900011122' , '67991122233' , 'ricardo.barbosa@email.com' , 'Campo Grande' , 'MS' , '79002970' , 'Avenida' , 'Afonso Pena' , '321' , 'Sala 10'),
('Vanessa Castro' , '10120230344' , '82999998888' , 'vanessa.castro@email.com' , 'Maceió' , 'AL' , '57020000' , 'Rua' , 'do Sol' , '76' , 'Fundos');
 
/* inserção implicita */
INSERT INTO cliente
VALUES(2,'Beiçola','00100100102','123451232','beicola@email.com.br','sp','sp','','avenida sem fim','rua que n existe','01','0100');

/* alterar dado */
UPDATE cliente 
SET cidade='rio de janeiro',email='sal@gmail.com.br.gov.use',estado='rj',cep=null,nomeLogradouro='maje',numero='07',complemento='oi 55' 
WHERE idCliente=4

/* exclusão de dados */
/*DELETE FROM cliente
where idCliente=2*/

/*busca basica*/
/*1*/
SELECT * FROM cliente
WHERE cidade LIKE  '%p'
/*2*/
SELECT idCliente,cidade FROM cliente
WHERE cidade <>  'sp'
/*3*/
SELECT nomeCliente, celular, email FROM cliente
ORDER BY nomeCliente DESC
/*4*/

/*exibir tabelas*/
SELECT * FROM cliente

INSERT INTO tiposervico (nomeservico, valor)
VALUES 
('Consulta Padrão',150),
('Consulta Emergência',250),
('Exame - Sangue',100),
('Exame - Ultrassom|Raio X',300),
('Vacina - Geral',100),
('Castração',80),
('Internação',600);

INSERT INTO consulta(idAnimal, idVeterinario, dataHora, pago, formaPago, qtdVezes, valorTotal, valorPago)
VALUES
(5, 2, '2025-10-20 14:30:00', 1, 'Cartão de crédito', 2, 180.00, 180.00),
(4, 1, '2025-10-25 09:15:00', 0, 'Dinheiro', 1, 120.00, NULL),
(3, 3, '2025-11-02 16:00:00', 1, 'Pix', 1, 150.00, 150.00),
(2, 4, '2025-11-03 10:45:00', 1, 'Cartão de débito', 1, 200.00, 200.00),
(1, 6, '2025-11-05 11:20:00', 0, 'Cartão de crédito', 3, 250.00, 0.00);
 
INSERT INTO consultatiposervicoconsulta (idconsulta, idtiposervico, valorservico)
VALUES (11, 5, 100.00),
(12, 6, 80.00),
(13, 7, 600.00),
(14, 1, 150.00),
(15, 2, 250.00);