create database sistema_aeroporto;

create table pais(
    IdPais int primary key AUTO_INCREMENT,
    nomePais varchar(100) not null
);

insert into pais(nomePais) values('Brasil'), ('Japão'), ('Estado Unidos');

create table cidade(
    IdCidade int primary key AUTO_INCREMENT,
    nomeCidade varchar(100) not null,
    fk_IdPais int not null,
    foreign key(fk_IdPais) references pais(IdPais)
);

create table aeroporto(
    IdAeroporto int primary key AUTO_INCREMENT
    nomeAeroporto varchar(100) not null,
    fk_IdCidade int not null,
    foreign key(fk_IdCidade) references cidade(IdCidade)
);

create table companhia_aerea(
    IdCompanhia int primary key AUTO_INCREMENT,
    nomeCompanhia varchar(100) not null
);

create table voo(
    IdVoo int primary key AUTO_INCREMENT,
    fk_IdAeroporto_Saida int not null,
    fk_IdAeroporto_Destino int not null,
    fk_IdCompanhia int not null,
    horarioChegada time(0),
    horarioSaida time(0),

    foreign key(fk_IdAeroporto_Saida) references aeroporto(IdAeroporto),
    foreign key(fk_IdAeroporto_Destino) references aeroporto(IdAeroporto),
    foreign key(fk_IdCompanhia) references companhia_aerea(IdCompanhia)
);

create table aviao(
    IdAviao int primary key AUTO_INCREMENT,
    qtdAssento int(100) not null,
    tipoAssento varchar(100) not null,
    fk_IdCompanhia int not null,

    foreign key(fk_IdCompanhia) references companhia_aerea(IdCompanhia)
);

---------------------------------------------------------
create table cargo(
    IdCargo int primary key AUTO_INCREMENT,
    descCargo varchar(100) not null
);

create table genero(
    IdGenero int primary key AUTO_INCREMENT,
    descGenero varchar(100) not null
);

create table funcionario(
    IdFuncionario int primary key AUTO_INCREMENT,
    nomeFuncionario varchar(100) not null,
    fk_IdGenero int not null,
    fk_IdAviao int not null,
    fk_IdCargo int not null,

    foreign key(fk_IdGenero) references genero(IdGenero),
    foreign key(fk_IdAviao) references aviao(IdAviao),
    foreign key(fk_IdCargo) references cargo(IdCargo)
);

create table passageiro(
    IdPassageiro int primary key AUTO_INCREMENT,
    nomePassageiro varchar(100) not null,
    dataNascimento date not null,
    fk_IdGenero int not null,
    fk_IdAviao int not null,

    foreign key(fk_IdGenero) references genero(IdGenero),
    foreign key(fk_IdAviao) references aviao(IdAviao)
);

create table nacionalidade(
    IdNacionalidade int primary key AUTO_INCREMENT,
    descNacionalidade varchar(100) not null
);

create table passageiro_nacionalidade(
    IdPassagNac int primary key AUTO_INCREMENT,
    fk_IdPassageiro int not null,
    fk_IdNacionalidade int not null,

    foreign key(fk_IdPassageiro) references passageiro(IdPassageiro),
    foreign key(fk_IdNacionalidade) references nacionalidade(IdNacionalidade)
);

create table tipo_bagagem(
    IdTipoBagagem int primary key AUTO_INCREMENT,
    nomeBagagem varchar(100) not null
);

create table bagagem(
    IdBagagem int primary key AUTO_INCREMENT,
    pesoBagagem int(100) not null,
    fk_IdTipoBagagem int not null,
    fk_IdPassageiro int not null,

    foreign key(fk_IdTipoBagagem) references tipo_bagagem(IdTipoBagagem),
    foreign key(fk_IdPassageiro) references passageiro(IdPassageiro)
);