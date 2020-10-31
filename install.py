#! #!/usr/bin/env python3
###############################################################################
#                                                                             #
#                     HuskyHacks | HackerOne | The O-Course                   #
#                                                                             #
###############################################################################
import colorama
from colorama import Fore, Style
import time
import threading
import sys
import subprocess as sub
from subprocess import Popen, PIPE
import os
import argparse



logo = ("""\
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@#*****(/****/@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@#***&@/,,,,,,,,%@#***@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@&**#(,,,,,,,,,,,,*,,,,,@**/@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@(**/,,,,,,,,,,,,,,,,,,**,,,,/**@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@%**,,,,,,,,,,,,#&@@%*,,,,,,***,,***@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@/**,***,,,,(@/*********/@@,,,,****,**%@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@*******,,,/*,*************,,/#,,,******#@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@******,,,,,,******************,,,,,******(@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@******,,,,,**&@@@@@****(@@@@@&***,,,,******%@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@(*****,,,,/@@@@@@@@@@***@@@@@@@@@@**,,,******@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@*****,,,/@@@@*****%@****/@#****/@@@@/,,,*****/@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@(***,,,,@@@@@@@@@@@***(&(***@@@@@@@@@@@*,,,****@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@***,,,,@&&@@@@@@@%@@@@@@@@@@@#@@@@@@@#&@*,,,***%@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@#**,,,,***@@@@@@@@@@@@@@@@@@@@@@@@@@@@%***,,,****@@@@@@@@@@@@@@@@@
@@@@@@@@@@&****,,,,***/@@@#@@@@@@/*****(@@@@@@%@@@/***,,,******@@@@@@@@@@@@@@@
@@@@@@@@@*******,,,,***@@@@(@@@@@******/@@@@@%@@@%***,,,,*******/@@@@@@@@@@@@@
@@@@@@@@&********,,,****@@@@@*&@@@@#*%@@@@%*@@@@%****,,,*********@@@@@@@@@@@@@
@@@@@@@@@@(********,,****#@@@@&***********@@@@@/****,,,********@@@@@@@@@@@@@@@
@@@@@@@@@@@@%*******,,*****&@(@(*********#@/@%*****,,*******/@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@/******,**,****#@(*******#@/****,**********&@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@/******,,*****@@****/@@*****,,*******&@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@#*****,,*****@@&@&*****,,*****(@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@/***,,***********,,***/@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@/**,,*****,,**/@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@%/,,,/&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    """)

h1logo = ("""\
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@          @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@              @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@*      *      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@      @@@@@@@@@@@@      @@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*.#@@@@@@@@@@@@@@@,,%@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    """)

logotext = ("""\
              A
    __  __           __         __  __           __
   / / / /_  _______/ /____  __/ / / /___ ______/ /_______
  / /_/ / / / / ___/ //_/ / / / /_/ / __ `/ ___/ //_/ ___/
 / __  / /_/ (__  ) ,< / /_/ / __  / /_/ / /__/ ,< (__  )
/_/ /_/\__,_/____/_/|_|\__, /_/ /_/\__,_/\___/_/|_/____/
                      /____/

                                    Production...
                      """)

h1logotext = ("""\
In collaboration with...

  _  _         _            ___
 | || |__ _ __| |_____ _ _ / _ \ _ _  ___
 | __ / _` / _| / / -_) '_| (_) | ' \/ -_)
 |_||_\__,_\__|_\_\___|_|  \___/|_||_\___|


                      """)

ocourseText = ("""\

        The
   ___       ___
  / _ \ ___ / __|___ _  _ _ _ ___ ___
 | (_) |___| (__/ _ \ || | '_(_-</ -_)
  \___/     \___\___/\_,_|_| /__/\___|

            An OWASP Top 10 Obstacle Course for Beginners"
                      """)




info = (Fore.BLUE + "[*] ")
good = (Fore.GREEN + "[+] ")
error = (Fore.RED + "[X] ")

def is_root():
    if os.geteuid() == 0:
        return 0
    else:
        print(info+"You need to run the install script as root! Usage: sudo python3 install.py")
        exit()

def intro():
    print(logo)
    print(logotext)
    input("(Press Enter to continue...)")
    print(h1logo)
    print(h1logotext)
    input("(Press Enter to continue...)")

    print(ocourseText)
    input("(Press Enter to begin setup...)")
    print("\n")
    print (info+"Setting up your lab now...")
    time.sleep(2)
    print ("\n"+info+"Checking Docker and Docker-compose...")
    time.sleep(2)
    print(Style.RESET_ALL)

def dockerInstallScript():
        os.chmod('scripts4Install/docker4kali.sh', 0o755)
        sub.call("scripts4Install/docker4kali.sh")
        time.sleep(2)
        print("\n")

def composeInstallScript():
        os.chmod('scripts4Install/compose4kali.sh', 0o755)
        sub.call("scripts4Install/compose4kali.sh")
        time.sleep(2)
        print("\n")

def checkDocker():
        print(info+"Checking Docker...")
        print(Style.RESET_ALL)
        time.sleep(2)
        p = sub.Popen(['docker --version'], shell=True, stdin=PIPE, stdout=PIPE, stderr=PIPE)
        output, error = p.communicate()
        if p.returncode == 0:
            print(good+"Docker is installed!")
            print(Style.RESET_ALL)
            time.sleep(2)
        elif p.returncode > 0:
            print(info+"Docker is not installed. Running Install script!")
            print(Style.RESET_ALL)
            time.sleep(2)
            dockerInstallScript()
        else:
            print(error+"Some weird error...")
            sys.exit()

def checkCompose():
        print(info+"Checking Docker-Compose...\n")
        time.sleep(2)
        p = sub.Popen(['docker-compose --version'], shell=True, stdin=PIPE, stdout=PIPE, stderr=PIPE)
        output, error = p.communicate()
        if p.returncode == 0:
            print(good+"Docker-compose is installed!")
            time.sleep(2)
            print(Style.RESET_ALL)
        elif p.returncode > 0:
            print(info+"Docker-compose is not installed. Running Install script!")
            time.sleep(2)
            print(Style.RESET_ALL)
            composeInstallScript()
        else:
            print(error+"Some weird error...")
            sys.exit()

def updateBurpMsg():
    print(info+"Kali 2020.3 comes pre-installed with Burpsuite Community Edition...\n")
    time.sleep(2)
    print(info+"But I recommend updating to the newest version! Among other things, it has the embedded proxy enabled browser -chef's kiss-\n")
    time.sleep(2)
    print(info+"Visit https://portswigger.net/burp/releases/professional-community-2020-9-2\ to download it!\n")
    time.sleep(2)

def allSystemsGo():
    print(good+"All systems go!\n")
    time.sleep(2)
    print(good+"Good Luck, recruit!\n")
    print(Style.RESET_ALL)
    time.sleep(1)
    input("(Press Enter to launch your docker web app...)")

def launchDocker():
    sub.call(['docker-compose up'], shell=True)

def main():
    is_root()
    intro()
    checkDocker()
    checkCompose()
    updateBurpMsg()
    allSystemsGo()
    launchDocker()
    exit()

if __name__ == "__main__":
    main()