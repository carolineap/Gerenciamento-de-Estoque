CREATE TABLE produto (
    codProduto SERIAL NOT NULL,
    limite INT NOT NULL,
    nomeProduto VARCHAR(50) NOT NULL, 
    fornecido BIT(1) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    marca VARCHAR(50),
    PRIMARY KEY (codProduto),
    FOREIGN KEY (categoria) REFERENCES categoriaProduto(categoria)
);

INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('macarrão', 0, 1, 'massa');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('peito de frango com osso', 0, 1, 'congelados');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('salsão', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('repolho roxo', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('alho poró', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('cebola', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('alho', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('gengibre', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('cebolinha', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('manteiga', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('sal', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('açúcar cristal', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('acúcar refinado', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('hondashi', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('cenoura', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('shimeji', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('amido de milho', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('óleo de gergelim', 0, 1, 'oleo');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('óleo de soja', 0, 1, 'oleo');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('saque mirim', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('saque cozinha', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('shoyu', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('pimenta do reino', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('farinha de trigo', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('polvilho doce', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('arroz', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('feijão carioca', 0, 1, 'feijão');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('feijão preto', 0, 1, 'feijão');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('calabresa', 0, 1, 'congelados');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('água gelada', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('missô', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('ovo', 0, 1, 'ovos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('macarrão bifun', 0, 1, 'massa');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('nabo branco', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('arroz japonês', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('extrato de tomate', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('vinagre sushi', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('azeite', 0, 1, 'oleo');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('farinha de mandioca', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('fubá', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('panco', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('kibe', 0, 1, 'secos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('leite de coco', 0, 1, 'confeitaria');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('creme de leite', 0, 1, 'confeitaria');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('leite condensado', 0, 1, 'confeitaria');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('leite', 0, 1, 'confeitaria');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('coco ralado', 0, 1, 'confeitaria');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('detergente', 0, 1, 'limpeza');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('álcool', 0, 1, 'limpeza');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('esponja', 0, 1, 'limpeza');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('cloro', 0, 1, 'limpeza');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('repolho verde', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('brócolis', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('pimentão verde', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('pimentão vermelho', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('sobrecoxa desossada', 0, 1, 'congelados');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('água quente', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('água', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('carne seca', 0, 1, 'carnes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('costelinha', 0, 1, 'carnes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('contra filé', 0, 1, 'carnes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('anchova', 0, 1, 'peixes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('tofu', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('sunomono de pepino', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('tsukemono', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('kani', 0, 1, 'temperos');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('inhame', 0, 1, 'legumes');
INSERT INTO produto (nomeProduto, limite, fornecido, categoria) VALUES ('macarrão somen', 0, 1, 'massa');
