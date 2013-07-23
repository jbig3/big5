SELECT
	language
FROM
	countrylanguage
WHERE
	countryCode = (
		SELECT 
			code
		FROM
			country
		WHERE
			name = 'Finland'
);

SELECT 
    code
FROM
    country
WHERE
    name = 'Finland';

SELECT
	language
FROM
	countrylanguage
WHERE
	countryCode = 'FIN';

SELECT
	country.name,
	100 *country.population / (	SELECT
								SUM(country.population) 
							FROM
								country)	AS pct_off_world
FROM
	country;


SELECT
	name,
	(	SELECT
			COUNT(*)
		FROM
			city
		WHERE
			countryCode = code) AS cities,
	(	SELECT
			COUNT(*)
		FROM
			countryLanguage
		WHERE countrycode = code) AS Languages
FROM
	country;


SELECT
	('London', 'GBR') = (	SELECT 
								name, 
								countrycode 
							FROM
								city
							WHERE
								id = 456) AS `ist London `;


SELECT
	(	SELECT 
			id,
			name,
			countrycode
		FROM
			city
		WHERE 
			id = 456) 
	=
	(	SELECT
			id,
			name,
			countrycode
		FROM
			city
		WHERE
			countrycode = 'GBR' AND
			name = 'London') AS isEqual;

SELECT 
	(NULL, 
	NULL)
	<=>
	(	SELECT
			id,
			name
		FROM
			city
		LIMIT 0);

SELECT
	(456,
	'London',
	'GBR')
	= 
	(	SELECT
			name,
			countryCode
		FROM
			city)
		LIMIT 1;
		

SELECT
	*
FROM
	(	SELECT
			code,
			name
		FROM
			country
		WHERE
			indepYear IS NOT NULL) AS IndepCOuntries;

SELECT
	AVG(cont_sum)
FROM
	(	SELECT
			continent,
			SUM(population) as cont_sum
		FROM
			country
		GROUP BY
			continent) AS u;

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
		WHERE
			continent = 'Asia'
		);

SELECT
	*
FROM
	city
WHERE
	(countrycode,
	name) IN(
		SELECT
			code,
			name
		FROM
			country
		WHERE
			continent = 'Asia'
		);


SELECT
	*
FROM
	city
WHERE EXISTS (
	SELECT 
		NULL
	FROM
		country
	WHERE
		country.capital = city.id);

SELECT
	*
FROM
	country
WHERE NOT EXISTS(
	SELECT
		NULL
	FROM
		countryLanguage
	WHERE
		country.code = countryLanguage.countrycode AND
		language = 'English');


SELECT
	'Finland'
	= 
	ANY(
		SELECT
			name
		FROM
			country
		);

SELECT
	*
FROM
	city
where
	population > SOME(
		SELECT
			Population
		FROM
			country
		);

SELECT
	*
FROM
	country
where
	population > ALL(
		SELECT
			Population
		FROM
			city
		);

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
		WHERE
			continent = 'Europe'
		);

SELECT
	*
FROM
	country
WHERE
	NOT EXISTS(
		SELECT
			NULL
		FROM
			city
		WHERE
			city.countrycode = country.code
	);

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
		WHERE
			country.name = 'Belgium'
	);


SELECT
	country.name,
	(
	SELECT
		count(*)
	FROM
		city
	WHERE
		city.countryCode = country.Code
	) AS CityCount
FROM
	country
WHERE
	Region = 'Nordic Countries';


SELECT
	AVG(TOTALS)
FROM
	(
	SELECT
		SUM(population) AS TOTALS
	FROM
		country
	GROUP BY
		continent 
	) AS temp;
	

SELECT 
	name
FROM 
	city
WHERE
	population > 	(
						SELECT
							population 
						FROM
							city
						WHERE
							name = 'New York'
					)
ORDER BY
	population;



SELECT DISTINCT
	language
FROM
	countrylanguage
WHERE 
	countrycode IN	(
						SELECT
							code
						FROM
							country
						WHERE
							continent = 'Africa'
					);

DELETE
FROM
	city
WHERE 
	countrycode IN (
		SELECT 
			code
		FROM
			country
		WHERE
			lifeexpectancy < 70.0
	);

UPDATE
	country
SET
	population = ( 	SELECT
						SUM(population)
					FROM
						city
					WHERE
						country.code = city.countrycode
				);


SELECT
	name
FROM
	country
WHERE 
	code IN (
		SELECT
			countrycode
		FROM
			countrylanguage
		WHERE
			language = 'Spanish'
	);

SELECT
	name
FROM
	country
		JOIN
	countrylanguage
		ON
	country.code = countryLanguage.countryCode
WHERE 
	countrylanguage.language = 'Spanish';

SELECT DISTINCT
	name
FROM
	country
		JOIN
	countrylanguage
		ON
	country.code = countrylanguage.countrycode;

SELECT
	city.*
FROM
	city
WHERE
	ID NOT IN (
		SELECT 
			capital
		FROM
			country
	);

SELECT
	city.*
FROM
	city
		LEFT JOIN
	country
		ON
	id = capital
WHERE 
	capital IS NOT NULL;

SELECT
	country.name,
	(
	SELECT
		count(id)
	FROM
		city
	WHERE 
		countrycode = code
	) AS NumberOfCities,
	(
	SELECT
		count(language)
	FROM
		countryLanguage
	WHERE
		countrycode = code
	) AS NumberOfLanguages
FROM
	country;


SELECT
	country.name,
	IFNULL(cities.numberOfCities, 0) AS numberOfCities,
	IFNULL(Languages.NumberOfLanguages, 0) AS NumberOfLanguages
FROM
	country
		LEFT JOIN
	(
	SELECT
		countrycode,
		COUNT(id) AS numberOfCities
	FROM city
	GROUP BY 
		countrycode
	) AS cities
		ON
	country.code = cities.countrycode
		LEFT JOIN
	(
	SELECT
		countrycode,
		COUNT(language) AS NumberOfLanguages
	FROM
		countryLanguage
	GROUP BY
		countrycode
	) AS Languages
		ON
	country.code = Languages.countrycode;

########################################
## Aufgaben
########################################

-- 1

SELECT
	country.name
FROM
	country,
	city
WHERE 
	country.code = city.countrycode
	AND
	city.population = 
						(
						SELECT
							MAX(population)
						FROM
							city
						);

SELECT
	country.name,
	language
FROM
	country
		JOIN
	countryLanguage
		ON
	country.code = countryLanguage.countrycode
WHERE
	countryLanguage.language = 'Spanish'
	AND
	country.continent = 'Europe';
	
	
SELECT
	country.name,
	language
FROM
	country
		JOIN
	countryLanguage
		ON
	country.code = countryLanguage.countrycode
WHERE
	countryLanguage.language = 'French'
	AND
	CODE NOT IN(
		SELECT 
			countrycode 
		FROM
			countryLanguage
		WHERE
			language = 'English'
	);


-- 4

SELECT
	country.name AS Land,
	
	city.name AS Stadt,
	city.population AS Einwohner
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode
WHERE
	MAX(city.population)
GROUP BY
	country.name;


SELECT
	name,
	MAX(population)
FROM
	city
GROUP BY
	name;

SELECT
	country.name,
	(
	SELECT
	MAX(population)
	FROM
		city
	WHERE
		country.code = city.countrycode
	) AS LargeCity
FROM
	country
ORDER BY
	country.name;

-- 6

SELECT
	country.name AS Country,
	city.name AS city
FROM
	country
		JOIN
	(
	SELECT
		countrycode,
		MAX(population) AS MaxPop
	FROM
		City
	GROUP BY 
		CountryCode
	) AS tbl
		ON
	tbl.countryCode = country.code
		JOIN
	city
		ON
	city.countryCode = country.code
	AND
	city.population = tbl.maxpop;

-- 7

SELECT
	city.name AS city,
	city.population AS Einwohner
FROM
	city
WHERE
	city.population > 
	(
		SELECT
			MAX(city.population)
		FROM
			city
				JOIN
			country
				ON
			country.code = city.countryCode
		WHERE
			country.name = 'China'
		);
			


SELECT
	MAX(city.population)
FROM
	city
		JOIN
	country
		ON
	country.code = city.countryCode
	AND
	country.name = 'China';


-- 7 die größe Stadt auf jedem Kontinent
DESC country;

SELECT DISTINCT
	continent
FROM
	country;
	

SELECT
	city.name,
	MAX(city.population)
FROM
	city
WHERE
	MAX(city.Population)
GROUP BY
	city.name;

SELECT
	country.continent,
	city.name
FROM
	country
		JOIN
	city
		ON
	country.code = city.countrycode,
	(
	SELECT
		continent,
		MAX(city.population) AS population
	FROM 
		country
			JOIN
		city
			ON
		country.code = city.countrycode
	GROUP BY
		continent
	) AS tbl
WHERE
	country.continent = tbl.continent
	AND
	city.population = tbl.population;


-- 8

SELECT
	tbl1.name
FROM
	(
	SELECT DISTINCT
		city.name,
		country.continent
	FROM
		city
			JOIN
		country
			ON
		country.code = city.countrycode
	) AS tbl1
		JOIN
	(
	SELECT DISTINCT
		city.name,
		country.continent
	FROM
		city
			JOIN
		country
			ON
		country.code = city.countrycode
	) AS tbl2
		ON
	tbl1.name = tbl2.name AND
	tbl1.continent <> tbl2.continent
GROUP BY
	tbl1.name
HAVING
	count(*) >2;

-- Alternativ:

SELECT
	city.name
FROM 
	city 
		JOIN
	country
		ON
	city.countrycode = country.code
GROUP BY
	city.name
HAVING
	COUNT(DISTINCT continent) > 2;


-- 9

SELECT
	name
FROM
	country
WHERE
	EXISTS(
		SELECT
			name
		FROM
			city
		WHERE
			city.countrycode = country.code
	GROUP BY 
		name
	HAVING
		COUNT(name) > 1);