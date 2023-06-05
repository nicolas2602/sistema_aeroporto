--País----------------------------------------------------------------------------------------------------------
select * from pais;

--Cidade-------------------------------------------------------------------------------------------------------
select IdCidade, nomeCidade, nomePais, fk_IdPais
from cidade as city
left join pais as country
on city.fk_IdPais = country.IdPais;

--Aeroporto-----------------------------------------------------------------------------------------------------
select IdAeroporto, nomeAeroporto, nomeCidade, fk_IdCidade
from aeroporto as a
inner join cidade as city
on a.fk_IdCidade = city.IdCidade
order by IdAeroporto ASC;

--Companhia aérea----------------------------------------------------------------------------------------------
select * from companhia_aerea;

--Voo----------------------------------------------------------------------------------------------------------
select IdVoo, airs.nomeAeroporto as saida,  aird.nomeAeroporto as destino, nomeCompanhia, 
        ifnull(horarioChegada, 'Horário Indefinido') as horarioChegada, 
        ifnull(horarioSaida, 'Horário Indefinido') as horarioSaida
from voo as v
/* Aeroporto Destino */
left join aeroporto as aird
on v.fk_IdAeroporto_Destino = aird.IdAeroporto
/* Aeroporto Saída */
left join aeroporto as airs
on v.fk_IdAeroporto_Saida = airs.IdAeroporto
/* Nome da companhia aérea */
left join companhia_aerea as ca 
on v.fk_IdCompanhia = ca.IdCompanhia;

--Avião----------------------------------------------------------------------------------------------------------
select IdAviao, qtdAssento, tipoAssento, nomeCompanhia, fk_IdCompanhia
from aviao as av 
left join companhia_aerea as ca 
on av.fk_IdCompanhia = ca.IdCompanhia;

--Cargo----------------------------------------------------------------------------------------------------------
select * from cargo;

--Gênero----------------------------------------------------------------------------------------------------------
select * from genero;

--Funcionário-----------------------------------------------------------------------------------------------------
select IdFuncionario, nomeFuncionario, descGenero, descCargo, fk_IdAviao,
fk_IdGenero, fk_IdCargo
from funcionario as f

inner join genero as gen
on f.fk_IdGenero = gen.IdGenero

inner join cargo as car
on f.fk_IdCargo = car.IdCargo
order by IdFuncionario ASC;

--Passageiro-------------------------------------------------------------------------------------------------------
select IdPassageiro, nomePassageiro, DATE_FORMAT(dataNascimento, '%d/%m/%Y') as dataNascimento,
       descGenero, fk_IdGenero, fk_IdAviao
from passageiro as ps 

inner join genero as gen 
on ps.fk_IdGenero = gen.IdGenero

inner join aviao as av 
on ps.fk_IdAviao = av.IdAviao
order by IdPassageiro ASC;

--Nacionalidade-------------------------------------------------------------------------------------------------------
select * from nacionalidade;

--Passageiro_nacionalidade---------------------------------------------------------------------------------------------
select IdPassagNac, nomePassageiro, descNacionalidade,
       fk_IdPassageiro, fk_IdNacionalidade
from passageiro_nacionalidade as pn 

left join passageiro as ps
on pn.fk_IdPassageiro = ps.IdPassageiro

inner join nacionalidade as nc 
on pn.fk_IdNacionalidade = nc.IdNacionalidade
order by IdPassagNac ASC;

--Tipo bagagem----------------------------------------------------------------------------------------------------------
select * from tipo_bagagem;

--Bagagem----------------------------------------------------------------------------------------------------------
select IdBagagem, pesoBagagem, nomeBagagem, nomePassageiro,
fk_IdPassageiro, fk_IdTipoBagagem
from bagagem as bg 
left join passageiro as ps
on bg.fk_IdPassageiro = ps.IdPassageiro
inner join tipo_bagagem as tb 
on bg.fk_IdTipoBagagem = tb.IdTipoBagagem
order by IdBagagem ASC;

-- Comandos utilizados nos gráficos---------------------------------------------------------------------------------

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
