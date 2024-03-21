select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like 'A%'
; 

select nome_usuario, data_cadastro
from tb_usuario
where data_cadastro between '20-01-15' and '22-01-20';

select banco_conta, agencia_conta, saldo_conta
from tb_conta
where tb_usuario = 2;

select tipo_movimento, data_movimento, valor_movimento, nome_categoria, nome_empresa, nome_usuario, banco_conta
from tb_movimento
inner join tb_categoria
on tb_categoria.id_categoria = tb_movimento.tb_categoria
inner join tb_empresa
on tb_empresa.id_empresa = tb_movimento.tb_empresa
inner join tb_usuario
on tb_usuario.id_usuario = tb_movimento.tb_usuario
inner join tb_conta
on tb_conta.id_conta = tb_movimento.tb_conta;
