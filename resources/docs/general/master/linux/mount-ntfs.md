<!--
title: Mount NTFS
-->

# Mount NTFS
    mount -t ntfs-3g -o ro /dev/sda3 /media/windows
### Windows hibernation and fast restarting
On computers which can be dual-booted into Windows or Linux, Windows has to be fully shut down before booting into Linux, otherwise the NTFS file systems on internal disks may be left in an inconsistent state and changes made by Linux may be ignored by Windows.

So, Windows may not be left in hibernation when starting Linux, in order to avoid inconsistencies. Moreover, the fast restart feature available on recent Windows systems has to be disabled. This can be achieved by issuing as  an  Administrator  the  Windows  command
which disables both hibernation and fast restarting :

    powercfg /h off

