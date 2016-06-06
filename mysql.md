# MySQL

### Reset Root Password
http://stackoverflow.com/questions/10895163/how-to-find-out-the-mysql-root-password

### Grant remote access for root user:

a) Grant privileges. As root user execute:
```
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password';

```
b) Bind to all addresses, easy way is to comment out the line in your my.cnf file:
```
#bind-address = 127.0.0.1 
```

Then restart mysql
```
sudo service mysql restart
```

To check where mysql service has binded execute as root:
```
netstat -tupan | grep mysql
```
source: http://stackoverflow.com/questions/11223235/mysql-root-access-from-all-hosts

### Export sqldump
```
mysqldump -u dbuser -p dbname > desired_filename.sql
```
when using lock tables:
```
mysqldump -u dbuser -p dbname > desired_filename.sql --single-transaction
```
### Import from sqldump
```
mysql -u username -ppassword databasename < filename.sql
```

### Import data from csv file:
```
LOAD DATA LOCAL INFILE '/home/yourusername/Downloads/file.csv' 
INTO TABLE discounts 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
```

### Change the colation for tables to utf 8 ( also changes engine to innodb (optional))
```
SET @mycollate = 'utf8_general_ci';
SET @mycharset = 'utf8';
SET @mydb = 'skill_savant';

SELECT CONCAT('
SET FOREIGN_KEY_CHECKS = 0;
ALTER DATABASE ',@mydb,' DEFAULT CHARACTER SET ',@mycharset,';
ALTER DATABASE ',@mydb,' DEFAULT COLLATE ',@mycollate,';
USE ',@mydb,';') AS sqlq
UNION
SELECT CONCAT('ALTER TABLE ',  table_name, ' ENGINE=INNODB; ALTER TABLE ',  table_name, ' CONVERT TO CHARACTER SET ',@mycharset,' COLLATE ',@mycollate,';') AS sqlq FROM information_schema.tables  WHERE table_schema=@mydb GROUP BY table_name
UNION
SELECT CONCAT('ALTER TABLE `',`TABLE_NAME`,'` MODIFY `',`COLUMN_NAME`,'` ',`COLUMN_TYPE`,' CHARACTER SET ',@mycharset,' COLLATE ',@mycollate,';') AS sqlq FROM information_schema.COLUMNS WHERE table_schema = @mydb AND CHARACTER_SET_NAME IS NOT NULL
UNION
SELECT 'SET FOREIGN_KEY_CHECKS = 1;' AS sqlq;
```
