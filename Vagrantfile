# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.box = "bento/centos-7.4"
  # CUSTOMIZE HERE
  #! VERY IMPORTANT: You should NOT config host port < 1024 because of a rule of linux
  config.vm.network :forwarded_port, guest: 80, host: 8081
  # CUSTOMIZE HERE
  config.vm.network "private_network", ip: "192.168.77.100"
  # CUSTOMIZE HERE
  config.vm.provider :virtualbox do |v|
    v.name = "playmountainphp"
    v.memory = 512
    v.cpus = 1
  end
  # CUSTOMIZE HERE
  config.vm.hostname = "vagrant-box"

  config.vbguest.auto_update = false
  config.vbguest.no_remote = true

  # Don't try to use a different synced_folder
  config.vm.synced_folder './', '/vagrant',
    owner: "vagrant",
    group: "vagrant",
    mount_options: ["dmode=775,fmode=664"]

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "provisioning/playbook.yml"
    ansible.host_key_checking = false
    ansible.become = true
    ansible.become_user = "root"
  end
end
