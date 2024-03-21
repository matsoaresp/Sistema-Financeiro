-- COMANDO PARA INSERIR
-- insert nome_da_tabela (colunas) values (valores)

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Mateus Soares', '@maateussp@gmail.com', 'senha123', '2023/12/23');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Willian da Silva', 'willsilva@gmail.com', '44510', '2023/12/23');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Asmodeus ', 'godasmos@gmail.com', '66666', '2020/02/13');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Evelyn Santos', 'Evsantos@hotmail.com', '45856', '2023/12/23');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Suelen Prado', 'suelensp@hotmail.com', '78596', '2021/01/08');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Jose Abreu', 'abreujose152@gmail.com', '47526', '2021/11/14');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Peggy Willian', 'Peggy541@hotmail.com', '69964', '2022/02/25');

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Alimentação', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Viagens', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Viagens', 3);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Saude', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Roles', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Lazer', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Cinema', 7);

insert into tb_empresa
(nome_empresa,telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa Look', '4399825555', 'Rua Maringa',  1);

insert into tb_empresa
(nome_empresa,telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa Never',  '4345545445', 'Rua Aldeia', 2);

insert into tb_empresa
(nome_empresa,telefone_empresa, endereco_empresa, id_usuario)
values
('Plasticos Mil', '4399854625', 'Rua Guaruja', 3 );

insert into tb_empresa
(nome_empresa,telefone_empresa,endereco_empresa,id_usuario)
values
('Hosplight', '4398857858', 'Rua Alameda', 4);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Google', '4398852894', 'Rua Carioca', 5);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Mozilla Firefox', '4398493529','Rua Paranagua', 6 );

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Pride', '4398454523', 'Rua Jose Abreu', 7);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Bradesco', '2252', '122133', 4500.20, 1);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', '7852', '144233', 7850.20, 2);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('MasterCard', '8546', '854523', 1245.85, 3 );

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Visa', '7856', '785223', 7852.78, 4 );

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Banco do Brasil', '8958', '895475', 9875.58, 5 );

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Inter', '8956', '987452', 8561.85, 6);

insert into tb_conta
(banco_conta,agencia_conta,numero_conta, saldo_conta, id_usuario)
values
('Santander', '2563', '895475', 8547.56, 7 );


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1,'2023/12/23',45, null, 1, 1, 1, 1);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2,'2023/12/23',34.12,'Pagamento', 2, 2, 2, 2);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1,'2022/07/20',14.25,'Muito bom', 3, 3, 3, 3);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2,'2021/03/20',24.85,'Ruim', 4, 4, 4, 4);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2021/05/23', 85.96, 'Pagamento adiantado', 5, 5, 5, 5);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2, '2020/01/21)', 99.99, 'Cobrança', 6, 6, 6, 6);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2021/02/23', 98.52, 'Pagamento', 7, 7, 7, 7);












