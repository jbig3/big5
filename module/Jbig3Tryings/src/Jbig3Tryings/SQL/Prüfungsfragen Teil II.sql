-- Frage 40:

SELECT
	continent,
	name,
	surfacearea
FROM
	country AS co_out
WHERE
	co_out.surfacearea = (
		SELECT
			MAX(surfacearea)
		FROM 
			country AS co_in
		WHERE
			co_in.continent = co_out.continent
		GROUP BY
			continent
	);


-- 41:

SELECT
	name,
	continent,
	population
FROM
	country AS co1
WHERE
	co1.population > (
		SELECT
			AVG(population)
		FROM
			country AS co2
		WHERE
			co1.continent = co2.continent
		GROUP BY 
			co2.continent
	);

-- D:
SELECT
	name,
	continent,
	population
FROM
	country AS c1
WHERE
	population > (
		SELECT
			AVG(population)
		FROM
			country AS c2
		WHERE
			c1.continent = c2.continent
		GROUP BY 
			continent
	);


-- 45
-- nur mit C als Bezug funktioniert nicht - muss code geschrieben werden

SELECT
	code AS c,
	name
FROM
	country
WHERE
	continent = 'Europe' AND
	EXISTS(
		SELECT
			*
		FROM
			countrylanguage
		WHERE
			countrycode = code AND
			language = 'german'
	);


-- 46:
UPDATE
	(SELECT
		code
	FROM
		country
	WHERE
		continent = 'Europe') AS co,
		city AS ci
SET
	population = population *1.01
	
WHERE 
	co.code = ci.countrycode;


-- 49:

SELECT
	*
FROM
	information_schema.routines
WHERE
	routine_name = 'city_pop' AND
	routine_schema = 'world';



-- 51:
-- a:
DELIMITER //
CREATE PROCEDURE 
	name_check(IN name CHAR(25))
BEGIN
	CASE name 
		WHEN 'United States' THEN SELECT 'USA' AS code;
	ELSEIF
		WHEN 'Finland' THEN SELECT 'FIN' AS code;
	ELSE
		SELECT 'Other' AS code;
	END CASE;
END//
DELIMITER ;


-- c: 

DELIMITER //
CREATE PROCEDURE 
	name_check(IN name CHAR(25))
BEGIN
	CASE name 
		WHEN 'United States' THEN SELECT 'USA' AS code;
		WHEN 'Finland' THEN SELECT 'FIN' AS code;
	ELSE
		SELECT 'Other' AS code;
	END CASE;
END//
DELIMITER ;

-- 69

SELECT
	*
FROM
	information_schema.tables
WHERE
	table_schema = 'information_schema'
ORDER BY
	table_name;