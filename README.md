# O-Course
A simple web application vulnerability lab made for the HackerOne Veterans day event

# Setup

- cd /opt
- sudo git clone https://github.com/HuskyHacks/O-Course
- sudo chmod 755 -R /opt/O-Course && cd O-Course && sudo python3 install.py
- (Optional) Add a fake website name to /etc/hosts that directs the web browser to your new docker XAMPP stack! Please do take care that it's not a real website. This will make scanning, directory enumeration, and finding bugs feel more realistic!
- Browse to 172.17.0.1 OR your fake website name to launch the course!

# To Do

- [x] Install Script
- [x] Dockerized Application
- [x] XXE
- [ ] SQLi
- [ ] API Bruteforce/Info Disclosure
- [ ] Frontend/CSS
- [ ] Student Guide/Walkthrough


# Acknowledgements
This project was rapid prototyped to provide an engaging course in web application vulnerabilities.
Huge thank you to:
- HackerOne
- SnoopySecurity: https://github.com/snoopysecurity/dvws
- OWASP JuiceShope: https://github.com/bkimminich/juice-shop
