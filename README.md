# O-Course
A simple web application vulnerability lab made for the HackerOne Veterans Day event

# Warning
**This is an intentionally vulnerable application! Do not host this on an internet facing server!**

## Requirements
### You need:
- A fresh install of the latest build of Kali Linux (https://www.kali.org/downloads/). I recommend using a VM for many reasons.

That's it! Everything else is built locally for you by running `install.py`.

### You might want:
- The latest update of Burp Suite (https://portswigger.net/burp/releases/professional-community-2020-9-2). Select 'Burp Suite Community Edition' and 'Linux (64-bit)' and download the update script.

I **strongly** recommend bringing a fresh install of the newest build of Kali Linux to build this lab. A fresh install of Kali is the only thing required to run this lab: everything else is installed and configured when you run `install.py`.

In theory, this lab will work on any build of Kali with Docker installed, but I have built and proven every facet of the lab on a fresh install of Kali 2020.3. If you use Kali 2020.3, I **guarantee** that the lab will work exactly as intended!

## Setup (5 mins)
On a fresh install of Kali Linux:

- `cd /opt`
- `sudo git clone https://github.com/HuskyHacks/O-Course`
- `sudo chmod 755 -R /opt/O-Course && cd O-Course && sudo python3 install.py`
- Follow the script's prompts (hit enter a few times) until it is done. The final part of the script launches the docker web app.
- Browse to 172.17.0.1 to launch the course!

## To Do

- [x] Install Script
- [x] Dockerized Application
- [x] XXE
- [x] XSS
- [x] SQLi
- [x] API Bruteforce/Info Disclosure
- [x] Easter Egg/Dirbusting artifact
- [ / ] Frontend/CSS
- [ / ] Student Guide/Walkthrough
- [ / ] Hints


## Acknowledgements
This project was rapid prototyped to provide an engaging course in web application vulnerabilities.
Huge thank you to:
- HackerOne
- SnoopySecurity: https://github.com/snoopysecurity/dvws
- OWASP JuiceShop: https://github.com/bkimminich/juice-shop
- Learn-by-doing XSS lab: https://github.com/Learn-by-doing/xss
- https://github.com/bidyashish/php-api
- https://github.com/BrunoMendes41/simple-php-restful-api
- https://medium.com/@shashanksrivastava/create-a-rest-api-using-php-mysql-60ba1ad918d2
- OS Templates for the website template and CSS! https://www.os-templates.com/
