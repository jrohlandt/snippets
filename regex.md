# Regex
## Wildcards and Escaping
```
/th.._file\.txt/g
this_file.txt that_file.txt
```
```
/file.\.txt/g
Matches file1.txt and file2.txt but not file3_txt.zip
```
```
/\/home\/simba\/notes\.txt/g
/home/simba/notes.txt
```
## Character sets
```
/gr[ae]y/g
grey gray
```
```
/gr[ea][ea]t/
great graet greet graat
```
## Character ranges
```
[0-9] [5-8] [A-Za-z] [A-Za-z0-9_] [a-cg-my-z]
```
```
/[0-9][0-9][0-9] [0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]/
021 590-7777 031 580-9999
```
