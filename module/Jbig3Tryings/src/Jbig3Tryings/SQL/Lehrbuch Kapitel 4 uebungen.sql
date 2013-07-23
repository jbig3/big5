
#1
select distinct region from country;

#2
select name from country
order by name
limit 3;

#3
select name from country
where region like 'Baltic Countries';

#4
select name from country
where lifeExpectancy > 79;

#5
select name, population from city
order by population desc
limit 5;

#6
select countryCode, SUM(population) as pop
from city
group by countryCode
having pop > 7000000;

#6a
select countryCode, name, population
from city
where population > 7000000
order by countryCode asc, name asc;

#7
select GovernmentForm, count(name) anzland
from country
group by GovernmentForm
order by anzland desc
limit 5;

#8 Duchschnittliche Land-Oberfläche auf jedem Kontinent
select continent as C, AVG(SurfaceArea) as area
from country
where C = 'Af%'
group by C
having area > 1000 ;

#9 Durchshcnittliche Lebenserwartung / Kontinent
select continent, SUM(population * LifeExpectancy)/SUM(population) as pop
from country
group by continent;

#10 5 dichtbesiedelten Länder größer als 10000 Fläche
select name, SurfaceArea, Population, (Population/SurfaceArea) as dichte
from country
where SurfaceArea > 10000
order by dichte desc
limit 5;

#11 Wieviel verschiede Districts sind in tabelle City
select count(distinct District)
From city;

#12 Alle Sprachen, die in mehr als 10 Ländern gesprochen werden
select Language, count(CountryCode) as lang
from countrylanguage
group by language
having lang > 10;

#13 zeig alle Ländercodes in denen Deutsch gesprochen wird
select CountryCode, Language
from countrylanguage
where language = 'German';

show variables like 'c%';

select name
from city
where name like '%mun%';