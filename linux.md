#Linux 

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

