CREATE PROCEDURE
	world_record_count()
SELECT
	'countryCount',
	count(*)
FROM
	country;

CREATE FUNCTION
	ThankYou
	(s CHAR(20))
RETURNS 
	CHAR(50)
RETURN CONCAT('Thank You, ', s, '!');


CREATE PROCEDURE hello()
SELECT
	'hello world!';


CALL hello();
CALL world_record_count(); 

CREATE FUNCTION hello(input CHAR(20))
RETURNS CHAR(50)
RETURN 
	CONCAT('Halllo du ',input, '!');

SELECT hello('world');

DELIMITER //
CREATE PROCEDURE world_record_countdd1()
BEGIN 
	SELECT 
		'country count',
		count(*)
	  FROM
		country;
	SELECT
		'city count',
		count(*)
	  FROM
		city;
	SELECT
		'countrylanguage count',
		count(*)
	  FROM
		countryLanguage;
END//
DELIMITER ;

CALL world_record_countdd1();

DELIMITER //
CREATE PROCEDURE country_info2(IN c_code CHAR(3))
BEGIN
	SELECT * FROM city WHERE countrycode = c_code;
	SELECT * FROM country WHERE code = c_code;
	SELECT * FROM countrylanguage WHERE countrycode = c_code;
END//

DELIMITER ;

CALL country_info2('NLD');

DELIMITER //
CREATE FUNCTION add_tax(total_charge FLOAT(9,2))
RETURNS FLOAT(10,2)
BEGIN
	DECLARE tax_rate FLOAT(3,2) DEFAULT 0.07;
	RETURN total_charge + total_charge * tax_rate;
END//
DELIMITER ;

SELECT add_tax(100.0);


-- Session-Variable
SELECT 
	SUM(population)
FROM
	city
INTO
	@cityPop;

SELECT
	SUM(population)
INTO
	@citypop2
FROM
	city;

SELECT 
	@citypop2;


-- lokale Variable

SELECT 
	COUNT(*)
FROM 
	city
INTO
	totalcity;

DELIMITER //
CREATE FUNCTION 
	final_bill(
		total_charge FLOAT(9,2),
		tax_rate FLOAT(3,2))
RETURNS FLOAT(10,2)
BEGIN
	DECLARE bill FLOAT(10,2);
	SET bill = total_charge + total_charge * tax_rate;
	RETURN bill;
END //
DELIMITER ;
DROP FUNCTION 
	final_bill;

SELECT 
	final_bill(100, 0.19);

DELIMITER //
CREATE PROCEDURE
	precedence(
		param1 INT
	)
BEGIN
	DECLARE var1 INT DEFAULT 0;
	SELECT 
		'outer1',
		param1,
		var1;
	BEGIN
		DECLARE param1, var1 CHAR(3) DEFAULT 'abc';
		SELECT
			'inner1',
			param1,
			var1;
	END;
	SELECT
		'outer1',
		param1,
		var1;
END//
DELIMITER ;

CALL precedence(10);

DELIMITER //
CREATE FUNCTION
	pop_percentage(
		c_code CHAR(3)
	)
RETURNS DECIMAL(4,2)
BEGIN
	DECLARE
		worldpop,
		cpop BIGINT;
	SELECT
			SUM(population)
		FROM 
			country
		INTO
			worldpop;
	SELECT
			population
		FROM
			country
		WHERE
			code = c_code
		INTO
			cpop;
	RETURN
		cpop / worldpop *100;
END//
DELIMITER ;

SELECT pop_percentage('CHN');

CREATE PROCEDURE
	param_proc_one(
	IN param1 INT,
	OUT param2 INT,
	INOUT param3 INT
	)
SELECT 
	param1,
	param2,
	param3;

SET 
	@value1 = 100,
	@value2 = 200,
	@value3 = 300;

CALL param_proc_one(@value1,@value2,@value3);


CREATE PROCEDURE
	param_proc_two(
	IN param1 INT,
	OUT param2 INT,
	INOUT param3 INT
	)
SET 
	param1 = 1,
	param2 = 2,
	param3 = 3;

CALL param_proc_two(@value1,@value2,@value3);
SELECT
	@value1,
	@value2,
	@value3;

use world;

CALL world.hello();

SHOW CREATE PROCEDURE
	hello;

CREATE DEFINER=`root`@`localhost` PROCEDURE `hello`()
SELECT
	'hello world!';

SHOW PROCEDURE STATUS
	like 'hello';

SHOW CREATE FUNCTION
	hello;

SHOW CREATE PROCEDURE
	param_proc_one;

SHOW PROCEDURE STATUS
	WHERE
		db = 'world';

SHOW FUNCTION STATUS
WHERE
	db = 'world';

SELECT
	*
FROM
	information_schema.routines
WHERE
	routine_schema = 'world';

DROP PROCEDURE
	country_info2;

DROP FUNCTION IF EXISTS
	add_tax;

DROP FUNCTION IF EXISTS
	hello2you;

SHOW WARNINGS;

DROP FUNCTION IF EXISTS
	hello;

CREATE FUNCTION
	hello(input CHAR(20))
RETURNS CHAR(100)
RETURN
	CONCAT('Hello ', input, '! Welcome to Mysql Training.');

SELECT hello('Boobs');

DELIMITER //

CREATE FUNCTION docase(
	1st_num DOUBLE(10,2),
	2nd_num DOUBLE(10,2),
	formula_type CHAR(15)
	)
RETURNS CHAR(30)
BEGIN
	CASE formula_type 
		WHEN 'Multiplication' THEN
		  RETURN
			CONCAT(1st_num, ' * ', 2nd_num, ' = ', 1st_num * 2nd_num);
		WHEN 'Division' THEN
		  RETURN
			CONCAT(1st_num, ' / ', 2nd_num, ' = ', 1st_num / 2nd_num);
		WHEN 'Addition' THEN
		  RETURN
			CONCAT(1st_num, ' + ', 2nd_num, ' = ', 1st_num + 2nd_num);
		WHEN 'Subtraction' THEN
		  RETURN
			CONCAT(1st_num, ' - ', 2nd_num, ' = ', 1st_num - 2nd_num);
		ELSE
		  RETURN 'Invalide du - flascher Type!!';
	END CASE;
END//
DELIMITER ;


SELECT 
	docase(10,20, 'Multiplication');


DELIMITER //
CREATE PROCEDURE dorepeat(p1 INT)
BEGIN
	DECLARE var_x INT;
	SET var_x = 0;

	REPEAT SET var_x = var_x + 1;
		SELECT 
			CONCAT('Die Variable x ist ', var_x) AS Repeat_Counter;
		UNTIL var_x > p1
	END REPEAT;

	SELECT
		CONCAT('the Final is: ', var_x) AS Repeat_Result;
END//
DELIMITER ;

CALL dorepeat(10);

DELIMITER //
CREATE PROCEDURE diwhile(p1 INT)
BEGIN
	DECLARE var_x INT;
	SET var_x = 0;

	WHILE var_x < p1 DO
		SET var_x = var_x + 1;
		SELECT 
			CONCAT('Die Variable x ist ', var_x) AS Repeat_Counter;
	END WHILE;
	
	SELECT
		CONCAT('the Final is: ', var_x) AS Repeat_Result;
END//
DELIMITER ;

CALL diwhile(10);

DELIMITER //
CREATE PROCEDURE doloopif(p1 INT)
BEGIN
	DECLARE var_x INT;
	SET var_x = 0;

	loop_test: LOOP
	  IF var_x < p1 THEN
		SET var_x = var_x + 1;
		SELECT 
			CONCAT('Die Variable x ist ', var_x) AS Repeat_Counter;
	  ELSE
		LEAVE loop_test;
	  END IF;
	END LOOP loop_test;

	SELECT
		CONCAT('the Final is: ', var_x) AS Repeat_Result;
END//

DELIMITER ;

CALL doloopif(10);


CREATE TABLE 
	d_table (
		s1 INT,
		PRIMARY KEY (s1)
	);

DELIMITER //
CREATE PROCEDURE dohandler ()
BEGIN
	DECLARE dup_keys CONDITION FOR SQLSTATE '23000';
	DECLARE CONTINUE HANDLER FOR dup_keys SET @garbage = 1;

	SET @x = 1;
	INSERT INTO
		world.d_table
	VALUES
		(1);
	SET @x = 2;
	INSERT INTO
		world.d_table
	VALUES
		(1);
	SET @x = 3;
END //
DELIMITER ;
	
CALL dohandler();
SELECT @x;
SELECT @garbage;	
SELECT * FROM d_table;


DELIMITER //
CREATE FUNCTION g_table (tbl_name CHAR(64))
RETURNS INT
BEGIN
	DECLARE result BOOL DEFAULT false;
	DECLARE show_table CHAR(64);
	DECLARE doneFlag BOOL DEFAULT false;
	DECLARE q1 CURSOR FOR
		SELECT 
			TABLE_NAME 
		FROM
			INFORMATION_SCHEMA.TABLES
		WHERE
			TABLE_SCHEMA = DATABASE();
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET doneFlag = true;
	OPEN q1;

	doloop: LOOP
	  FETCH q1 INTO show_table;
	  IF doneFlag THEN
		LEAVE doloop;
	  END IF;
	  IF show_table = tbl_name THEN
		SET result = true, doneFlag = true;
	  END IF;
	END LOOP doloop;

	CLOSE q1;
	RETURN result;
END//

DELIMITER ;

DROP FUNCTION g_table;
SELECT g_table('sdfgsdh');
SELECT g_table('country');


######################################
## Aufgaben
######################################

CREATE FUNCTION c_length(a INT, b INT)
	RETURNS DECIMAL(10,3)
	RETURN SQRT(a * a + b * b );

DROP FUNCTION c_length;	

SELECT c_length(5, 10);

SELECT
	*
FROM
	INFORMATION_SCHEMA.routines
WHERE
	ROUTINE_NAME = 'c_length';

-- 4:

CREATE FUNCTION country_name(country_code CHAR(3))
RETURNS CHAR(50)
RETURN(
	SELECT
		name
	FROM
		country
	WHERE
		code = country_code
);

SELECT country_name('DEU');

SHOW CREATE FUNCTION country_name;

CREATE FUNCTION country_capital(country_name CHAR(50))
RETURNS CHAR(50)
RETURN(
	SELECT
		city.name
	FROM
		country
			JOIN
		city
			ON
		country.capital = city.id
	WHERE
		country.name = country_name
);

DROP FUNCTION country_capital;

SELECT country_capital('MySQL');