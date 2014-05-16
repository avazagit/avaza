#!/usr/bin/env bash
echo "~~~*****************************************~~~"
echo "--- INSTALL START ---"
echo "~~~*****************************************~~~"
sudo add-apt-repository -y ppa:ondrej/php5
sudo apt-get update
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
echo "~~~*****************************************~~~"
echo "--- BASE PACKAGES INSTALL ---"
echo "~~~*****************************************~~~"
sudo apt-get install -y vim curl python-software-properties
echo "~~~*****************************************~~~"
echo "--- NEWEST PHP VERSION AND PACKAGES ---"
echo "~~~*****************************************~~~"
sudo apt-get install -y php5 apache2 libapache2-mod-php5 php5-curl php5-gd php5-mcrypt mysql-server-5.5 php5-mysql git-core
echo "~~~*****************************************~~~"
echo "--- XDEBUG SETUP ---"
echo "~~~*****************************************~~~"
sudo apt-get install -y php5-xdebug
cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF
echo "~~~*****************************************~~~"
echo "--- MOD-REWRITE ENABLE ---"
echo "~~~*****************************************~~~"
sudo a2enmod rewrite
echo "~~~*****************************************~~~"
echo "--- ServerName SETTINGS ---"
echo "~~~*****************************************~~~"
echo "ServerName localhost" | sudo tee /etc/apache2/conf-available/servername.conf
sudo a2enconf servername
sudo service apache2 restart
sed -i "s/www.*/www/" /etc/apache2/sites-enabled/000-default.conf
echo "~~~*****************************************~~~"
echo "--- ERROR SETTINGS ---"
echo "~~~*****************************************~~~"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
echo "~~~*****************************************~~~"
echo "--- SETTING WEB FOLDER ---"
echo "~~~*****************************************~~~"
sudo rm -rf /var/www
sudo ln -fs /vagrant/public /var/www
echo "~~~*****************************************~~~"
echo "--- APACHE RESTART ---"
echo "~~~*****************************************~~~"
sudo service apache2 restart
echo "~~~*****************************************~~~"
echo "--- MYSQL SETUP ---"
echo "~~~*****************************************~~~"
mysql -u root -proot mysql -e "CREATE USER 'avaza'@'%' IDENTIFIED BY 'avaza';"
mysql -u root -proot mysql -e "CREATE USER 'avaza'@'localhost' IDENTIFIED BY 'avaza';"
mysql -u root -proot mysql -e "CREATE DATABASE avaza;"
mysql -u root -proot mysql -e "GRANT ALL PRIVILEGES ON  avaza.* TO 'avaza'@'%' WITH GRANT OPTION;"
mysql -u root -proot mysql -e "GRANT ALL PRIVILEGES ON  avaza.* TO 'avaza'@'localhost' WITH GRANT OPTION;"
echo "~~~*****************************************~~~"
echo "--- COMPOSER SETUP START ---"
echo "~~~*****************************************~~~"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
cd /vagrant
composer update
echo "~~~*****************************************~~~"
echo "--- SETUP COMPLETE ... SSH FOR CONNECTION ---"
echo "~~~*****************************************~~~"
