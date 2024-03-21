-- COMANDO PARA ATUALIZAR (UPDATE)
update tb_usuario
   set email_usuario = 'maateussp@hotmail.com', 
       senha_usuario = 'Mateus123'
where  id_usuario = 1;   

update tb_categoria
set nome_categoria = 'Alimentação'
where id_usuario = 2;

update tb_categoria
set nome_categoria = 'Viajens'
where id_usuario = 0;


update tb_categoria
set nome_categoria = 'Praia'
where id_categoria =33;