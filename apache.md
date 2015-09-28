# Apache

### Change Apache user:

sudo vim /etc/apache2/envvars
Change Apache runs as user/group "vagrant" instead of "www-data":

export APACHE_RUN_USER=vagrant
export APACHE_RUN_GROUP=vagrant

Then restart (not reload) Apache:
sudo service apache2 restart

### Exampe virtual host file
```
<VirtualHost *:80>
        ServerAdmin webmaster@example.com
        ServerName  mysite.jlocal
        ServerAlias mysite.jlocal

        # Indexes + Directory Root.
        DocumentRoot /home/vagrant/code/mysite

         <Directory /home/vagrant/code/mysite >
                DirectoryIndex index.php
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>

        # Logfiles

        ErrorLog /home/vagrant/code/mysite/errors.log

        CustomLog /home/vagrant/code/mysite/access.log common

</VirtualHost>
```
