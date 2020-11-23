# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.define "wordpress" do |wordpress|
    wordpress.vm.box = "ubuntu/focal64"
    wordpress.vm.box_check_update = false
    wordpress.vm.hostname = "wordpress"
    wordpress.vm.provision "shell", path: "provision.sh"
    wordpress.vm.network "forwarded_port", guest: 80, host: 8080, id: "nginx"
    wordpress.vm.network "private_network", ip: "192.168.100.2", nic_type: "virtio", virtualbox__intnet: "keepcoding"
    wordpress.vm.synced_folder "./wordpress", "/var/www/wordpress"
    wordpress.trigger.before :destroy do |trigger|
      trigger.warn = "Haciendo respaldo de la Base de Datos de Wordpress"
      trigger.run_remote = {inline: "mysqldump --add-drop-table -u root wordpress > /vagrant/mariadb/wordpress_db.sql"}
    end
    wordpress.vm.provider "virtualbox" do |vb|
      vb.memory = "2048"
      vb.default_nic_type = "virtio"
    end
  end

  config.vm.define "elk" do |elk|
    elk.vm.box = "ubuntu/focal64"
    elk.vm.box_check_update = false
    elk.vm.hostname = "elk"
    elk.vm.network "private_network", ip: "192.168.100.3", nic_type: "virtio", virtualbox__intnet: "keepcoding"
    elk.vm.provider "virtualbox" do |vb|
      vb.memory = "512"
      vb.default_nic_type = "virtio"
    end
  end  
end
