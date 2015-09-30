# MySQL

### Grant remote access for root user:

```
There's two steps in that process:

a) Grant privileges. As root user execute:

GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password';
b) bind to all addresses:

The easiest way is to comment out the line in your my.cnf file:

#bind-address = 127.0.0.1 
and restart mysql

service mysql restart
To check where mysql service has binded execute as root:

netstat -tupan | grep mysql
```
source: http://stackoverflow.com/questions/11223235/mysql-root-access-from-all-hosts