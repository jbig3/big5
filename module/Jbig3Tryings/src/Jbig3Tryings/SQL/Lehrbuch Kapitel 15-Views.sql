CREATE VIEW cityView AS
    SELECT 
        id, name
    FROM
        city;

SELECT
	*
FROM
	cityView;

CREATE VIEW v AS
	SELECT
		country.name AS country,
		city.name AS city
	FROM
		country,
		city
	WHERE
		country.code = city.countrycode;

SELECT 
	*
FROM
	v3;

CREATE VIEW v2 (spalte1, spalte2)AS
	SELECT
		country.name,
		city.name
	FROM
		country,
		city
	WHERE
		country.code = city.countrycode;
DROP VIEW v3;

CREATE VIEW v3 (spalte1, spalte2)AS
	SELECT
		country.name,
		COUNT(Language)
	FROM
		country,
		countrylanguage
	WHERE
		country.code = countrylanguage.countrycode
GROUP BY 
	name;

CREATE VIEW euro_view AS
	SELECT
		code,
		name,
		population
	FROM
		country
	WHERE
		continent = 'europe';

SHOW TABLES;

SELECT
	*
FROM
	euro_view;

CREATE VIEW europop AS
	SELECT
		name,
		population
	FROM
		country
	WHERE 
		continent = 'europe';

SELECT
	*
FROM
	europop
WHERE
	name = 'SAN Marino';

UPDATE
	europop
SET
	population = population +100
WHERE
	name = 'San Marino';

SELECT 
	*
FROM
	country
WHERE
	name = 'San Marino';

DELETE FROM
	country
WHERE
	name = 'San Marino';

UPDATE
	euro_view
SET
	name = 'mysql'
WHERE
	code = 'SWE';

SELECT
	name
FROM
	country
WHERE
	code = 'SWE';

DELETE FROM
	euro_view
WHERE
	code = 'BEL';

INSERT INTO
	euro_view
VALUES
	('xxx','mxsql',450);
SELECT
	code,
	name,
	population
FROM
	euro_view
WHERE
	code like '%x%';

DESC euro_view;

CREATE VIEW LargePop AS
SELECT
	name,
	population
FROM
	country
WHERE
	population >= 10000000
WITH CHECK OPTION;

SELECT
	*
FROM
	LargePop
ORDER BY
	name;
	

UPDATE 
	LargePop
SET
	population = population + 1
WHERE
	name = 'Japan';

UPDATE 
	LargePop
SET
	population = 999999
WHERE
	name = 'Japan';

CHECK TABLE LargePop;
	
ALTER VIEW LargePop AS
SELECT
	name,
	population
FROM
	country
WHERE
	population >= 100000
WITH CHECK OPTION;

DROP VIEW IF EXISTS
	LargePop;

SHOW ERRORS;

DROP VIEW IF EXISTS
	LargePop;

SHOW WARNINGS;

CHECK TABLE
	LargePop;

ALTER VIEW euro_view AS
	SELECT
		code,
		name,
		population
	FROM
		country
	WHERE
		continent = 'europe'
WITH CHECK OPTION;

SELECT
	*
FROM
	information_schema.views
WHERE
	TABLE_NAME = 'CityView' AND
	TABLE_SCHEMA = 'world';


SHOW CREATE VIEW
	cityview;

SHOW COLUMNS
FROM
	cityview;

DESC cityview;

SHOW TABLE STATUS;
SHOW TABLES;
SHOW FULL TABLES;
use world;

SELECT 
	*
FROM
	information_schema.views
WHERE
	TABLE_NAME = 'euro_view' AND
	TABLE_SCHEMA = 'world';

SHOW CREATE VIEW
	euro_view;
DESC euro_view;

use information_schema;
SHOW TABLES;
SHOW FULL TABLES;
SHOW TABLE STATUS;
DESC information_schema.views;


###########################################
## Aufgaben
###########################################

-- 1:

CREATE VIEW CountryCapitals AS
SELECT
	country.code,
	country.name AS country,
	country.continent,
	city.name AS city,
	city.id
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode;

SELECT
	*
FROM
	CountryCapitals;

INSERT INTO 
	CountryCapitals
SET
	code = 'NLÖ',
	country = 'country',
	continent = 'Europe';

UPDATE
	CountryCapitals
SET
	code = 'NLP',
	country = 'country',
	continent = 'Europe';

-- 2:
/* View languages,
	- eine Zeile je Sprache
	- SUM()/ Prozentanteil - mit der Anzahl Menschen, die sie sprechen
	- und eine Liste wo die Sprachen gesprochen werden
*/
-- Tabellen
DESC countryLanguage;
DESC country;
SELECT
	*
FROM
	countryLanguage;

ALTER VIEW languages AS
SELECT
	language,
	round(SUM(population * percentage / 100),0),
	GROUP_CONCAT(name)
FROM
	countryLanguage
		JOIN
	country
		ON
	country.code = countrylanguage.countrycode
GROUP BY
	language;



-- 3:
/* vorhandene View ersetzen: euro_view
- ALTER VIEW
- Daten aus Country
- Spalten
	- Code
	- Name
	- Continent
- WHERE
	Continent = Europe
WITH CHECK OPTION

*/
SHOW TABLE STATUS;
SHOW TABLES;
DESC euro_view;

ALTER VIEW euro_view AS
SELECT
	code,
	name,
	continent
FROM
	country
WHERE
	continent = 'Europe'
WITH CHECK OPTION;


-- 4:
/* Ändere  in the euro_view den Continent auf Asia, wenn Code 'DEU'
Resultat erklären!
*/

UPDATE
	euro_view
SET
	continent = 'Asia'
WHERE
	code = 'DEU';

-- die View hat als Where clause cont = Europe drin
-- WITH CHECK OPTION verhindert Änderung auf Asia


-- 5:
/*
- abgeschrieben
- Aufbau aber logisch
- eventueller Ersatz für Constraints

*/

CREATE VIEW City_V AS
SELECT
	*
FROM
	city
WHERE
	countrycode IN(
		SELECT
			code
		FROM
			country
	)	
WITH CASCADED CHECK OPTION;

SELECT
	*
FROM
	city_v;

-- 6
/*
- View FrenchCont erstellen
- continents
	- Länder in denen mehr als 20% der Einwohner fraz sprechen
- GROUP BY continent
- dann SELECT ausführen, alles anzeigen
*/
DESC country;
CREATE VIEW frenchCont AS
SELECT DISTINCT
	country.continent
FROM
	country
		JOIN
	countryLanguage
		ON
	country.code = countryLanguage.countrycode
WHERE
	countryLanguage.language = 'french' AND
	countryLanguage.percentage > 20;
	
SELECT
	*
FROM
	frenchCont;
