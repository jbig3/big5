SELECT @@AUTOCOMMIT;

SET AUTOCOMMIT = off;
SET AUTOCOMMIT = 1;
SET @@autocommit = on;

START TRANSACTION;

SELECT 
    name
FROM
    city
WHERE
    ID = 3803;

DELETE
FROM
	city
WHERE
	ID = 3803;

ROLLBACK;

SHOW ENGINES;
SHOW CREATE TABLE city;

SELECT 
	*
FROM
	city
WHERE
	name = 'manta';

DELETE
FROM
	city
WHERE
	name = 'Manta';

COMMIT;

##############################
## Transaction isolation Level
##############################

SELECT @@global.tx_isolation, @@session.tx_isolation;
-- READ UNCOMMITTED | READ COMMITTED | REPEATABLE READ | SERIALIZABLE
SET GLOBAL TRANSACTION ISOLATION LEVEL READ COMMITTED;
SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED;

SELECT 
	name,
	countrycode
FROM
	city
WHERE
	name = 'Sakila';

	
SELECT 
	*
FROM
	city
WHERE
	countryCode = 'AUS';

SELECT 
	*
FROM
	city
WHERE
	countryCode = 'AUS'
	LOCK IN SHARE MODE;


##############################
## FOR UPDATE
##############################

SELECT 
	counter_field
INTO 
	@@counter_field
FROM
	child_codes
FOR UPADTE;

SHOW CREATE TABLE city;
START TRANSACTION;
SELECT
	*
FROM
	city;

DELETE
FROM
	city;
ROLLBACK;

SELECT
	*
FROM
	city
WHERE 
	id > 4070;
