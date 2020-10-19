# O-Course
A simple web application vulnerability lab made for the HackerOne Veterans day event

# Setup

First, we need a few tools!

- cd /opt
- sudo git clone https://github.com/HuskyHacks/O-Course
- sudo chmod 755 -R /opt/O-Course && cd O-Course && sudo sh docker4kali.sh
- sudo docker build -t o-course .
- sudo docker-compose up
- (Optional) Add a fake website name to /etc/hosts that directs the web browser to your new docker XAMPP stack! Please do take care that it's not a real website. This will make scanning, directory enumeration, and finding bugs feel more fun!


