#!/usr/bin/env
#Get Information to create Database
read -e -p "Create User with username: " -i $username
read -e -s -p "Password for new User: " -i $password
read -e -p "Create Database name: " -i $database

#mysql commands create user and database using input data
mysql -u root -proot mysql -e "CREATE USER '$username'@'localhost' IDENTIFIED BY  '$password';"                                                                                                                                                                          
mysql -u root -proot mysql -e "CREATE DATABASE $database;"                                                                                                                                                                                                             
mysql -u root -proot mysql -e "GRANT ALL PRIVILEGES ON  $database.* TO $username@localhost;"

#check success or failure and output result
if [ $? != "0" ]; then
 echo "[Error]: Database creation failed"
 exit 1
else
 echo "----------------------------------------------"
 echo " MySQL Database has been created successfully "
 echo "----------------------------------------------"
 echo ""
 echo " DB Name: $database"
 echo " DB User: $username"
 echo " DB Pass: $password"
 echo ""
 echo "----------------------------------------------"
fi