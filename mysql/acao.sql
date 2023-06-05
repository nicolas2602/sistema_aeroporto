--País---------------------------------------
insert into pais(nomePais) values('Brasil'), ('França'), ('Japão');

update pais set nomePais='Canada' where IdPais=2;

delete from pais where IdPais=1;

--Cidade---------------------------------------
insert into cidade(nomeCidade, fk_IdPais) values('São Paulo', 1), ('Paris', 2), ('Tóquio', 3), ('Rio de Janeiro', 1);

update cidade set nomeCidade='Vancouver' where IdCidade=2;

delete from cidade where IdCidade=1;

--Aeroporto---------------------------------------
insert into aeroporto(nomeAeroporto, fk_IdCidade) values ('Aeroporto de Guarulhos',1), ('Aeroporto de Tóquio', 3);
insert into aeroporto(nomeAeroporto, fk_IdCidade) values ('Aeroporto do Rio de Janeiro-Santos-Dumont',4);

update aeroporto set nomeAeroporto='Aeroporto de São Paulo Congonhas' where IdAeroporto=1;

delete from aeroporto where IdAeroporto=3;

--Companhia aérea---------------------------------------
insert into companhia_aerea(nomeCompanhia) values ('LATAM'), ('Japan Airlines'), ('United Airlines');

update companhia_aerea set nomeCompanhia='Azul' where IdCompanhia=1;

delete from companhia_aerea where nomeCompanhia=3;

--Voo---------------------------------------
insert into voo(fk_IdAeroporto_Saida, fk_IdAeroporto_Destino, fk_IdCompanhia, horarioChegada, horarioSaida)
values (1, 3, 1, '14:00:22', '18:12:00'), (2, 1, 2, NULL, NULL), (1, 2, 3, '15:00:00', '01:50:00');

update voo set horarioChegada='18:12:00' where IdVoo=3;

delete from voo where IdVoo=2;

--Avião--------------------------------------
insert into aviao(qtdAssento, tipoAssento, fk_IdCompanhia) values (50, 'Duplo', 1), (50, 'Triplo', 2), (60, 'Duplo', 3);

update aviao set tipoAssento="Duplo" where IdAviao=2;

delete from aviao where IdAviao=2;

--Cargo---------------------------------------
insert into cargo (descCargo) values ('Comissário(a) de bordo'), ('Piloto'), ('Comandante'), ('Mecânico'), ('Cargo 1');

update cargo set descCargo='Atendente' where IdCargo=5;

delete from cargo where IdCargo=5;

--Gênero-----------------------------------------------------------
insert into genero(descGenero) values ('Feminino'), ('Masculino');

--Funcionário------------------------------------------------------
insert into funcionario (nomeFuncionario, fk_IdGenero, fk_IdAviao, fk_IdCargo) values
('Emerson', 2, 1, 2), ('Mateus', 2, 1, 2), ('Joana', 1, 1, 1);

update funcionario set fk_IdAviao=2 where IdFuncionario=2;

delete from funcionario where IdFuncionario=1;

--Passageiro------------------------------------------------------------
insert into passageiro (nomePassageiro, dataNascimento, fk_IdGenero, fk_IdAviao) values
('Nicolas', '2002-12-26', 2, 1), ('Eduardo', '1991-10-02', 2, 1), ('Stefanny', '2004-07-12', 1, 2);

update passageiro set dataNascimento='1991-10-12' where IdPassageiro=2;

delete from passageiro where IdPassageiro=3;

--Nacionalidade------------------------------------------------------------
insert into nacionalidade (descNacionalidade) values ('Brasileiro'), ('Americano'), ('Francês');

update nacionalidade set descCargo='Japonês' where IdNacionalidade=3;

delete from nacionalidade where IdNacionalidade=3;

--Passageiro_Nacionalidade-------------------------------------------------------
insert into passageiro_nacionalidade (fk_IdPassageiro, fk_IdNacionalidade) values (1, 1), (2, 1), (3, 2);

update passageiro_nacionalidade set fk_IdNacionalidade=1 where IdPassagNac=3;

delete from passageiro_nacionalidade where IdPassagNac=3;

--Tipo Bagagem---------------------------------------------------------------------
insert into tipo_bagagem (nomeBagagem) values ('Mala'), ('Mochila'), ('Mochila de roda'), ('Instrumento musical');

update tipo_bagagem set nomeBagagem='Caixa' where IdTipoBagagem=4;

delete from tipo_bagagem where IdTipoBagagem=4;

--Bagagem
insert into bagagem(pesoBagagem, fk_IdTipoBagagem, fk_IdPassageiro) values (20, 1, 2), (30, 2, 1), (40, 3, 3);

update bagagem set fk_IdPassageiro=2 where IdBagagem=3;

delete from bagagem where IdBagagem=2;