CREATE TABLE pessoas (nome VARCHAR(100), cpf CHAR (11), descricao MEDIUMTEXT );

SELECT * FROM empresa.pessoas;

CREATE TABLE endereco (rua VARCHAR (100), cep CHAR (6), cidade MEDIUMTEXT);

DROP TABLE endereco;

CREATE DATABASE teste_tipo_dados;

SHOW DATABASES;

USE teste_tipo_dados;

CREATE TABLE produtos(nome VARCHAR (50), sku CHAR(5), informacoes MEDIUMTEXT);

CREATE TABLE cadastro(nome VARCHAR (100), sobrenome VARCHAR (100));
