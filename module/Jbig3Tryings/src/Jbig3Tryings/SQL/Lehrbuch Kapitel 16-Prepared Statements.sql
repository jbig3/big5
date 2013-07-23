PREPARE my_stmt 
FROM
	'SELECT
		COUNT(*)
	FROM
		countrylanguage
	WHERE
		countrycode = ?';

SET @code = 'esp';

EXECUTE my_stmt
	USING @code;

SET @code = 'deu';
SET @code = 'rus';

DEALLOCATE PREPARE my_stmt;


PREPARE namepop FROM
'SELECT
	name,
	population
FROM
	country
WHERE
	code = ?';

SET @var1 = 'usa';
SET @var1 = 'gbr';
SET @var1 = 'can';

EXECUTE namepop
	USING @var1;

SELECT @var2;