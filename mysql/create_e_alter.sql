--País---------------------------------------------------------------
create table pais(
    IdPais int primary key AUTO_INCREMENT,
    nomePais varchar(100)
);

alter table pais
    modify column nomePais varchar(100) not null;

--Cidade---------------------------------------------------------------
create table cidade(
    IdCidade int primary key AUTO_INCREMENT,
    nomeCidade varchar(100) not null
);

alter table cidade
    add fk_IdPais int not null;

alter table cidade
    add foreign key(fk_IdPais) references pais(IdPais);

--Aeroporto---------------------------------------------------------------
create table aeroporto(
    IdAeroporto int primary key AUTO_INCREMENT,
    nomeAeroporto varchar(100) not null
);

alter table aeroporto
    add fk_IdCidade int not null;

alter table aeroporto
    add foreign key(fk_IdCidade) references cidade(IdCidade);

--Companhia aérea---------------------------------------------------------------
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

--Voo---------------------------------------------------------------
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

--Avião---------------------------------------------------------------
create table aviao(
    IdAviao int primary key AUTO_INCREMENT,
    qtdAssento int(100) not null,
    tipoAssento varchar(100) not null
);

alter table aviao
    add fk_IdCompanhia int not null,
    add foreign key(fk_IdCompanhia) references companhia_aerea(IdCompanhia);

--Cargo---------------------------------------------------------------
create table cargo(
    IdCargo int primary key AUTO_INCREMENT,
    descCargo varchar(100)
);

alter table cargo
    modify column descCargo varchar(100) not null;

--Gênero---------------------------------------------------------------
create table genero(
    IdGenero int primary key AUTO_INCREMENT,
    descGenero varchar(100) 
);

alter table genero
    modify column descGenero varchar(100) not null;

--Funcionário---------------------------------------------------------------
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

--Passageiro---------------------------------------------------------------
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

--Nacionalidade---------------------------------------------------------------
create table nacionalidade(
    IdNacionalidade int primary key AUTO_INCREMENT,
    descNacionalidade varchar(100) 
);

alter table nacionalidade
    modify column descNacionalidade varchar(100) not null;

--Passageiro_nacionalidade---------------------------------------------------------------
create table passageiro_nacionalidade(
    IdPassagNac int primary key AUTO_INCREMENT,
    fk_IdPassageiro int not null,
    fk_IdNacionalidade int not null
);

alter table passageiro_nacionalidade
    add foreign key(fk_IdPassageiro) references passageiro(IdPassageiro),
    add foreign key(fk_IdNacionalidade) references nacionalidade(IdNacionalidade);

--Tipo de bagagem---------------------------------------------------------------
create table tipo_bagagem(
    IdTipoBagagem int primary key AUTO_INCREMENT,
    nomeBagagem varchar(100)
);

alter table tipo_bagagem
    modify column nomeBagagem varchar(100) not null;

--Bagagem---------------------------------------------------------------
create table bagagem(
    IdBagagem int primary key AUTO_INCREMENT,
    pesoBagagem int(100) not null
);

alter table bagagem
    add fk_IdTipoBagagem int not null,
    add fk_IdPassageiro int not null,

    add foreign key(fk_IdTipoBagagem) references tipo_bagagem(IdTipoBagagem),
    add foreign key(fk_IdPassageiro) references passageiro(IdPassageiro);