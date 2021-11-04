# Swmming Pool System
## Don't forget to add this in C:\xampp\apache\conf\extra\httpd-vhosts.conf
```
<VirtualHost 127.0.0.5:80>
    ServerAdmin 127.0.0.5
    DocumentRoot "C:\xampp\htdocs\SPool"
    ServerName www.spool.com
    ServerAlias www.spool
    DirectoryIndex index.php

    <Directory "C:\xampp\htdocs\SPool">
        Options All
        AllOwOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
## And add this in C:\xampp\apache\conf\extra\httpd-vhosts.conf

```
<VirtualHost 127.0.0.5:80>
    ServerAdmin 127.0.0.5
    DocumentRoot "C:\xampp\htdocs\SPool"
    ServerName www.spool.com
    ServerAlias www.spool
    DirectoryIndex index.php

    <Directory "C:\xampp\htdocs\SPool">
        Options All
        AllOwOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
