CREATE TABLE Usuario (
idUsuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nickNameUsuario VARCHAR(45) NOT NULL UNIQUE,
emailUser VARCHAR(45) NOT NULL UNIQUE,
senhaUsuario VARCHAR(45) NOT NULL,
qtdPlayJogo INT,
qtdGanhoJogo INT,
qtdReciclagem INT
);
 
CREATE TABLE ranking (
idRanking INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
runLixoReciclado INT NOT NULL,
scoreLixoReciclado INT NOT NULL
);
 
CREATE TABLE conquistas (
idConquista INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nomeConquista VARCHAR(45) NOT NULL,
descricaoConquista VARCHAR(45) NOT NULL,
premioConquista VARCHAR(45) NOT NULL,
concluida BIT DEFAULT 0
);
 
CREATE TABLE carta (
idCarta INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
tipoCarta VARCHAR(45) NOT NULL,
raridadeCarta VARCHAR(45) NOT NULL,
qtdUsada INT
);
 
CREATE TABLE dashboard (
idDashboard INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
idUsuario INT NOT NULL,
idConquista INT NOT NULL,
idRanking INT NOT NULL,
idCarta INT NOT NULL,
CONSTRAINT fk_dashboard_usuario FOREIGN KEY (idUsuario)
REFERENCES usuario(idUsuario),
CONSTRAINT fk_dashboard_ranking FOREIGN KEY (idRanking)
REFERENCES ranking(idRanking),
CONSTRAINT fk_dashboard_conquistas FOREIGN KEY (idConquista)
REFERENCES conquistas(idConquista),
CONSTRAINT fk_dashboard_carta FOREIGN KEY (idCarta)
REFERENCES carta(idCarta)
);
 
 
SELECT * FROM usuario;
SELECT * FROM ranking;
SELECT * FROM conquistas;
SELECT * FROM carta;
SELECT * FROM dashboard;