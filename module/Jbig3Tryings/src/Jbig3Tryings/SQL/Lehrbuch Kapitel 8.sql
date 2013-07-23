SELECT TABLE_NAME
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'INFORMATION_SCHEMA'
ORDER BY TABLE_NAME;

SELECT COLUMN_NAME
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA = 'INFORMATION_SCHEMA'
AND TABLE_NAME = 'Views';

SELECT TABLE_NAME, ENGINE
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'world2';

SELECT 
	TABLE_SCHEMA, 
	TABLE_NAME,
	COLUMN_NAME
FROM 
	INFORMATION_SCHEMA.COLUMNS
WHERE 
	DATA_TYPE = 'set';
	
SELECT
	CHARACTER_SET_NAME,
	COLLATION_NAME
FROM
	INFORMATION_SCHEMA.COLLATIONS
WHERE
	IS_DEFAULT = 'Yes';

SELECT
	TABLE_SCHEMA,
	COUNT(*)
FROM
	INFORMATION_SCHEMA.TABLES
GROUP BY 
	TABLE_SCHEMA;


SELECT 
	*
FROM
	INFORMATION_SCHEMA.SCHEMATA
WHERE
	SCHEMA_NAME = 'test';

USE INFORMATION_SCHEMA;

SELECT 
	TABLE_NAME,
	ENGINE
FROM 
	TABLES
WHERE 
	TABLE_NAME = 'world2';

SELECT 
	TABLE_SCHEMA,
	ENGINE,
	COUNT(*)
FROM 
	TABLES
GROUP BY	
	TABLE_SCHEMA,
	ENGINE;

SELECT 
	TABLE_NAME,
	DATA_LENGTH
FROM
	TABLES
WHERE 
	TABLE_NAME = 'city';

SELECT
	DATA_TYPE,
	COUNT(*)
FROM
	INFORMATION_SCHEMA.COLUMNS
WHERE
	TABLE_SCHEMA = 'world2'
	AND
	DATA_TYPE IN ('CHAR', 'INT')
GROUP BY 
	DATA_TYPE;

#################################################################################################
# SHOW Statements
#################################################################################################
USE world2;

SHOW DATABASES;
SHOW TABLES;

SHOW
	TABLES
FROM
	test;

SHOW COLUMNS 
FROM
	verkauf;

SHOW 
	DATABASES
LIKE
	'%2';

SHOW 
	COLUMNS
FROM
	country
WHERE
	`Default` IS NULL;

SHOW 
	COLUMNS
FROM
	country
WHERE
	`Type` like 'int%';

SHOW
	INDEX
FROM 
	city;

SHOW CHARACTER SET
	like 'utf%';

SHOW COLLATION
	like 'utf%';

#################################################################################################
# DESCRIBE
#################################################################################################

DESCRIBE city;
DESC city;
SHOW 
	COLUMNS
FROM 
	city;

#################################################################################################
# Übungen 8B
#################################################################################################

SHOW 
	DATABASES
like '%o%';

SHOW 
	TABLES
FROM
	cdcol;

SHOW
	FULL COLUMNS
FROM
	city;

SHOW 
	INDEX
FROM
	city;

DESC
	CountryLanguage;

SHOW CHARACTER SET;
SHOW COLLATION;

