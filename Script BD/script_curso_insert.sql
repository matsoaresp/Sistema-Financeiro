
ALTER TABLE funcionarios ADD COLUMN profissao VARCHAR (100);

ALTER TABLE funcionarios ADD COLUMN cpf CHAR (11);

ALTER TABLE funcionarios ADD COLUMN nascimento DATE;

ALTER TABLE funcionarios ADD COLUMN endereco VARCHAR(30);

ALTER TABLE funcionarios DROP COLUMN profissao;

DROP TABLE funcionarios;

ALTER TABLE funcionarios ADD COLUMN (profissao VARCHAR (50));

ALTER TABLE funcionarios ADD COLUMN (cpf CHAR (13));

ALTER TABLE funcionarios ADD COLUMN (ativo BOOL);

ALTER TABLE funcionarios DROP COLUMN ativo;

ALTER TABLE funcionarios DROP COLUMN cpf;

ALTER TABLE funcionarios ADD COLUMN data_nascimento VARCHAR (100);

ALTER TABLE funcionarios MODIFY COLUMN data_nascimento DATE;

CREATE DATABASE cadastro;

CREATE TABLE pessoas (pessoas VARCHAR (100));

ALTER TABLE cadastro ADD COLUMN nome VARCHAR (100);

ALTER TABLE cadastro ADD COLUMN rg CHAR (10);

ALTER TABLE cadastro ADD COLUMN cpf CHAR (15);

ALTER TABLE cadastro ADD COLUMN limite BIT (63);

SELECT * FROM  cadastro;
DROP TABLE cadastro;

DROP DATABASE cadastro;

CREATE DATABASE cadastro;

DROP TABLE cadastro;

DROP TABLE pessoas;

CREATE TABLE pessoas ( nome VARCHAR (100), rg CHAR(10), cpf CHAR (15), limite BIT (63));

SELECT nome,rg FROM pessoas;

ALTER TABLE pessoas ADD COLUMN ativo VARCHAR(100);

ALTER TABLE pessoas DROP COLUMN ativo;

SELECT * FROM pessoas WHERE nome ="Mateus Soares";

UPDATE pessoas SET limite = 1000 WHERE nome = 'Mateus Soares';

UPDATE pessoas set cpf = 1525856452 WHERE nome = 'Mateus Soares';

UPDATE pessoas SET rg = 12354125 WHERE nome = 'Mateus Soares';

UPDATE pessoas SET cpf = 1258549682 WHERE nome = 'Jose';

UPDATE pessoas SET limite = 1000 WHERE nome = 'Amanda';

DELETE FROM pessoas WHERE nome = 'Zoe Alamanda';

UPDATE pessoas SET limite =  5000 WHERE nome = 'Jose';

UPDATE pessoas SET limite =  8000 WHERE nome = 'Willian';

SELECT * FROM pessoas;

DELETE FROM pessoas WHERE nome = 'Jose';

DELETE FROM pessoas WHERE nome = 'Willian';

DELETE FROM pessoas WHERE nome = 'Savana Bagshot';

DELETE FROM pessoas WHERE nome = 'Joana Dark';

CREATE DATABASE treinamento;

UPDATE treino SET localidade = 'São Paulo' WHERE  nome = 'Mateus';
 
ALTER TABLE treino ADD COLUMN cpf INT;

UPDATE treino SET cpf = 15248547476 WHERE nome = 'Mateus';

CREATE TABLE pessoas (nome VARCHAR (50), RG INT, CPF INT, endereco VARCHAR (50), profissao VARCHAR (60));

DROP TABLE treino;


INSERT INTO pessoas
()
VALUES
('Mateus Soares', 15425874, 082-074-899-44,'Londrina', 'Programador');

SELECT * FROM pessoas;

ALTER TABLE pessoas MODIFY COLUMN CPF VARCHAR (100);

UPDATE pessoas SET CPF = 08207489944 WHERE nome = 'Mateus Soares';

DELETE FROM pessoas WHERE nome = 'Mateus Soares';


SET SQL_SAFE_UPDATES= 0;

SELECT * FROM tb_conta;
