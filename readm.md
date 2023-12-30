apt update && apt upgrade
apt install apache2
systemctl status apache2
apt install mariadb-server mariadb-client
mysql_secure_installation
apt install wget
apt -y install php php-cgi php-mysqli php-pear php-mbstring libapache2-mod-php php-common php-phpseclib php-mysql
wget -P Downloads https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.tar.gz
wget -P Downloads https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-english.tar.gz
wget -P Downloads https://files.phpmyadmin.net/phpmyadmin.keyring
cd Downloads
gpg --import phpmyadmin.keyring
wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.tar.gz.asc
gpg --verify phpMyAdmin-latest-all-languages.tar.gz.asc
mkdir /var/www/html/phpMyAdmin
tar xvf phpMyAdmin-latest-all-languages.tar.gz --strip-components=1 -C /var/www/html/phpMyAdmin
cp /var/www/html/phpMyAdmin/config.sample.inc.php /var/www/html/phpMyAdmin/config.inc.php
vi /var/www/html/phpMyAdmin/config.inc.php
    $cfg['blowfish_secret'] = '';
chmod 660 /var/www/html/phpMyAdmin/config.inc.php
chown -R www-data:www-data /var/www/html/phpMyAdmin
systemctl restart apache2