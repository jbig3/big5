SELECT CURDATE(), VERSION();

SELECT name,
TRUNCATE(Population/SurfaceArea, 2) AS `Menschen/qm`,
IF (GNP > GNPOld, 'steigend', 'fallend') AS Trend
FROM country
ORDER BY `Menschen/qm` DESC
LIMIT 10;

SELECT CONCAT ('abc', 'def', REPEAT('cv', 3)) AS '123';

SELECT @@SQL_MOde;

SET SQL_MODE := 'PIPES_AS_CONCAT';

SELECT 'abc' || 'DFDHF';

SET SQL_MODE := '';


SELECT 'Müller' = 'Mueller';

SET collation_connection = latin1_german2_ci;

SELECT name FROM country
WHERE name not like 'unit%';

SELECT '2010-01-01' - INTERVAL 10 DAY;

SELECT (500+600/1000)/3;

SELECT 2+3+NULL;

SELECT 2+3+'6';

SELECT Population
FROM country
WHERE Population > 0
ORDER BY Population ASC 
LIMIT 3;

SELECT CONCAT(name, ' is in ', district)
FROM city
LIMIT 5;

SELECT name 
FROM city
WHERE name LIKE '_a%city%';

SELECT CURDATE() AS Heute;

SELECT NOW() AS Jetzt;
SELECT NOW() + INTERVAL 10 YEAR AS  `Jetzt+10Jahre`;

SELECT PI ();

SELECT least(1, 3,-5, 9);
SELECT greatest(1, 3,-5, 9);


SELECT INTERVAL(10,1,5,107,8,9,111, 7);

SELECT IF(1>0, 'ja', 'nein');

SELECT name
FROM country
ORDER BY IF(code = 'USA', 1, 2), name
LIMIT 10;

CREATE TABLE verkauf(
division CHAR(1),
sale INT(3),
syear INT(4)
);

INSERT INTO verkauf
VALUES
('A', 100, 2000),
('A', 140, 2000),
('A', 10, 2001),
('A', 122, 2003),
('B', 12, 2003),
('B', 100, 2002),
('B', 140, 1999),
('C', 100, 1999),
('C', 90, 2001);

SELECT division,
SUM(IF(syear=1999, sale, 0)) AS year99,
SUM(IF(syear=2000, sale, 0)) AS year00,
SUM(IF(syear=2001, sale, 0)) AS year01,
SUM(IF(syear=2002, sale, 0)) AS year02,
SUM(IF(syear=2003, sale, 0)) AS year03
FROM verkauf
GROUP BY division;

SELECT IF(1>NULL, 'si', 'no');
SELECT IF(NULL = NULL, 'si', 'no');
SELECT IF(NULL <> NULL, 'si', 'no');

SELECT name
FROm country
ORDER BY
CASE code
	WHEN 'USA' THEN 1
	WHEN 'CAN' THEN 2
	WHEN 'MEX' THEN 3
	ELSE 4
END,
name
LIMIT 3;

SELECT 
	CASE
		WHEN code = 'USA' THEN 'Die Ammies'
		WHEN continent = 'Europe' THEN 'de europäer'
		ELSE 'der rest der welt'
	END
	AS Area,
	SUM(GNP),
	SUM(Population)
FROM country
GROUP BY Area;

SELECT ROUND(28.5);
SELECT ROUND(-28.5);
SELECT FLOOR(28.5);
SELECT FLOOR(-28.5);
SELECT Ceiling(28.5);
SELECT CEILING(-28.5);
SELECT ABS(-145.5);

SELECT SIGN(-0);

SELECT 	INSTR('hallo du und ich', 'du'),
		LOCATE('du', 'hallo du und ich'),
		POSITION('du' IN 'hallo du und ich');

SELECT LOCATE('hallo du und ich', 'du', 1); ## Startparameter
SELECT LENGTH('hallo du und ich');
SELECT CHAR_LENGTH(CONVERT('hallo du und ich öäü5555' USING ucs2));
SELECT CONCAT('ich', 'geh', 'am', 'Stock');
SELECT CONCAT_WS(' ', 'geh', 'am', 'Stock');
SELECT SUBSTRING('hallo du und ich', 1, 2);
SELECT SUBSTRING_INDEX('hallo du und ich', 'lo', 1);
SELECT SUBSTRING_INDEX('hallo du und ich', 'lo ', -1);
SELECT LEFT('hallo du und ich', 5);
SELECT RIGHT('hallo du und ich', 5);
SELECT 
	CONCAT('<', LTRIM(' ALICE '), '>'),
	CONCAT('<', RTRIM(' ALICE '), '>'),
	CONCAT('<', TRIM(' ALICE '), '>');
SELECT TRIM(LEADING 'hal' FROM 'halhalhalsdgasldjfgas');
SELECT REPLACE('hallo du und ich', 'und', '&');
SELECT INSERT('hallo du und ich', 7, 6, 'des neue');
SELECT USER(), CHARSET(USER()), COLLATION(USER());
SELECT CONVERT(_latin1'Müller' USING utf8);
SELECT CAST(_latin1'mßßller' AS CHAR CHARACTER SET utf8);

SELECT STRCMP('abc', 'def'),
STRCMP('def', 'def'),
STRCMP('ghi', 'def');

SELECT 'ABC' = 'cdf', 'def' = 'def', 'eimer' = 'def';

SELECT NOW();
#

SELECT 
	YEAR(NOW()),
	MONTH(NOW()),
	DAYOFMONTH(NOW()),
	DAYOFYEAR(NOW()),
	HOUR(NOW()),
	MINUTE(NOW()),
	SECOND(NOW());

SELECT MAKEDATE(2010,105);
SELECT MAKETIME(12,48,00);

SELECT
	CURRENT_DATE(),
	CURDATE(),
	UTC_DATE(),
	CURRENT_TIME(),
	CURTIME(),
	UTC_TIME(),
	CURRENT_TIMESTAMP(),
	UTC_TIMESTAMP();

SELECT 
	ISNULL(NULL),
	ISNULL(0),
	ISNULL(1);

SELECT 
	IFNULL(NULL, 'a'),
	IFNULL(0, 'a');

SELECT 
	CONCAT('a', 'b'),
	CONCAT('a',NULL,'b');

SELECT 
	CONCAT_WS('/','a','b'),
	CONCAT_WS('/','a', NULL, 'b');

SELECT 
	IFNULL(HeadOfState, 'nix gemacht'),
	name
FROM country
WHERE name = 'San Marino';

SELECT
	countryCode,
	language
FROM countrylanguage
ORDER BY 
	IF (countryCode = 'NOR',1,2),
	language
LIMIT 10;

SELECT ROUND(3.75);

SELECT 
	SIGN(-80),
	SIGN(-(-100)),
	SIGN(0);

SELECT 
	CHAR_LENGTH(name) AS Namenlänge
FROM City
WHERE name = 'Dallas';

SELECT
	CONCAT('this', 'is', 'a', 'great', 'class'),
	CONCAT_WS(' ', 'this', 'is', 'a', 'great', 'class');

SELECT
	CURDATE() + INTERVAL 21 DAY,
	NOW(),
	NOW() + INTERVAL 5 HOUR;

/* komment
	auch noch komment
*/
/* 	nochmal Content */

-- auch comment
# auch noch ein komment

-- Aufgabe 1
SELECT NOW() + INTERVAL 1 YEAR + INTERVAL 2 MONTH;

-- Aufgabe 2:
SELECT 
	MIN(CHAR_LENGTH(name)) AS minimal,
	MAX(CHAR_LENGTH(name)) AS maximal
FROM city;



-- Aufgabe 3:
SELECT 
	ROUND(Population, -6) AS Pop
FROM country
ORDER BY Pop DESC
LIMIT 5;

-- Aufgabe 4:
SELECT 
	name	
FROM country
WHERE ISNULL(LifeExpectancy);



-- Aufgabe 5: 
SELECT 
	SUBSTRING(name, 1, 2) AS kurz,
	COUNT(SUBSTRING(name, 1, 2)) AS anzahl
FROM country
GROUP BY
	kurz
ORDER BY 
	anzahl DESC
LIMIT 10;

SELECT 
	SUBSTRING(name, 1, 2) AS kurz
	-- COUNT(SUBSTRING(name, 1, 2)) AS anzahl
FROM country
GROUP BY
	kurz
HAVING count(SUBSTRING(name, 1, 2)) = MAX(COUNT(SUBSTRING(name, 1, 2)));



-- Aufgabe 6:
SELECT
 CONCAT_WS(' ',
		MONTHNAME(NOW()),
		DAY(NOW()),
		YEAR(NOW())
 	) AS Datum
;

-- alternativ
SELECT DATE_FORMAT(NOW(), '%b - %M %d, %Y');

-- Aufgabe 7:
SELECT
	name,
	region,
	CONCAT(name, ' (', region, ')') AS Verknuepfung
FROM country
WHERE continent = 'Asia';

-- Aufgabe 8:
SELECT 
	name
FROM country
WHERE 
	name like '%a%' AND
	name like '%c%' AND
	name like '%s%';

-- Aufgabe 9:
SELECT
	continent,
	ROUND(AVG(LifeExpectancy))
FROM country
GROUP BY Continent;

-- Aufgabe 10:
SELECT
	SUM(population) AS WorldPop,
	SUM(IF(Continent = 'Europe', population, 0)) AS EuropePop
FROM country;

-- Aufgabe 11
SUM(IF(syear=1999, sale, 0)) AS year99,
SUM(IF(syear=2000, sale, 0)) AS year00,
SUM(IF(syear=2001, sale, 0)) AS year01,
SUM(IF(syear=2002, sale, 0)) AS year02,
SUM(IF(syear=2003, sale, 0)) AS year03

SELECT 
	continent,GovernmentForm,	count(name) 
FROM
	country
group by continent,GovernmentForm
order by continent,count(name) desc,GovernmentForm;

# GRuppe nach Continent


##################################################

SELECT
	GovernmentForm,
	SUM() AS Europa,
	SUM() AS Asien
FROM
GROUP BY

DESC country;


show variables like '%date%';
SELECT GET_FORMAT(DATE, 'EUR');

SHOW CREATE DATABASE
	world;

SHOW CREATE TABLE
	city;
	
SELECT @@SQL_MODE;

SET SQL_MODE := 'TRADITIONAL';

SELECT @@GLOBAL.SQL_MODE;
SELECT @@SESSION.SQL_MODE;

SET GLOBAL SQL_MODE := 'TRADITIONAL';

