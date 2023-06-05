create database sistema_aeroporto;

--País-----------------------------------------------------------------------------------------------------------------------------------

create table pais(
    IdPais int primary key AUTO_INCREMENT,
    nomePais varchar(100)
);

alter table pais
    modify column nomePais varchar(100) not null;

-- Recuperar ou Exibir
select * from pais;

-- Inserir
insert into pais(nomePais) values('Brasil'), ('França'), ('Japão');

-- Atualizar
update pais set nomePais='Canada' where IdPais=2;

-- Deletar
delete from pais where IdPais=1;

--Cidade---------------------------------------------------------------------------------------------------------------------------------

create table cidade(
    IdCidade int primary key AUTO_INCREMENT,
    nomeCidade varchar(100) not null
);

alter table cidade
    add fk_IdPais int not null;

alter table cidade
    add foreign key(fk_IdPais) references pais(IdPais);

select IdCidade, nomeCidade, nomePais
from cidade as city
left join pais as country
on city.fk_IdPais = country.IdPais;

-- Inserir
insert into cidade(nomeCidade, fk_IdPais) values('São Paulo', 1), ('Paris', 2), ('Tóquio', 3), ('Rio de Janeiro', 1);

-- Atualizar
update cidade set nomeCidade='Vancouver' where IdCidade=2;

-- Deletar
delete from cidade where IdCidade=1;

--Aeroporto--------------------------------------------------------------------------------------------------------------------------

create table aeroporto(
    IdAeroporto int primary key AUTO_INCREMENT,
    nomeAeroporto varchar(100) not null
);

alter table aeroporto
    add fk_IdCidade int not null;

alter table aeroporto
    add foreign key(fk_IdCidade) references cidade(IdCidade);

select IdAeroporto, nomeAeroporto, nomeCidade
from aeroporto as a
left join cidade as city
on a.fk_IdCidade = city.IdCidade;

insert into aeroporto(nomeAeroporto, fk_IdCidade) values ('Aeroporto de Guarulhos',1), ('Aeroporto de Tóquio', 3);
insert into aeroporto(nomeAeroporto, fk_IdCidade) values ('Aeroporto do Rio de Janeiro-Santos-Dumont',4);

update aeroporto set nomeAeroporto='Aeroporto de São Paulo Congonhas' where IdAeroporto=1;

delete from aeroporto where IdAeroporto=3;

--Companhia Aerea-----------------------------------------------------------------------------------------------------------------

create table companhia_aerea(
    IdCompanhia int primary key AUTO_INCREMENT,
    nomeCompanhia varchar(100) not null
);

alter table companhia_aerea
    add fk_IdAeroporto_Saida int not null,
    add fk_IdAeroporto_Destino int not null,
    add fk_IdCompanhia int not null;

alter table companhia_aerea
    drop column fk_IdAeroporto_Saida,
    drop column fk_IdAeroporto_Destino,
    drop column fk_IdCompanhia;

select * from companhia_aerea;

insert into companhia_aerea(nomeCompanhia) values ('LATAM'), ('Japan Airlines'), ('United Airlines');

update companhia_aerea set nomeCompanhia='Azul' where IdCompanhia=1;

delete from companhia_aerea where nomeCompanhia=3;

--Voo-----------------------------------------------------------------------------------------------------

create table voo(
    IdVoo int primary key AUTO_INCREMENT,
    horarioChegada time(0),
    horarioSaida time(0)
);

alter table voo
    add fk_IdAeroporto_Saida int not null,
    add fk_IdAeroporto_Destino int not null,
    add fk_IdCompanhia int not null;

alter table voo
    add foreign key(fk_IdAeroporto_Saida) references aeroporto(IdAeroporto),
    add foreign key(fk_IdAeroporto_Destino) references aeroporto(IdAeroporto),
    add foreign key(fk_IdCompanhia) references companhia_aerea(IdCompanhia);

select IdVoo, airs.nomeAeroporto as saida,  aird.nomeAeroporto as destino, nomeCompanhia, 
        ifnull(horarioChegada, 'Horário Indefinido') as horarioChegada, 
        ifnull(horarioSaida, 'Horário Indefinido') as horarioSaida
    from voo as v
    -- Aeroporto Destino
    left join aeroporto as aird
    on v.fk_IdAeroporto_Destino = aird.IdAeroporto
    -- Aeroporto Saída
    left join aeroporto as airs
    on v.fk_IdAeroporto_Saida = airs.IdAeroporto
    -- Nome da companhia aérea
    left join companhia_aerea as ca 
    on v.fk_IdCompanhia = ca.IdCompanhia;

insert into voo(fk_IdAeroporto_Saida, fk_IdAeroporto_Destino, fk_IdCompanhia, horarioChegada, horarioSaida)
values (1, 3, 1, '14:00:22', '18:12:00'), (2, 1, 2, NULL, NULL), (1, 2, 3, '15:00:00', '01:50:00');

--Avião------------------------------------------------------------------------------------------------------------

create table aviao(
    IdAviao int primary key AUTO_INCREMENT,
    qtdAssento int(100) not null,
    tipoAssento varchar(100) not null
);

alter table aviao
    add fk_IdCompanhia int not null,
    add foreign key(fk_IdCompanhia) references companhia_aerea(IdCompanhia);

select IdAviao, qtdAssento, tipoAssento, nomeCompanhia
from aviao as av 
left join companhia_aerea as ca 
on av.fk_IdCompanhia = ca.IdCompanhia;

insert into aviao(qtdAssento, tipoAssento, fk_IdCompanhia) values (50, 'Duplo', 1), (50, 'Triplo', 2), (60, 'Duplo', 3);

--Cargo-----------------------------------------------------------------------------------------------------------------------------
create table cargo(
    IdCargo int primary key AUTO_INCREMENT,
    descCargo varchar(100)
);

alter table cargo
    modify column descCargo varchar(100) not null;

select * from cargo;

insert into cargo (descCargo) values ('Comissário(a) de bordo'), ('Piloto'), ('Comandante'), ('Mecânico');

--Gênero------------------------------------------------------------------------------------------------------------------------------

create table genero(
    IdGenero int primary key AUTO_INCREMENT,
    descGenero varchar(100) 
);

select * from genero;

alter table genero
    modify column descGenero varchar(100) not null;

insert into genero(descGenero) values ('Feminino'), ('Masculino');

--Funcionário------------------------------------------------------------------------------------------------------------------------------

create table funcionario(
    IdFuncionario int primary key AUTO_INCREMENT,
    nomeFuncionario varchar(100) not null
);

alter table funcionario 
    add fk_IdGenero int not null,
    add fk_IdAviao int not null,
    add fk_IdCargo int not null,

    add foreign key(fk_IdGenero) references genero(IdGenero),
    add foreign key(fk_IdAviao) references aviao(IdAviao),
    add foreign key(fk_IdCargo) references cargo(IdCargo);

select IdFuncionario, nomeFuncionario, descGenero, descCargo, fk_IdAviao
from funcionario as f
inner join genero as gen
on f.fk_IdGenero = gen.IdGenero
inner join cargo as car
on f.fk_IdCargo = car.IdCargo;

insert into funcionario (nomeFuncionario, fk_IdGenero, fk_IdAviao, fk_IdCargo) values
('Emerson', 2, 1, 2), ('Mateus', 2, 1, 2), ('Joana', 1, 1, 1);

--Passageiro---------------------------------------------------------------------------------------------------------------------------------

create table passageiro(
    IdPassageiro int primary key AUTO_INCREMENT,
    nomePassageiro varchar(100) not null,
    dataNascimento date not null
);

alter table passageiro 
    add fk_IdGenero int not null,
    add fk_IdAviao int not null,

    add foreign key(fk_IdGenero) references genero(IdGenero),
    add foreign key(fk_IdAviao) references aviao(IdAviao);

select IdPassageiro, nomePassageiro, DATE_FORMAT(dataNascimento, '%d/%m/%Y') as dataNascimento,
       descGenero, fk_IdAviao
from passageiro as ps 
inner join genero as gen 
on ps.fk_IdGenero = gen.IdGenero
inner join aviao as av 
on ps.fk_IdAviao = av.IdAviao;

insert into passageiro (nomePassageiro, dataNascimento, fk_IdGenero, fk_IdAviao) values
('Nicolas', '2002-12-26', 2, 1), ('Eduardo', '1991-10-02', 2, 1), ('Stefanny', '2004-07-12', 1, 2);

--Nacionalidade-------------------------------------------------------------------------------------------------------------------------------

create table nacionalidade(
    IdNacionalidade int primary key AUTO_INCREMENT,
    descNacionalidade varchar(100) 
);

alter table nacionalidade
    modify column descNacionalidade varchar(100) not null;

select * from nacionalidade;

insert into nacionalidade (descNacionalidade) values ('Brasileiro'), ('Americano'), ('Francês');

--Passageiro_Nacionalidade-----------------------------------------------------------------------------------------------------------------------------------

create table passageiro_nacionalidade(
    IdPassagNac int primary key AUTO_INCREMENT,
    fk_IdPassageiro int not null,
    fk_IdNacionalidade int not null
);

alter table passageiro_nacionalidade
    add foreign key(fk_IdPassageiro) references passageiro(IdPassageiro),
    add foreign key(fk_IdNacionalidade) references nacionalidade(IdNacionalidade);


select IdPassagNac, nomePassageiro, descNacionalidade
from passageiro_nacionalidade as pn 
left join passageiro as ps
on pn.fk_IdPassageiro = ps.IdPassageiro
inner join nacionalidade as nc 
on pn.fk_IdNacionalidade = nc.IdNacionalidade;

insert into passageiro_nacionalidade (fk_IdPassageiro, fk_IdNacionalidade) values (1, 1), (2, 1), (3, 2);

--Tipo Bagagem-------------------------------------------------------------------------------------------------------------------------------------

create table tipo_bagagem(
    IdTipoBagagem int primary key AUTO_INCREMENT,
    nomeBagagem varchar(100)
);

alter table tipo_bagagem
    modify column nomeBagagem varchar(100) not null;

select * from tipo_bagagem;

insert into tipo_bagagem (nomeBagagem) values ('Mala'), ('Mochila'), ('Mochila de roda'), ('Instrumento musical');

--Bagagem------------------------------------------------------------------------------------------------------------------------------

create table bagagem(
    IdBagagem int primary key AUTO_INCREMENT,
    pesoBagagem int(100) not null
);

alter table bagagem
    add fk_IdTipoBagagem int not null,
    add fk_IdPassageiro int not null,

    add foreign key(fk_IdTipoBagagem) references tipo_bagagem(IdTipoBagagem),
    add foreign key(fk_IdPassageiro) references passageiro(IdPassageiro);

select IdBagagem, pesoBagagem, nomeBagagem, nomePassageiro
from bagagem as bg 
left join passageiro as ps
on bg.fk_IdPassageiro = ps.IdPassageiro
inner join tipo_bagagem as tb 
on bg.fk_IdTipoBagagem = tb.IdTipoBagagem;

insert into bagagem(pesoBagagem, fk_IdTipoBagagem, fk_IdPassageiro) values (20, 1, 2), (30, 2, 1), (40, 3, 3);


-- Comandos utilizados nos gráficos

/* Quantidade de cidades por países */
select count(fk_IdPais) as qtdPais, nomePais 
from cidade as c 

inner join pais as p 
on c.fk_IdPais = p.IdPais 

group by IdPais;

/* Média de Funcionários por avião */
select avg(fk_IdCargo) as qtd, fk_IdAviao
from funcionario as f 

inner join cargo as c 
on f.fk_IdCargo = c.IdCargo

inner join aviao as a 
on f.fk_IdAviao = a.IdAviao

group by IdAviao;

/* Quantidade de voos por companhia aérea */
select count(fk_IdCompanhia) as qtdCompanhia, nomeCompanhia
from voo as v

right join companhia_aerea as ca 
on v.fk_IdCompanhia = ca.IdCompanhia

group by IdCompanhia;

/* Quantidade de bagagens por tipo */
select count(bg.fk_IdTipoBagagem) as qtdBagagem, nomeBagagem
from bagagem as bg 

left join tipo_bagagem as tb 
on bg.fk_IdTipoBagagem = tb.IdTipoBagagem

group by IdTipoBagagem;

