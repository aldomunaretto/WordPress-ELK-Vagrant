#!/usr/bin/env bash

echo "Haciendo Update & Upgrade del Ubuntu"
sudo apt-get update > /dev/null 2>&1
sudo apt-get upgrade -y > /dev/null 2>&1

echo "Instalando Componentes (Java11)"
sudo apt-get install -y openjdk-11-jdk > /dev/null 2>&1

echo "Descargando repositorio ElasticSeach"
wget -qO - https://artifacts.elastic.co/GPG-KEY-elasticsearch | sudo apt-key add -
echo "deb https://artifacts.elastic.co/packages/7.x/apt stable main" | sudo tee -a /etc/apt/sources.list.d/elastic-7.x.list

echo "Haciendo Update del Ubuntu nuevamente"
sudo apt-get update > /dev/null 2>&1

echo "Instalando Componentes (ElasticSearch, Logstash, Kibana)"
sudo apt-get install -y elasticsearch kibana logstash  > /dev/null 2>&1

sudo cp /vagrant/elasticsearch/elasticsearch.yml /etc/elasticsearch/elasticsearch.yml
sudo systemctl start elasticsearch > /dev/null 2>&1

sudo cp /vagrant/kibana/kibana.yml /etc/kibana/kibana.yml
sudo systemctl start kibana > /dev/null 2>&1

sudo cp /vagrant/logstash/*.conf /etc/logstash/conf.d/
sudo systemctl start logstash > /dev/null 2>&1

sudo systemctl enable elasticsearch > /dev/null 2>&1
sudo systemctl enable logstash > /dev/null 2>&1
sudo systemctl enable kibana > /dev/null 2>&1
sudo systemctl daemon-reload > /dev/null 2>&1