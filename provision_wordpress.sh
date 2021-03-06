#!/usr/bin/env bash

echo "Haciendo Update & Upgrade del Ubuntu"
sudo apt-get update > /dev/null 2>&1
sudo apt-get upgrade -y > /dev/null 2>&1

echo "Instalando Componentes (Nginx, MariaDB, PHP)"
sudo apt-get install -y nginx mariadb-server mariadb-client php-fpm php-mysql > /dev/null 2>&1

echo "Creando la Base de Datos para Wordpress"
sudo mariadb -u root -e "CREATE DATABASE IF NOT EXISTS wordpress;"
sudo mariadb -u root -e "CREATE USER wordpress IDENTIFIED BY 'wordpress';"
sudo mariadb -u root -e "GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER ON wordpress.* TO wordpress;"
sudo mariadb -u root -e "FLUSH PRIVILEGES;"

if [[ -f "/vagrant/mariadb/wordpress_db.sql" ]];
then
    echo "Importando la información a la Base de Datos"
    mysql -u root wordpress < /vagrant/mariadb/wordpress_db.sql
fi

echo "Copiando el fichero de configuración del site y generando el symlink"
cp /vagrant/nginx/wordpress /etc/nginx/sites-available/
sudo rm /etc/nginx/sites-enabled/default
sudo ln -s /etc/nginx/sites-available/wordpress /etc/nginx/sites-enabled/wordpress

echo "Reiniciando Nginx"
sudo systemctl restart nginx

wget -qO - https://artifacts.elastic.co/GPG-KEY-elasticsearch | sudo apt-key add -
sudo apt-get install -y apt-transport-https
echo "deb https://artifacts.elastic.co/packages/7.x/apt stable main" | sudo tee -a /etc/apt/sources.list.d/elastic-7.x.list
sudo apt-get update
sudo apt-get install -y filebeat
# sudo systemctl enable filebeat
sudo filebeat modules enable nginx # system mysql
sudo cp /vagrant/filebeat/filebeat.yml /etc/filebeat/filebeat.yml
# sudo cp /vagrant/filebeat/nginx.yml /etc/filebeat/modules.d/nginx.yml
sudo systemctl start filebeat
sudo systemctl enable filebeat