CREATE TABLE prato (
    codPrato SERIAL NOT NULL,
    nomePrato VARCHAR(50) NOT NULL, 
  	precoPrato REAL,
    PRIMARY KEY (codPrato)
);

INSERT INTO prato (nomePrato) VALUES ('yakisoba');
INSERT INTO prato (nomePrato) VALUES ('karaage');
INSERT INTO prato (nomePrato) VALUES ('arroz branco');
INSERT INTO prato (nomePrato) VALUES ('feijão carioca');
INSERT INTO prato (nomePrato) VALUES ('feijoada light');
INSERT INTO prato (nomePrato) VALUES ('yakizakana teiskoku');
INSERT INTO prato (nomePrato) VALUES ('bife acebolado');




