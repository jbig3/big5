SELECT 
	*
FROM
city
WHERE 
	name = 'London';


SELECT 
    code, name, continent, population
FROM
    country
WHERE
    Code IN ('GBR' , 'CAN');

CREATE TABLE simplycity AS 
	SELECT 
		name 			AS cityname, 
		countrycode, 
		population 		AS citypop 
	FROM
		city
	WHERE
		name like 'london';

SELECT
	*
FROM
	simplycity;

DROP Table 
	simplycountry;

CREATE TABLE simplyCountry AS
	SELECT
		code,
		name 			AS countryname,
		population		AS countrypop
	FROM
		country
	WHERE
		code IN(
			'CAN',
			'GBR');


SELECT
	*
FROM
	simplycountry;

DROP TABLE simplyLanguage;
CREATE TABLE simplyLanguage AS
	SELECT
		countrycode,
		language
	FROM
		countrylanguage
	WHERE
		countrycode IN(
			'CAN',
			'GBR')
		AND
		IsOfficial = 'T';

SELECT 
	*
FROM
	simplyLanguage;


SELECT
	*
FROM
	simplycity, simplycountry
WHERE
	countrycode = code	AND
	citypop > 1000000;

SELECT 
	*
FROM
	city, country
WHERE 
	countrycode = code;

SELECT
	continent,
	countrycode,
	co.name AS country,
	ci.name AS city
FROM
	city AS ci,
	country AS co
WHERE
	countrycode = code;

SELECT
	Capital.name AS Hauptstadt,
	country.name AS land
FROM
	country,
	city AS Capital
WHERE
	capital = capital.id;

SELECT
	stadt.name AS city,
	land.name AS country
FROM
	city AS Stadt,
	country AS Land
WHERE
	countryCode = code;

SELECT
	*
FROM
	simplycity
	JOIN
	simplycountry
	ON
	countryCode = code
WHERE
	citypop > 1000000;

SELECT
	town.name,
	country.name
FROM
	city AS town
	JOIN
	country
	ON
	town.countrycode = code
WHERE
	continent = 'South America';

SELECT
	city.name,
	language
FROM
	countrylanguage
	JOIN
	city
	USING (Countrycode)
WHERE
	Language = 'Lithuanian';
	

SELECT
	*
FROM
	city
	JOIN
	country
	ON
	countrycode = code
WHERE
	city.name = 'San Antonio';

DESC simplycountry;

DROP TABLE simplycountry;

CREATE TABLE
	simplycountry AS
	SELECT
		code,
		name as conutryname,
		CAPITAL
	FROM
		country
	WHERE
		code IN (
			'CAN',
			'GBR'
			);

SELECT
	*
FROM
	simplycountry;

DESC simplycountry;

ALTER TABLE
	simplycountry
	CHANGE COLUMN	conutryname countryname CHAR(52);

DROP TABLE
	simplycity;

CREATE TABLE
	simplycity AS
	SELECT
		ID AS CityID,
		name AS CityName,
		CountryCode
	FROM
		city
	WHERE
	name like 'London';

SELECT 
	*
FROM
	simplycity;

SELECT 
	countryname, cityname
FROM
	Simplycountry
	INNER JOIN
	simplycity
	ON
	capital = cityid;


SELECT 
	countryname,
	cityname
FROM
	simplycountry
	LEFT JOIN
	simplycity
	ON
	Capital = cityID;

SELECT
	city.name AS Hauptstadt,
	country.name AS Land,
	country.indepyear AS Unabhaengig_seit
FROM
		city
	LEFT JOIN
		country
	ON
		city.id = country.capital
WHERE
	city.name IN (
		'kabul',
		'oranjestad',
		'qandahar')
	AND
	country.indepyear IS NOT NULL;

SELECT
	city.name AS Hauptstadt,
	country.name AS Land,
	country.indepyear AS Unabhaengig_seit
FROM
		city
	LEFT JOIN
		country
	ON
		city.id = country.capital
WHERE
	city.name IN (
		'kabul',
		'oranjestad',
		'qandahar');


SELECT
	country.name AS Land,
	city.name AS Hauptstadt
FROM
	city
	RIGHT JOIN
	country
	ON
		city.id = country.capital;

SELECT
	country.name AS Land,
	city.name AS Hauptstadt,
	countrylanguage.language AS Sprache
FROM
	city
	LEFT JOIN
	country
	ON
		city.id = country.capital
	LEFT JOIN
	countryLanguage
	ON
	country.code = countryLanguage.countrycode;

SELECT
	name,
	language
FROM
	countryLanguage
	JOIN
	country
	ON
	code = countrycode;

SELECT
	name,
	language
FROM
	countryLanguage
	RIGHT JOIN
	country
	ON
	code = countrycode
WHERE 
	language IS NULL;


SELECT 
    country.name, 
	COUNT(city.id)
FROM
    country
        LEFT JOIN
    city 
		ON 
	code = countrycode
WHERE
    country.name = 'Antarctica'
GROUP BY 
	code;

SELECT
	country.name AS country,
	city.name AS city
FROM
	country
		RIGHT JOIN
	city
		ON
	country.capital = city.id
WHERE
	region = 'Eastern Africa';

DESC country;

SELECT
	countryname,
	cityname
FROM
	simplycity
		JOIN
	simplycountry
		ON
	countrycode = code AND
	cityid != capital;
	
UPDATE
	city
		JOIN
	country
		ON
	countrycode = code
SET
	city.population = city.population + 20000,
	country.population = country.population + 20000
WHERE
	country.name = 'Brazil'
AND
	city.name = 'rio de janeiro';

SELECT
	*
FROM
	city
		JOIN
	country
		ON
	countrycode = code
WHERE
	country.name = 'Brazil'
AND
	city.name = 'rio de janeiro';
	
DELETE
	country,
	city,
	countrylanguage
FROM
	country
		LEFT JOIN
	city
		ON
	code = city.countrycode
		LEFT JOIN
	countryLanguage
		ON
	code = countrylanguage.countrycode
WHERE
	code = 'NLD';

DELETE
	co,
	ci,
	cl
FROM
	country					AS co
		LEFT JOIN
	city					AS ci
		ON
	code = city.countrycode
		LEFT JOIN
	countryLanguage			AS cl
		ON
	code = countrylanguage.countrycode
WHERE
	code = 'NLD';

SELECT
	*
FROM
	city
WHERE
	name = 'casablanca';
SELECT
	*
FROM
	country
WHERE
	code = 'MAR';

UPDATE
	country
		JOIN
	city
		ON
	country.code = city.countrycode
SET
	country.name = city.name
WHERE
	city.name = 'casablanca';


DELETE
	country,
	city
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode
WHERE
	city.name = 'casablanca';

#########################################
## Aufgaben
#########################################
desc country;
desc city;
desc countrylanguage;

-- 1

SELECT
	country.name,
	countrylanguage.language
FROM
	country
		JOIN
	countrylanguage
		ON
	country.code = countrylanguage.countrycode
WHERE
	country.name = 'sweden';


-- 2
SELECT
	country.name,
	count(city.id) AS ANZ
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode
GROUP BY
	country.name
ORDER BY
	ANZ DESC
LIMIT 1;


-- 3
SELECT DISTINCT
	country.name AS Land
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode
WHERE
	city.population > 7000000;
	

-- 4 
-- Alle Länder in denen keine Sprachen hinterlegt sind
-- Alle aus Country, in denen keine Übereinstimmung in Countrylanguage ist

DESC country;
DESC countryLanguage;

SELECT 
	*
FROM
	country
WHERE 
	continent like 'Ant%';

SELECT
	*
FROM
	countryLanguage
WHERE
	countryCode IS NULL;

SELECT DISTINCT
	country.code AS Code,
	country.name AS Land,
	countryLanguage.language AS Sprache
FROM
	country
		LEFT JOIN
	countryLanguage
		ON
	country.code = countryLanguage.CountryCode
WHERE
	countryLanguage.countrycode IS NULL ;


-- 5
DESC country;
DESC city;

SELECT 
	*
FROM
	city;

SELECT
	country.name AS Land,
	city.name AS Hauptstadt
FROM
	country
		LEFT JOIN
	city
		ON
	country.capital = city.id
WHERE
	city.id IS NULL;


-- 6
-- Liste die Länder, wo mehr als 80% der Bevölkerung lebt in den Städten von der city.

SELECT
	country.name,
	SUM(city.population) / MAX(country.population) AS POP
FROM
	country
		JOIN
	city
		ON
	country.code = city.countryCode
GROUP BY
	country.name
HAVING
	SUM(city.population) / MAX(country.population) > 0.8;
	

-- 7
-- mit einem Statement Zambia + alle Städte und Sprache löschen

DELETE
	country, countryLanguage, city
FROM
	country
		JOIN
	countryLanguage 
		ON
	country.code = countryLanguage.countryCode
		JOIN
	city
		ON
	country.code = city.countrycode
WHERE
	country.name = 'Zambia';

#########################################
## Aufgaben Wiederholung
#########################################

-- 1: Sprachen in Schweden

desc country;
desc countrylanguage;

SELECT
	l.language
FROM
	country c,
	countrylanguage l
WHERE
	c.code = l.countrycode AND
	upper(c.name) = 'Sweden';


-- 2:
-- land mit der max Anzahl Städte
-- Tabellen:
DESC country;
DESC city;
-- max()
-- count(städte)
-- Zwischenergebnisse:
	-- wieviel Städe / land

SELECT
	country.name,
	count(city.name)
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode
GROUP BY
	country.name
ORDER BY
	count(city.name) DESC
LIMIT 1;



use world;
SHOW TABLE STATUS;

