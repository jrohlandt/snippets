# Apache

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
