CREATE TABLE itemProduto (
	codProduto SERIAL NOT NULL,
	dataValidade DATE NOT NULL,
	dataCompra TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	quantidadeItem INT NOT NULL DEFAULT 0,
	precoItem REAL NOT NULL,
	unidade VARCHAR(50) NOT NULL,
	FOREIGN KEY (unidade) REFERENCES unidadeMedida(unidade),
    FOREIGN KEY (codProduto) REFERENCES produto(codProduto),
    PRIMARY KEY (codProduto, dataCompra, dataValidade)
 );


INSERT INTO itemProduto(codProduto, dataValidade, unidade) VALUES (1, '23/11/2018', 'unidade');


