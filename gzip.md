# GZIP

### Compress
Compress a file or folder
for all files in current folder:
```
tar cvzf new-archive-name.tar.gz *
```
for specific file:
```
tar cvzf new-archive-name.tar.gz file-to-be-archived.sql
```

### Extract
```
tar -xvzf new-archive-name.tar.gz file-to-be-extracted.tar.gz
```