#! /bin/bash
export DEBIAN_FRONTEND=”noninteractive”
sudo apt-get -y update
sudo apt-get -y remove docker docker-engine docker.io* lxc-docker*
sudo apt-get -y install apt-transport-https ca-certificates curl gnupg2 software-properties-common
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
echo deb [arch=amd64] https://download.docker.com/linux/debian stretch stable >> /etc/apt/sources.list
sudo apt-get update
sudo apt-get -y install docker-ce
sudo curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
