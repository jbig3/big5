HELP;
SHOW CREATE TABLE
	information_schema.schemata;

SELECT 
	* -- schema_name
FROM
	information_schema.schemata
WHere
	schema_name like 'world%';

SELECT NULL;
SELECT NULL=NULL;
SELECT NULL IS NULL;
SELECT NULL <=> NULL;
SELECT 1 > NULL;

use test;

CREATE TABLE vers(
	name VARCHAR(30),
	price1 FLOAT(10,2),
	price2 DOUBLE(10,2)
);

SHOW CREATE TABLE
	vers;

INSERT INTO
	vers
	(name, price1, price2)
VALUES
	('itme1', 10.1, 10.1),
	('itme2', 4.9, 4.9);

TRUNCATE TABLE
	vers;

SELECT 
	*
FROM 
	vers;

SELECT
	SUM(price1) AS total1,
	SUM(price2) AS total2
FROM
	vers
HAVING
	total1 = total2;

CREATE TABLE 
	friends (
		first_name VARCHAR(10),
		last_name VARCHAR(10)
);

INSERT INTO
	friends
	(first_name, last_name)
VALUES
	('anna', 'meier'),
	('berta', 'müeller'),
	('valra', 'schulze'),
	('cäsa', 'heinrich');

SELECT
	*
FROM
	friends
ORDER BY
	last_name,
	first_name DESC;

SELECT
	last_name,
	first_name
FROM
	friends
ORDER BY
	last_name,
	first_name;

HELP CONTENTS;
HELP FUNCTIONS;
HELP INFORMATION_FUNCTIONS;
HELP COLLATION;

CREATE /*!32302 TEMPORARY */ TABLE
	t
(a INT);

SELECT IFNULL(1/0, 'nö');

SHOW variables like 'char%';

CREATE DATABASE 
	world
CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SELECT
	*
FROM
	city
WHERE 
	name like '%münch%';

HELP CONTENTS;
HELP DATA_DEFINITION;
HELP CREATE_DATABASE;

SHOW CREATE DATABASE
	world;


USE world;
SHOW CREATE TABLE
	city;

	
DROP DATABASE 
		world;

SELECT now();
SELECT 
	CURDATE(),
	CURTIME();

SELECT
	COUNT(GovernmentForm) AS Europa
FROM
	country;

use test;
CREATE TABLE
	`Select` (
		id INT
);