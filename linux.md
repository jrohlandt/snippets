#Linux 
### Add additional swapfile
https://askubuntu.com/a/927909
```
dd if=/dev/zero of=/some/file count=1K bs=1M
mkswap /some/file
sudo chown root:root /some/file
sudo chmod 600 /some/file
sudo swapon /some/file
```

### create symbolic link:
```
 ln -s {target-filename} {dest-foldername}
```

### check diskspace 
```
df -h
```
### Show system date and time: 
timedatectl

### Distro info
cat /etc/os-release

### CPU info:
cat /proc/cpuinfo

### Memory info:
cat /proc/meminfo

for more options: ls /proc

### Flush dns: (make sure nscd is installed)
sudo /etc/init.d/nscd restart

### Show processes 
top

### Paths:
- /var/log/auth.log
- /var/log/nginx/error.log
- /var/log/mysql/error.log

