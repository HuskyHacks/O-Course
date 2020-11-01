# O-Course
A simple web application vulnerability lab made for the HackerOne Veterans day event

# Warning
**This is an intentionally vulnerable application! Do not host this on an internet facing server!**

# Setup

- `cd /opt`
- `sudo git clone https://github.com/HuskyHacks/O-Course`
- `sudo chmod 755 -R /opt/O-Course && cd O-Course && sudo python3 install.py`
- (Optional) Add a fake website name to /etc/hosts that directs the web browser to your new dockerized website! Please do take care that it's not a real website. This will make scanning, directory enumeration, and finding bugs feel more realistic!
- Browse to 172.17.0.1 OR your fake website name to launch the course!

# To Do

- [x] Install Script
- [x] Dockerized Application
- [x] XXE
- [x] XSS
- [x] SQLi
- [ / ] API Bruteforce/Info Disclosure
- [ / ] Frontend/CSS
- [ / ] Student Guide/Walkthrough
- [ ] Easter Egg/Dirbusting artifact

# Acknowledgements
This project was rapid prototyped to provide an engaging course in web application vulnerabilities.
Huge thank you to:
- HackerOne
- SnoopySecurity: https://github.com/snoopysecurity/dvws
- OWASP JuiceShop: https://github.com/bkimminich/juice-shop
- Learn-by-doing XSS lab: https://github.com/Learn-by-doing/xss
- https://github.com/bidyashish/php-api
- https://github.com/BrunoMendes41/simple-php-restful-api
