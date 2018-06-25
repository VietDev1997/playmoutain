# Tree folder
You should have a look at these files and folder in vagrant.laravel.example
```
Vagrantfile
provisioning/
```

# Install virtualbox
```
https://www.virtualbox.org/wiki/Downloads
```

# Install vagrant
```
https://www.vagrantup.com/downloads.html
```

# Install ansible
http://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html
If you install pip by easy_install then you get some errors. You can use the below command to install pip.
```
sudo bash -c "curl https://bootstrap.pypa.io/get-pip.py | python"
```

# Install vagrant plugin
You can run this command in anywhere
```
vagrant plugin install vagrant-vbguest
```

# Setup Vagrantfile and provisioning
project_folder is the place you want to put your source code.
Copy Vagrantfile và provisioning folder to project_folder
```
cp Vagrantfile project_folder
cp -r provisioning project_folder
```

# Customize Vagrantfile
In general, you don't need to customize anything in Vagrantfile in simple model vagrant box

## File Vagrantfile
```
Customize these lines that before them has # CUSTOMIZE HERE

#! VERY IMPORTANT: You should NOT config host port < 1024 because of a rule of linux
config.vm.network :forwarded_port, guest: 80, host: 8081
# CUSTOMIZE HERE
config.vm.network "private_network", ip: "192.168.77.100"
# CUSTOMIZE HERE
config.vm.provider :virtualbox do |v|
  v.name = "mycms"
  v.memory = 512
  v.cpus = 1
end
# CUSTOMIZE HERE
config.vm.hostname = "vagrant-box"
```

### Explain
```
8081 is host port. Change if you have a duplicated port. But you must change to a port >= 1024.

192.168.77.100 is ip that you access laravel app from host. Change if you have many vagrant box running that lead to duplicated ip.

v.name is virtualbox name. Change if you have duplicate virtualbox name.

vm.hostname is hostname of guest os in virtualbox. You can change it to project name but not required.

# Customize provisioning
You can customize these files. Note the lines below # CUSTOMIZE HERE
```

## File provisioning/roles/php/defautls/main.yml
```
# CUSTOMIZE HERE
php_composer_auto_update: false
php_composer_create_project: true
# CUSTOMIZE HERE
# php54, php56, php70, php71, php72
php_version: php72
# CUSTOMIZE HERE
php_packages:
  - php
  - php-cli
  - php-common
```

### Explain
```
php_composer_auto_update will allow vagrant provision to update your laravel lib using composer update.

php_composer_create_project will allow vagrant provision to create new laravel project. Enable it if
you want to work on a new project. Disable it if you are working a on-going project.
You just turn off php_composer_create_project for the first time to create new laravel project.
If you have a new laravel project, please turn off as soon as possible.

php_version: change it in (php54, php56, php70, php71, php72). This is php version that your app is required.

php_packages: this is the list php package that your app is required.
```

## File provisioning/roles/mysql/defautls/main.yml
```
# CUSTOMIZE HERE
mysql_root_password: "123"
# Databases.
mysql_databases:
#   - name: example
#     collation: utf8_general_ci
#     encoding: utf8
# CUSTOMIZE HERE
  - name: mycms


# Users.
mysql_users:
#   - name: example
#     host: 127.0.0.1
#     password: secret
#     priv: *.*:USAGE
# CUSTOMIZE HERE
  - name: mycms
    host: "%"
    password: mycms
    priv: "mycms.*:ALL"
```

### Explain
```
mysql_root_password is password of root
mysql_databases
  - name: dbname of app
mysql_users
  - name: username of app. Don't use root as your username of app
    host: "%" Don't change
    password: feel free to choose anything you want
    priv: "dbname.*:ALL"  use dbname you have set in mysql_databases.name
```

# How to start/stop box
```
(*) Run all command in project_folder
```

Start box
```
vagrant up
```
If you have changed in Vagrantfile
```
vagrant reload
```
If you have changed in provision folder
```
vagrant provision
```
Stop box
```
vagrant halt
```

# Access webapp
```
Get ip of webapp from private_network in Vagrantfile. In my example, it is 192.168.77.100 in Vagrantfile
http://192.168.77.100

Or if you want to share app for your co-worker. Use port-host. In my example, it is 8081 in Vagrantfile
http://<ip-host>:8081
```
