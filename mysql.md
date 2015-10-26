# MySQL

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

### Import data from csv file:
```
LOAD DATA LOCAL INFILE '/home/yourusername/Downloads/file.csv' 
INTO TABLE discounts 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
```
