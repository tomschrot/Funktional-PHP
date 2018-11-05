# Before you start, 
# load and install the official sample database (classicmodels) from:
# http://www.mysqltutorial.org/wp-content/uploads/2018/03/mysqlsampledatabase.zip
#------------------------------------------------------------------------------
#Final procedure classicmodels.GET_CUSTOMER_BY_COUNTRY
DROP PROCEDURE IF EXISTS classicmodels.GET_CUSTOMERS_BY_COUNTRY;
DELIMITER ;;
CREATE PROCEDURE classicmodels.GET_CUSTOMERS_BY_COUNTRY(
    IN in_country VARCHAR(64)
)
BEGIN
    #--------------------------------------------------------------------------
    IF in_country = '' THEN 
		SET @country = '#';
    ELSE
		SET @country = CONCAT('%', in_country, '%');
	END IF;
    #--------------------------------------------------------------------------
    SELECT
        customerName AS customer
        ,CONCAT(contactFirstName, ' ', contactLastName) AS name
        ,city
        ,country
    FROM 
        classicmodels.customers
    WHERE 
        country LIKE @country
    ORDER BY
        country
        ,city
        ,customerName;
        
    #--------------------------------------------------------------------------
END;;
DELIMITER ;
#------------------------------------------------------------------------------
#Final procedure classicmodels.GET_CUSTOMER_COUNTRIES
DROP PROCEDURE IF EXISTS classicmodels.GET_CUSTOMER_COUNTRIES;
DELIMITER ;;
CREATE PROCEDURE classicmodels.GET_CUSTOMER_COUNTRIES()
BEGIN
    #--------------------------------------------------------------------------
    SELECT
        country
        ,CONCAT(country, ' (', COUNT(*), ')' ) AS label
    FROM
        classicmodels.customers
    GROUP BY
        country
    ORDER BY
        country;
    #--------------------------------------------------------------------------
END;;
DELIMITER ;
#------------------------------------------------------------------------------
#create a user for php server:
USE mysql;
DROP USER IF EXISTS phpfunc@localhost;
FLUSH PRIVILEGES;
CREATE USER phpfunc@localhost IDENTIFIED BY 'ticktricktrack';
GRANT ALL PRIVILEGES ON *.* TO phpfunc@localhost WITH GRANT OPTION;
#------------------------------------------------------------------------------