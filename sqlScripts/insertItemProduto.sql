CREATE TABLE itemProduto (
	codProduto SERIAL NOT NULL,
	dataValidade DATE NOT NULL,
	dataCompra TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	quantidadeItem INT NOT NULL DEFAULT 0,
	precoItem REAL,
	unidade VARCHAR(50) NOT NULL,
	FOREIGN KEY (unidade) REFERENCES unidadeMedida(unidade),
    FOREIGN KEY (codProduto) REFERENCES produto(codProduto),
    PRIMARY KEY (codProduto, dataCompra, dataValidade)
 );


INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (1, '2018/11/23', 'kg', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (2, '2018/11/23', 'kg', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (3, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (4, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (5, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (6, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (7, '2018/11/23', 'kg', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (8, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (9, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (10, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (11, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (12, '2018/11/23', 'kg', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (13, '2018/11/23', 'kg', 6);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (14, '2018/11/23', 'gr', 200);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (15, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (16, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (17, '2018/11/23', 'kg', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (18, '2018/11/23', 'ml', 300);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (19, '2018/11/23', 'lt', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (20, '2018/11/23', 'lt', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (21, '2018/11/23', 'lt', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (22, '2018/11/23', 'lt', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (23, '2018/11/23', 'gr', 250);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (24, '2018/11/23', 'kg', 15);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (25, '2018/11/23', 'kg', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (26, '2018/11/23', 'kg', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (27, '2018/11/23', 'kg', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (28, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (29, '2018/11/23', 'kg', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (30, '2018/11/23', 'lt', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (31, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (32, '2018/11/23', 'kg', 5);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (33, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (34, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (35, '2018/11/23', 'kg', 5);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (36, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (37, '2018/11/23', 'lt', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (38, '2018/11/23', 'lt', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (39, '2018/11/23', 'kg', 3);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (40, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (41, '2018/11/23', 'kg', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (42, '2018/11/23', 'kg', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (43, '2018/11/23', 'lt', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (44, '2018/11/23', 'lt', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (45, '2018/11/23', 'lt', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (46, '2018/11/23', 'lt', 10);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (48, '2018/11/23', 'kg', 1);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (49, '2018/11/23', 'lt', 5);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (50, '2018/11/23', 'lt', 2);
INSERT INTO itemProduto(codProduto, dataValidade, unidade, quantidadeItem) VALUES (51, '2018/11/23', 'unidade', 5);



