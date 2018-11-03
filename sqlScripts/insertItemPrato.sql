CREATE TABLE itemPrato (
   codPrato BIGINT UNSIGNED NOT NULL,
   codProduto BIGINT  UNSIGNED NOT NULL,
   quantidadeProduto REAL NOT NULL,
   unidade VARCHAR(50) NOT NULL,
   FOREIGN KEY (unidade) REFERENCES unidadeMedida(unidade),
   FOREIGN KEY (codProduto) REFERENCES produto(codProduto),
   FOREIGN KEY (codPrato) REFERENCES prato(codPrato),
   PRIMARY KEY (codProduto, codPrato)
);


INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 1, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 2, 2, 'kg' );
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 53, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 4, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 54, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 3, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 55, 300, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 56, 300, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 6, 500, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 7, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 8, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 9, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 10, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 11,  10, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 12,  50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 14,  10, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 15,  300, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 16,  300, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 17,  100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 18,  50, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 19,  50, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 20,  50, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 21,  50, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (1, 22,  100, 'ml');


INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 19, 1, 'lt');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 61, 3, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 7, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 11, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 23, 10, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 24, 300, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 25, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 30, 100, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (2, 20, 50, 'ml');


INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (3, 26, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (3, 19, 100, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (3, 7, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (3, 6, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (3, 11, 20, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (3, 62, 2, 'lt');

INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (4, 27, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (4, 63, 2, 'lt');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (4, 19, 100, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (4, 7, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (4, 11, 29, 'gr');

INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 28, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 29, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 63, 2, 'lt');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 64, 500, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 65, 500, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 7, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 11, 30, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (5, 19, 100, 'ml');


INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (7, 66, 2, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (7, 6, 1, 'kg');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (7, 7, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (7, 11, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (7, 23, 20, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (7, 19, 100, 'ml');


INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 67, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 11, 10, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 31, 20, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 9, 30, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 68, 20, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 32, 20, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 69, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 70, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 33, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 15, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 71, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 72, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 34, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 11, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 12, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 73, 50, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 14, 10, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 35, 100, 'gr');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 19, 10, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 22, 50, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 63, 250, 'ml');
INSERT INTO itemPrato (codPrato, codProduto, quantidadeProduto, unidade) VALUES (6, 20, 50, 'ml');




