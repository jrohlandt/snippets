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
## Character Sets and Ranges 
```
/gr[ae]y/g
grey gray
```
```
/gr[ea][ea]t/
great graet greet graat
```
```
[0-9] [5-8] [A-Za-z] [A-Za-z0-9_] [a-cg-my-z]
```
```
/[0-9][0-9][0-9] [0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]/
021 590-7777 031 580-9999
```
```
[0-9][0-9][A-Za-z][A-Za-z][A-Za-z]
71abc 31tcu
```
```
/[6-9][01][A-Za-z][A-Za-z][A-Za-z]/g
71abc 70tcu 61abc 91bzn
```
## Negative Character Sets
```
see[^mn]
Matches seek and sees  but not seem seen
```
## Metacharacters inside Character Sets
Inside a character set metacharacters do not need to be escaped with the exception of ] - ^ \
```
value[[()][0-9][\])]
value(5) value[7]
```
## Repetition Metacharacters
```
* zero or more times
+ one or more times 
? zero or one time
```
```
* zero or more times
/bicycles*/g
Matches bicycle bicycles bicyclesssss
```
```
+ one or more times 
/bicycles+/g 
Matches bicycles bicyclessssss but not bicycle
```
```
? zero or one time
/bicycles?/g
Matches bicycle bicycles but not bicyclesss
```
