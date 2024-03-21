


insert into tb_empresa
(nome_empresa, cnpj_empresa)
values
('Folks', '86-585-858-0001-45');

insert into tb_acesso
(status_acesso, login_acesso, senha_acesso,tb_empresa,tb_funcionario)
values
(1, 'Lojafolks666@gmail.com', '1254asad5214', 1, 3);

insert into tb_pais
(nome_pais)
values
('Brasil');

insert into tb_estado
(nome_estado,tb_pais)
values
('SP',1);

insert into tb_cidade
(nome_cidade, tb_estado)
values
('Santos', 5);

insert into tb_endereco
(rua_endereco, bairro_endereco,cep_endereco,status_endereco,tb_cliente,tb_empresa,tb_funcionario,tb_cidade_id_cidade)
values
('Rua Alagoas', 'Jalapão', 000085-45, '1', 1, 1, 3, 1);

insert into tb_endereco
(rua_endereco, bairro_endereco,cep_endereco,status_endereco,tb_cliente,tb_empresa,tb_funcionario,tb_cidade_id_cidade)
values
('Rua dos Anjos', 'Angel', 000085-45, '1', 3, 1, 4, 1);

insert into tb_funcionario
(nome_funcionario,data_admissao_funcionario,tb_empresa_id_adm)
values
('Mateus Soares', '22-05-02', 1);

insert into tb_funcionario
(nome_funcionario,data_admissao_funcionario,tb_empresa_id_adm)
values
('Jose Augusto', '20-07-05', 1);

insert into tb_cargo
(funcionario_cargo,desc_cargo)
values
('Developer' ,'Desenvolver sistemas');

insert into tb_cargo_funcionario
(tb_funcionario_id_funcionario,tb_cargo_id_cargos,data_inicio_funcionario)
values
(3, 1, '22-05-02');

insert into tb_cargo_funcionario
(tb_funcionario_id_funcionario,tb_cargo_id_cargos,data_inicio_funcionario)
values
(4, 1, '22-07-05');

insert into tb_cliente
(nome_cliente, data_cliente, tb_funcionario)
values
('Valdir Souza', '22-08-07', 3);

insert into tb_cliente
(nome_cliente, data_cliente, tb_funcionario)
values
('Valdir Souza', '23-01-02', 4);

insert into tb_cliente
(nome_cliente, data_cliente, tb_funcionario)
values
('Lucas Almeida', '23-01-02', 4);


