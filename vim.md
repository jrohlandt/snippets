#Vim 

### search
```
/yourstring
```
### search and replace
```
:%s/foo/bar/g
```
for much more see: http://vim.wikia.com/wiki/Search_and_replace

### Comment/Uncomment multiple lines

#Method 1: VISUAL BLOCK MODE
To go into VISUAL BLOCK mode, move the cursor to the first char of the first line in block code you want to comment, then type:
```
CTRL + V
```
Use j to move the cursor down until you reach the last line of your code block. Then type:
```
SHIFT + I
```
now vim goes to INSERT mode and the cursor is at the first char of the first line. Finally, type // then ESC and the code block is now commented.

To decomment, do the same things but instead of type Shift + I, you just type x to remove all // after highlight them in VISUAL BLOCK mode.

#Method 2: Ranges - 
To comment:
```
:66,70s/^/#
```
To uncomment:
```
:66,70s/^#/
```



