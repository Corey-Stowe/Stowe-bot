#!/bin/bash
echo "Stowe bot setup Ubuntu"
echo "This Bot use PHP 7.4 with Apcahe2 + MySQL"
sleep 5
echo "Installing dependencies..."
sleep 2
sudo apt update
sudo apt install apache2 mysql-server php7.4 php7.4-mysql php7.4-cli php7.4-curl php7.4-gd php7.4-json php7.4-mbstring php7.4-intl php7.4-xml php7.4-zip
sudo systemctl start apache2
sudo systemctl start mysql
sudo systemctl enable apache2
sudo systemctl enable mysql
sudo apt install zip unzip
echo "Dependencies installed"
sleep 2
echo "Now the dir to enter the bot files is /var/www/html"
echo "set webhook https://api.telegram.org/bot{my_bot_token}/setWebhook?url={url_to_send_updates_to}"
echo "now configure the bot in the config.php file"
sleep 6
echo "setup finished"

