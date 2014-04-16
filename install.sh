#!/usr/bin/env bash

echo "--- INSTALL START ---"
sudo apt-get update

echo "--- MYSQL SETUP ---"
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

echo "--- BASE PACKAGES INSTALL ---"
sudo apt-get install -y vim curl python-software-properties

echo "--- NEWEST PHP INSTALL ---"
sudo add-apt-repository -y ppa:ondrej/php5
sudo apt-get update

echo "--- PHP PACKAGES ---"
sudo apt-get install -y php5 apache2 libapache2-mod-php5 php5-curl php5-gd php5-mcrypt mysql-server-5.5 php5-mysql git-core

echo "--- XDEBUG SETUP ---"
sudo apt-get install -y php5-xdebug

cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

echo "--- MOD-REWRITE ENABLE ---"
sudo a2enmod rewrite

echo "--- ServerName SETTINGS ---"
sed -i "s/www.*/www/" /etc/apache2/sites-enabled/000-default.conf
sed -i "s/# Global configuration/ServerName localhost/" /etc/apache2/apache2.conf

echo "--- ERROR SETTINGS ---"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

echo "--- SETTING WEB FOLDER ---"
sudo rm -rf /var/www
sudo ln -fs /vagrant/public /var/www

echo "--- APACHE RESTART ---"
sudo service apache2 restart

echo "--- COMPOSER SETUP START ---"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

echo "--- CREATE DATABASE ---"
mysql -uroot -p'root' -e "create database avaza;drop database test;"

echo "--- FINAL UPDATES ---"
cd /vagrant
composer update
echo "--- SETUP COMPLETE ... SSH FOR CONNECTION ---"
