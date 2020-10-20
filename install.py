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
    print("\nIn collaboration with HackerOne...\n")
    input("(Press Enter to continue...)")
    print("\nThe O-Course: An OWASP Top 10 Obstacle Course for Beginners\n")
    input("(Press Enter to begin setup...)")

def setup():
        print("\n")
        print (info+"Setting up your lab now...")
        print ("\n"+info+"Checking Docker and Docker-compose...")
        print(Style.RESET_ALL)

def dockerInstallScript():
        os.chmod('install/docker4kali.sh', 0o755)
        sub.call("install/docker4kali.sh")
        time.sleep(4)
        print("\n")

def composeInstallScript():
        os.chmod('install/compose4kali.sh', 0o755)
        sub.call("install/compose4kali.sh")
        time.sleep(4)
        print("\n")

def checkDocker():
        print(info+"Checking Docker...")
        print(Style.RESET_ALL)
        time.sleep(4)
        p = sub.Popen(['docker --version'], shell=True, stdin=PIPE, stdout=PIPE, stderr=PIPE)
        output, error = p.communicate()
        if p.returncode == 0:
            print(good+"Docker is installed!")
            print(Style.RESET_ALL)
        elif p.returncode > 0:
            print(info+"Docker is not installed. Running Install script!")
            print(Style.RESET_ALL)
            dockerInstallScript()
        else:
            print(error+"Some weird error...")
            sys.exit()

def checkCompose():
        print("\n")
        print(info+"Checking Docker-Compose...")
        time.sleep(4)
        print("\n")
        p = sub.Popen(['docker-compose --version'], shell=True, stdin=PIPE, stdout=PIPE, stderr=PIPE)
        output, error = p.communicate()
        if p.returncode == 0:
            print(good+"Docker-compose is installed!")
            print(Style.RESET_ALL)
        elif p.returncode > 0:
            print(info+"Docker-compose is not installed. Running Install script!")
            print(Style.RESET_ALL)
            composeInstallScript()
        else:
            print(error+"Some weird error...")
            sys.exit()

def allSystemsGo():
    print("\n")
    print(good+"All systems go!\n")
    print(good+"Good Luck!\n")
    print(Style.RESET_ALL)
    input("(Press Enter to launch your docker web app...)")

def launchDocker():
    sub.call(['cd /opt/O-Course/ && docker-compose up '], shell=True)

def main():
    is_root()
    intro()
    setup()
    checkDocker()
    checkCompose()
    allSystemsGo()
    launchDocker()
    exit()

if __name__ == "__main__":
    main()