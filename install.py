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
        print(Style.RESET_ALL)


def dockerInstallScript():
        os.chmod('install/docker4kali.sh', 0o755)
        sub.call("install/docker4kali.sh")
        time.sleep(4)
        print("\n")

def checkDocker():
        print(info+"Checking Docker...")
        print(Style.RESET_ALL)
        time.sleep(4)
#        result = sub.call("which docker", shell=True).decode(sys.stdout.encoding).strip()
#        dockerPath = "/docker"
#        if dockerPath in result:
#            print(good+"Docker is installed!")
#            print(Style.RESET_ALL)
#            time.sleep(4)
#        else:
#             print(error+"Docker is not installed :( Try rerunning the script.")
#             os.exit()

def checkCompose():
        print("\n")
        print(info+"Checking Docker-Compose...")
        time.sleep(4)
        print("\n")
#        p = sub.call("which docker-compose", shell=True)
#        result = p.communicater()[0]
#        print(result)
#        if "/docker" in result:
#            print(good+"Docker-Compose is installed!")
#            print(Style.RESET_ALL)
#            time.sleep(4)
#        else:
#            print(error+"Docker-compose is not installed :( Try rerunning the script.")
#            os.exit()

def allSystemsGo():
    print(good+"All systems go!\n")
    print(good+"Good Luck!\n")


def main():
    is_root()
    intro()
    setup()
    dockerInstallScript()
    checkDocker()
    checkCompose()
    allSystemsGo()
    exit()

if __name__ == "__main__":
    main()