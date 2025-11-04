SELECT * FROM cliente
SELECT * FROM animal
SELECT * FROM veterinario
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
 
 