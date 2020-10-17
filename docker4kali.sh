#! /bin/bash
export DEBIAN_FRONTEND=”noninteractive”
sudo apt-get update
sudo apt-get remove docker docker-engine docker.io* lxc-docker*
sudo apt-get install apt-transport-https ca-certificates curl gnupg2 software-properties-common
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
echo deb [arch=amd64] https://download.docker.com/linux/debian stretch stable >> /etc/apt/sources.list
sudo apt-get update
sudo apt-get install docker-ce
