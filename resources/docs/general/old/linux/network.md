# Network

## Setting/changing the hostname
The hostname command allows you to directly query, or set, the hostname from the command line.

You can see your current hostname by running hostname. To set the hostname directly you can run hostname newname as root. If you do this however, make sure you change the /etc/hosts file first. This is needed because otherwise you will need to boot into single user mode and change your hostname in /etc/hosts. This is because sudo requires DNS lookups in certain cases and it cannot resolve your newly set hostname.. To circumvent this you need to add the new name to the hosts file prior to setting the hostname and remove it once that action has succeeded.


sudo vi /etc/hosts

127.0.1.1 ubuntu newname
Set the hostname to newname.

```bash
sudo hostname newname
# or
echo newname | sudo tee /etc/hostname
```
Now you can remove the old hostname

```bash
sudo vi /etc/hosts
```
```
127.0.1.1 newname
```
When your system boots it will automatically read the hostname from the file /etc/hostname. You can add hostname and IP addresses to the file /etc/hosts for static lookups.

Finding your network interface
When setting up your network you will need to know the network interface cards on your computer. The interface name of cards for different vendors may be different, which is why this step is needed.

```bash
ls /sys/class/net
# or
ip addr
```
This will list the interface names for all NICs on your computer. It will probably include eth0 (hardwired NIC), lo (loopback interface for the localhost), and something for your wireless card (like wifi0, or wlan0).

Disable network managers and/or wicd
Configuring your network via the CLI will likely interfere with Network Manager or wicd. To counter this, disable the startup script of either application or completely remove the packages. Be aware that the rest of this guide will require packages which need to be installed from the online repositories.

```bash
## Network manager
# Stop the current process
sudo /etc/init.d/NetworkManager stop
# Start: sudo /etc/init.d/NetworkManager start

# The inofficial way:
sudo chmod -x /etc/init.d/NetworkManager
# Reverse: sudo chmod +x /etc/init.d/NetworkManager
# The official way:
sudo update-rc.d -f NetworkManager remove
# Reverse: sudo update-rc.d -f NetworkManager defaults 50

# Or remove the network manager package.
sudo aptitude purge network-manager
# Reverse: sudo aptitude install network-manager

## wicd
# Stop the current process
sudo /etc/init.d/wicd stop
# Start: sudo /etc/init.d/wicd start

# The inofficial way:
sudo chmod -x /etc/init.d/wicd
# Reverse: sudo chmod +x /etc/init.d/wicd

# The official way:
sudo update-rc.d -f wicd remove
# Reverse: sudo update-rc.d -f wicd defaults 20

# Or remove the wicd package.
sudo aptitude purge network-manager
# Reverse: sudo aptitude install network-manager
Note: At some point Ubuntu started using upstart instead of the /sbin/init/ daemon. Thus if the first command above does not stop Network Manager, try this.


sudo stop network-manager
```

## Configuring an interface
Word of wisdom
We will use eth0 in this example, your interface can be named differently, see Finding your network interface.

If you have disabled the either wicd or the network manager you probably don't have a network connection anymore. Connect via a regular UTP cable to your router, and assuming you have DHCP enabled do the following:

```bash
sudo ip link set dev eth0 down
sudo dhclient eth0
This will bring your eth0 up by using DHCP. Your network is now configured (for the time being).

If you don't have DHCP enabled configure your network by issueing the commands below, the gateway address is the IP address of your router. And your IP should be in the same range as the router is.


sudo ip addr add 192.168.1.14/24 dev eth0
sudo ip link set dev eth0 up
sudo ip route add default via 192.168.1.1
These commands configure your interface but these changes will not survive a reboot, since the information is not stored anyhwere. This is where the interfaces file comes in handy. To configure a interface permanently you'll need to edit the interfaces file, /etc/network/interfaces.

sudo vi /etc/network/interfaces

## To configure a dynamic IP address
auto eth0
iface eth0 inet dhcp

## Or configure a static IP
auto eth0
iface eth0 inet static
  address 192.168.1.14
  gateway 192.168.1.1
  netmask 255.255.255.0
  network 192.168.1.0
  broadcast 192.168.1.255
For these settings to take effect you need to restart your networking services.

sudo /etc/init.d/networking restart
Setting up a second IP address or Virtual IP address
If you need to set up a second ip address you need to edit the /etc/network/interfaces.


sudo vi /etc/network/interfaces

auto eth0:1
iface eth0:1 inet static
  address 192.168.1.24
  netmask 255.255.255.0
  network 192.168.1.1
  broadcast 192.168.1.255
  gateway 192.168.1.1
For these new settings to take effect you need to restart networking services using the following command

sudo /etc/init.d/networking restart
Howto set MTU for a connection
You can set the MTU for an interface, you could do this by using the mtu keyword in the interface file or by using the ip link command.


iface eth0 inet dhcp
  # via mtu keyword
  mtu 1492
  # Via ip link command
  pre-up /sbin/ip link set $IFACE mtu 1492
The above example sets the MTU for device eth0 to 1492, the usual MTU for a PPPoE ISP connection. This however is only needed if connections seem to hang otherwise (with the default of 1500).

This tip was found on http://glasnost.beeznest.org/articles/290.

Setting up DNS
To cause your machine to consult with a particular server for name lookups you simply add their addresses to /etc/resolv.conf.

For example a machine which should perform lookups from the DNS server at IP address 192.168.1.1 would have a resolv.conf file looking like this

sudo vi /etc/resolv.conf
enter the following details


search example.com
domain example.com
nameserver 192.168.1.1
Wireless
We will not use un-encrypted wireless connections, but will make use of WEP/WPA/WPA2. Deviations from security/encryption method is an exercise left for the user. We also assume the network SSID is being broadcast.

Enabling wireless networking on your PC is pretty straight forward. If your network card is supported out of the box, then there are very little issues. If your card is not supported out of the box, you may need to use ndiswrapper, which will require the Windows drivers fo your card.

ndiswrapper
* Install a Windows driver with ndiswrapper for Dapper or ndiswrapper for 8.04 and up


# Ubuntu 6.06 (Dapper) and earlier
sudo aptitude install ndiswrapper-utils
# Ubuntu 8.04 and up (Hardy/Intrepid/Jaunty/Karmic)
sudo aptitude install ndiswrapper-utils-1.9

# All versions
sudo ndiswrapper -i /path/to/windows/driver.inf
sudo ndiswrapper -m
More information about ndiswrapper
https://help.ubuntu.com/community/WifiDocs/Driver/Ndiswrapper


ndiswrapper --help
man ndiswrapper
Configure your wireless interface
In the examples I will use wlan0 as your wireless card, this could be different on your machine! I will do the examples with a dynamic IP address (DHCP), the same principles applies to staticly configured IP's.

Open the interfaces file

sudo vi /etc/network/interfaces

auto wlan0
iface wlan0 inet dhcp
pre-up  /etc/init.d/wpa.sh start
post-down /etc/init.d/wpa.sh stop
The pre-up command is run before the interface goes up. The post-down command is run after the interface goes down. There are also post-up and pre-down commands. E.g. You could use post-up to mount disks after an interface goes up. In this case we start wpa_supplicant before we enable the interface and we stop wpa_supplicant after we bring the interface down.

WPA supplicant
Before you start
(i) Before proceeding any further, it might be worthwhile to check whether your Wi-Fi Card is supported. Please see the wpa_supplicant website for more details. This will save you lots of time and frustration.

Install wpa_supplicant

sudo aptitude install wpasupplicant
Creating the password

You probably have given your wireless network a name (the ESSID or SSID), in this example we will use ubuntuwifi for our wireless network, our password will be OpenSesame. The SSID and password needs to be configured on your wireless router, how to do that is up to the reader. If you have problems coming up with a password, please have a look here.

If you are using WEP encryption (which is not advised) you may skip this step.


$ wpa_passphrase ubuntuwifi OpenSesame

network={
        ssid="ubuntuwifi"
        #psk="OpenSesame"
        psk=24f87a7583001eb7cea2394bbdb04eb2d3641f0b907dd31bd286be628c1841f8
}
Adding your network

Open the /etc/wpa_supplicant file and define your network.


sudo vi /etc/wpa_supplicant.conf

#
#  Please see /usr/share/doc/wpasupplicant/wpa_supplicant.conf.gz
#  for more complete configuration parameters.
#
ctrl_interface=/var/run/wpa_supplicant
ctrl_interface_group=0

eapol_version=2
ap_scan=1
fast_reauth=1
country=NL

### Associate with any open access point
###  Scans/ESSID changes can be done with wpa_cli
network={
  ssid=""
  key_mgmt=NONE
  priority=1
}

# WEP
network={
  ssid="ubuntuwifi"
  scan_ssid=1
  key_mgmt=NONE
  wep_key0="OpenSesame"
  wep_key1="OpenOtherSesame"
  # Use the correct key..
  wep_tx_keyidx=0
  priority=5
}

# WPA/WPA2
network={
  ssid="ubuntuwifi"
  scan_ssid=1
  psk=24f87a7583001eb7cea2394bbdb04eb2d3641f0b907dd31bd286be628c1841f8
  priority=5
  ## The configuration items listed below do not need to be set, the defaults are
  ## pretty 'let us do it for you'.
  ## See /usr/share/doc/wpasupplicant/wpa_supplicant.conf.gz for more information.
  # key_mgmt=WPA-PSK
  # proto=WPA RSN
  # pairwise=CCMP TKIP
  # group=CCMP TKIP
}
Please beware, if you use WPA, remove the WEP section and vice versa.

The priority in this file determines to which network you will connect if more then 2 configured networks are available. This will always be the network with the highest priority.

WPA start script

Create the WPA startup script /etc/init.d/wpa.sh


sudo vi /etc/init.d/wpa.sh

#!/bin/bash
### BEGIN INIT INFO
# Provides:          wpa
# Required-Start:    $network $syslog $local_fs
# Required-Stop:     $network $syslog $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: Start/stop script for wpa supplicant
# Description:       Custom start/stop script for wpa_supplicant.
### END INIT INFO

SELF=`basename $0`
WPA=wpa_supplicant
PROGRAM=/sbin/${WPA}
CONF=/etc/${WPA}.conf
INTERFACE=wlan0
DRIVER=wext
DAEMONMODE="-B"
LOGFILE=/var/log/$WPA.log

function start() {

    # TODO: Support multiple interfaces and drivers
    OPTIONS="-c $CONF -i $INTERFACE -D $DRIVER $DAEMONMODE"

    ## You can remove this if you are running 8.10 and up.
    # Ubuntu 8.10 and up doesn't need the -w anymore..
    # And the logfile option is not valid on 8.04 and lower
    local ver=$(lsb_release -sr | sed -e 's/\.//g');
    [ $ver -lt 810 ] && OPTIONS="$OPTIONS -w" && LOGFILE=""
    ##

    # Log to a file
    [ -n "$LOGFILE" ] && OPTIONS="$OPTIONS -f $LOGFILE"

    echo " * Starting wpa supplicant"
    eval $PROGRAM $OPTIONS
}

function stop() {
    echo " * Stopping wpa supplicant"
    wpa_cli -i $INTERFACE terminate
    #pkill $PROGRAM ## alternative method
}

function debug() {
    stop
    DAEMONMODE="-ddd"
    start
}

function restart() {
    stop
    start
}

function status() {
    pgrep -lf $PROGRAM
}

function usage() {
    echo "Usage: $SELF <start|stop|status|debug>"
    return 2
}

case $1 in
    start|stop|debug|restart|status) $1 ;;
    *) usage ;;
esac
Make the start script executable.


sudo chmod +x /etc/init.d/wpa.sh
You can now start WPA supplicant as a service or in debugging mode:


# Service
/etc/init.d/wpa.sh start
# Debugging
/etc/init.d/wpa.sh debug
Make sure the script gets run on boot and stopped at shutdown


sudo update-rc.d wpa.sh defaults
With wpa_cli you can make changes to your wpa_supplicant config file and reload these changes:

sudo wpa_cli
Enter help to see what you can do with wpa_cli. Some of the options are: reconfigure, disconnect, reconnect, reassociate. These options speak for themself.

For more information about wpa_supplicant, please have a look at their respective manpages:


man wpa_supplicant
man wpa_supplicant.conf
man wpa_cli
man wpa_gui # Only when you have installed the wpagui package
gzip -dc /usr/share/doc/wpasupplicant/wpa_supplicant.conf.gz | less
Now that you have setup everything, you can try to connect to your network by restarting networking


sudo /etc/init.d/networking restart
You could also reboot your machine if you prefer that.

Configure laptops for multiple locations
When you have a laptop you don't want to configure it to only be able to have a internet connection at only one location. You probably go to work and use a wired connection, you goto to coffeeshop and use the wifi hotspot overthere and at home you have another network configuration. That is exactly what we are going to configure now.

Guessnet, ifplugd and wpa_supplicant

Install guessnet and ifplugd

sudo aptitude install guessnet ifplugd
Configure ifplugd. Define which interfaces need to be hotplug and adjust the arguments. You should remove the -q.

sudo vi /etc/default/ifplugd

# Just an example
INTERFACES="eth0 wlan0"
#ARGS="-q -f -u0 -d10 -w -I"
ARGS="-f -u0 -d10 -w -I"
# Override ARGS for a particular interface
# This is for an Intel Corporation PRO/Wireless 3945ABG [Golan] Network Connection (rev 02)
ARGS_wlan0="-F -u0 -d10 -w -I"
SUSPEND_ACTION=stop
Some cards do not really play well with the defaults of Ubuntu, adjust where needed.

More information for ifplugd
See ifplugd for more information. And their respective man pages


man ifplugd
man ifplugd.conf
You will need the wpa.sh script mentioned earlier in this guide and you will need to make sure it will be started and stopped:


# Start wpa_supplicant at boot
sudo ln -s /etc/init.d/wpa.sh /etc/rc2.d/S19wpa
sudo ln -s /etc/init.d/wpa.sh /etc/rc3.d/S19wpa

# Kill wpa_supplicant at shutdown
sudo ln -s /etc/init.d/wpa.sh /etc/rc5.d/K21wpa
sudo ln -s /etc/init.d/wpa.sh /etc/rc6.d/K21wpa
Map your physical interfaces to logical interfaces
First, we are going to make a mapping for eth0 and wlan0 and said which mapped interface could be used for each physical interface:


mapping eth0
  # Tell ifupdown to use guessnet to determine which network we can use
  script guessnet-ifupdown
  # Default location
  map default: missing-cable
  # How verbose we are
  map verbose: false
  map debug: false
  # Our different networks, order decides which network is picked
  # if two or more networks are available at the same time.
  map officelan homelan aruba missing-cable

mapping wlan0
  script guessnet-ifupdown
  map default: missing-cable
  map verbose: false
  map debug: false
  map workwifi homewifi wifi-open missing-cable
Normally ifupdown configures the interfaces, but now we've told it to use guessnet to determine the network being used.

Define tests to select networks
As you will see with the officelan, homelan and aruba examples below we will execute tests to see wheter a peer is present based on the MAC address. The simplest solution for this is to check whether your gateway is present. You can find out the MAC address of your gateway by running the ip neigh command. You need to be connected with your network for this.


$ ip neigh
192.168.1.254 dev eth0 lladdr 00:24:17:47:xx:xx
This my default gateway, has IP address 192.168.1.254 and 00:24:17:47:xx:xx as a MAC address. This gives us the needed information to define the test.


  test peer address 192.168.1.254 mac 00:24:17:47:xx:xx source 192.168.1.14
You don't need to specify the source IP address, but in certain cases this is required. I always add it so I don't have to worry about it in case I do need it.

So let's define our fixed networks using the peer tests:


# Work
# Obfuscated some details about my work enviroment
iface officelan inet static
  # Test to see if our gateway is present with MAC address 00:00:xx:xx:xx:xx
  # from source address 194.134.x.x
  test peer address 194.134.x.x mac 00:00:xx:xx:xx:xx source 194.134.x.x
  address 194.134.x.x
  netmask 255.255.255.0
  gateway 194.134.x.x
  # Set our DNS, this is used by the resolvconf package
  dns-domain euronet.nl
  dns-search euronet.nl orange.nl wanadoo.nl online.nl euro.net
  dns-nameservers 194.134.5.5 194.134.0.97
  # (post|pre)-(up|down) actions, which are optional
  # Mount samba shares at work after we brought the interface up
  post-up /home/my_user/bin/mount_smb start
  # And disable to mounts before we shut the interface down
  pre-down /home/my_user/bin/mount_smb stop
  # Which interface has preference, eth0 or wlan0, this is needed if you
  # are connected via both interfaces.
  metric 1

# One happy island (very nice weather ;))
iface aruba inet dhcp
  test peer address 192.168.1.1 mac 00:08:5C:89:xx:xx source 192.168.1.4
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl euro.net

# Home
iface homelan inet static
  test peer address 192.168.1.254 mac 00:24:17:47:xx:xx source 192.168.1.14
  address 192.168.1.14
  netmask 255.255.255.0
  gateway 192.168.1.1
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl euro.net
  dns-nameservers 194.134.5.5 194.134.0.97
  # At home, wireless has precedence over our fixed network
  metric 2
For wireless networks you can also use the peer test, but there is a simpler way to see if you can connect to a wireless network. Test to see if the ESSID is present:


  test wireless essid ubuntuwifi
  # In case of spaces in the ESSID
  test wireless essid "ubuntu wifi"
Spaces in the ESSID
In older versions of guessnet you didn't need to use quotes around the ESSID, but later versions do require it.

# Wifi at work
iface workwifi inet dhcp
  # Use this if we can find Online Wireless network
  test wireless essid "Online Wireless"
  dns-domain euronet.nl
  dns-search euronet.nl orange.nl wanadoo.nl online.nl sf6800.euronet.nl euro.net
  dns-nameservers 194.134.5.5 194.134.0.97
  # This interface has a lesser precedence over eth0
  metric 2

# Wifi at home
iface homewifi inet static
  test wireless essid ubuntuwifi
  address 192.168.1.114
  netmask 255.255.255.0
  gateway 192.168.1.1
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl
  dns-nameservers 194.134.5.5 194.134.0.97
  # This interface is used in case we are both connected via wifi and
  # wired LAN
  metric 1

# Connect to any open network
iface wifi-open inet dhcp
  # Any ESSID is valid
  wireless-essid any
  # Is the wireless work open? Yes, then use this mapping
  test wireless open
  # Set the DNS
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl
  dns-nameservers 194.134.5.5 194.134.0.97
To see what kind of other test you can run to determine which network you are in, please have a look at the manpage of guessnet.

man guessnet
Use of metrics

Some of you might have noticed a metric statement for some of the interfaces. I do this because when you are connected via both wireless and wired networks, some things may go "bad" with the routing table. When you define a metric for these two interfaces you will tell the routing table which interface has preference over the other. The lowest metric has priority over the higher metric.

Or as I explained in a ubuntuforum post: The problem is that without the metric you will have 2 interfaces used for the same destinations. It will use either interface, which causes problems with the routing table.

By setting a metric you can avoid this, since the higher metric is more "expensive" to use. So the OS will use the interfaces with the lowest metric if it needs to route traffic. In case the lower metric interface is shutdown it will use the higher metric interface since it is the only interface which can be used to route traffic towards that particular network/destination.

See also http://en.wikipedia.org/wiki/Metrics_%28networking%29

The problem could also be solved by adding static routes, but that is used mostly to make sure specific networks/hosts are routed via a different interface then the default. You then force only those hosts to use link B even though normally the OS would use link A.

Result
When we put all the configuration segments together you will get a interfaces file which looks like this


auto lo
iface lo inet loopback
address 127.0.0.1
netmask 255.0.0.0

mapping eth0
  script guessnet-ifupdown
  map default: missing-cable
  map verbose: false
  map debug: false
  map officelan homelan aruba missing-cable

mapping wlan0
  script guessnet-ifupdown
  map default: missing-cable
  map verbose: false
  map debug: false
  map workwifi homewifi wifi-open missing-cable

# Work
iface officelan inet static
  test peer address 194.134.x.x mac 00:00:xx:xx:xx:xx source 194.134.x.x
  address 194.134.x.x
  netmask 255.255.255.0
  gateway 194.134.x.x
  dns-domain euronet.nl
  dns-search euronet.nl orange.nl wanadoo.nl online.nl euro.net
  dns-nameservers 194.134.5.5 194.134.0.97
  post-up /home/my_user/bin/mount_smb start
  pre-down /home/my_user/bin/mount_smb stop
  metric 1

# One happy island (very nice weather ;))
iface aruba inet dhcp
  test peer address 192.168.1.1 mac 00:08:5C:89:xx:xx source 192.168.1.4
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl euro.net

# Home
iface homelan inet static
  test peer address 192.168.1.254 mac 00:24:17:47:xx:xx source 192.168.1.14
  address 192.168.1.14
  netmask 255.255.255.0
  gateway 192.168.1.1
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl euro.net
  dns-nameservers 194.134.5.5 194.134.0.97
  metric 2

# Wifi at work
iface workwifi inet dhcp
  # Use this if we can find Online Wireless network
  test wireless essid "Online Wireless"
  dns-domain euronet.nl
  dns-search euronet.nl orange.nl wanadoo.nl online.nl sf6800.euronet.nl euro.net
  dns-nameservers 194.134.5.5 194.134.0.97
  # This interface has a lesser precedence over eth0
  metric 2

# Wifi at home
iface homewifi inet static
  test wireless essid ubuntuwifi
  address 192.168.1.114
  netmask 255.255.255.0
  gateway 192.168.1.1
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl
  dns-nameservers 194.134.5.5 194.134.0.97
  # This interface is used in case we are both connected via wifi and
  # wired LAN
  metric 1

# Connect to any open network
iface wifi-open inet dhcp
  # Any ESSID is valid
  wireless-essid any
  # Is the wireless work open? Yes, then use this mapping
  test wireless open
  # Set the DNS
  dns-domain opperschaap.net
  dns-search opperschaap.net euronet.nl wanadoo.nl online.nl
  dns-nameservers 194.134.5.5 194.134.0.97
You can now test if it all works like intended.

/etc/init.d/networking stop
/etc/init.d/wpa.sh stop
/etc/init.d/ifplugd stop
If you enter ip addr you will only see the lo interface being active.

1: lo: <LOOPBACK,UP,LOWER_UP> mtu 16436 qdisc noqueue state UNKNOWN
2: eth0: <BROADCAST,MULTICAST> mtu 1500 qdisc pfifo_fast state DOWN qlen 1000
And start all the required daemons:

/etc/init.d/ifplugd start
/etc/init.d/wpa.sh start
/etc/init.d/networking start
And now you will see your interfaces configured properly


$ ip a
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 16436 qdisc noqueue state UNKNOWN
2: eth0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc pfifo_fast state UP qlen 1000
Done.

Bonus script
This script will be a stop/start script for your complete network, which can be used when you want to enable networking after you have suspended your laptop or for other reasons


INT="eth0 wlan0"

stop() {
    /etc/init.d/networking stop
    /etc/init.d/wpa.sh stop
    /etc/init.d/ifplugd stop
    for i in $INT ; do
        ip link set dev "$i" down &>/dev/null
    done

}

start() {
    /etc/init.d/ifplugd start
    /etc/init.d/wpa.sh start
    /etc/init.d/networking start
}

restart() {
    stop
    sleep 5
    start
}

$1
See also
Ubuntu resources
http://ubuntuforums.org/showthread.php?t=124153 - This guide on the Ubuntu forums.

http://ubuntuforums.org/showthread.php?t=1055393 - Setting hostname gone wrong.

External resources
http://www.linuxhomenetworking.com/wiki/index.php/Quick_HOWTO_:_Ch03_:_Linux_Networking - networking for Linux explained

http://wiki.debian.org/WPA - Debian wiki and configuring WPA

http://www.aaron-spettl.de/ubuntu/dynamische-netzwerkkonfiguration.php - This guide in German

http://vollink.com/gary/deb_wifi.html - Debian and Wireless networking (broken link)

http://wiki.fok.nl/index.php/Dig/linux/wireless - This guide in Dutch, rewrite of the Ubuntu forums thread (Dutch)