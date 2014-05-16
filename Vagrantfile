VAGRANTFILE_API_VERSION = "2"
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "trusty64"
    config.vm.box_url = "https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"
    config.vm.network :forwarded_port, guest: 80, host: 8080
    config.vm.provision :shell, :path => "provision/install.sh"
    config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]
end
