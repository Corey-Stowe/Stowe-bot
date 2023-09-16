#!/bin/bash
echo "Stowe bot setup Ubuntu"
echo "This Bot use PHP 7.4 with Apcahe2 + MySQL"
sleep 5
echo "Installing dependencies..."
sleep 2
sudo apt update
sudo apt install apache2 mysql-server php7.4 php7.4-mysql php7.4-cli php7.4-curl php7.4-gd php7.4-json php7.4-mbstring php7.4-intl php7.4-xml php7.4-zip
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php7.4 php7.4-mysql php7.4-cli php7.4-curl php7.4-gd php7.4-json php7.4-mbstring php7.4-intl php7.4-xml php7.4-zip
sudo systemctl start apache2
sudo systemctl start mysql
sudo systemctl enable apache2
sudo systemctl enable mysql
sudo apt install zip unzip
echo "Dependencies installed"
sleep 2
sudo apt update
sudo apt install apache2
sudo a2enmod ssl
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/apache-selfsigned.key -out /etc/ssl/certs/apache-selfsigned.crt
echo "SSL for HTTPS installed Now you need config yourself in vitrual host to start "
echo "The file located in /etc/apache2/sites-available/apicrf.conf"
sleep 2
sudo nano /etc/apache2/sites-available/apicrf.conf
sudo a2ensite apicrf
sudo systemctl restart apache2
sudo ufw allow 443/tcp
echo "Now the dir to enter the bot files is /var/www/html"
echo "set webhook https://api.telegram.org/bot{my_bot_token}/setWebhook?url={url_to_send_updates_to}"
echo "now configure the bot in the config.php file"
sleep 6
echo "setup finished"


