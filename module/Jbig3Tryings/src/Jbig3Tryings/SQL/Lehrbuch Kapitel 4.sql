SELECT * FROM city;

SELECT 1+2;

SHOW VARIABLES like 'char%';

SHOW VARIABLES like 'coll%';

SELECT COUNT(*) FROM country;

SELECT COUNT(capital) FROM country;

SELECT MAX(GNP) FROM country;

SELECT continent, AVG(population) 
FROM country
GROUP BY continent
ORDER BY AVG(population);


SELECT governmentform, GROUP_CONCAT(name) As agb
FROM country
WHERE continent = 'South America'
GROUP BY governmentform;


SELECT continent, SUM(population) As pop
FROM country
GROUP BY continent
WITH ROLLUP;

SELECT continent, SUM(population) As pop
FROM country
GROUP BY continent;

SELECT continent, AVG(population) As pop
FROM country
GROUP BY continent
WITH ROLLUP;

SELECT continent, AVG(population) As pop
FROM country
GROUP BY continent
HAVING SUM(population) > 100000000;

SELECT continent, COUNT(name) 
FROM  country
GROUP BY continent;

SELECT continent as b, GROUP_CONCAT(name) AS alpha
FROM  country
GROUP BY continent;

SELECT continent, SUM(GNP)
FROM country
GROUP BY continent
WITH ROLLUP;

SELECT district, COUNT(*) AS NumCities
FROM city
GROUP BY district
HAVING numCities >= 3;

SELECT name, countryCode
FROM city
WHERE countryCode like 'DEU';

SELECT district as Bundesland, GROUP_CONCAT(name) as Stadt, countryCode, SUM(Population) AS Pop
FROM city
WHERE countryCode = 'DEU'
GROUP BY district
HAVING Pop > 100000;

SELECT 1+1 UNION SELECT 2+2;

SELECT name 
FROM country
WHERE continent = 'Europ'
UNION
SELECT name 
FROM country
WHERE continent = 'South America';
