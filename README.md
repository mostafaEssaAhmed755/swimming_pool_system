# Swmming Pool System
## first of all
```
composer install
npm install
php artisan cach:clear
php artisan key:generate
```
## Don't forget to 
- add this in C:\xampp\apache\conf\extra\httpd-vhosts.conf
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
- And add this in C:\Windows\System32\drivers\etc\hosts

```
127.0.0.1 127.0.0.5
```
## finaly run project

```
127.0.0.5
```

