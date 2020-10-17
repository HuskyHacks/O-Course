# O-Course
A simple web application vulnerability lab made for the HackerOne Veterans day event

# Setup

First, we need a few tools! We'll install a Dockerized XAMPP server to host the O-Course locally.

- cd /opt
- sudo git clone https://github.com/HuskyHacks/O-Course
- sudo chmod 755 -R O-course && cd O-Course && sudo sh docker4kali.sh
- docker build -t o-course .
- docker-compose up

(Optional) Add a fake website name to /etc/hosts that directs the web browser to your new docker XAMPP stack!
