# Git


## Staging
### Remove file from staging:
```
git reset HEAD filename.php
```

### Discard unstaged changes
```
git checkout -- .
```

## Commit
### Amend commit message
```
git commit --amend -m  "new message"
```
### List of files that changed between two commits
```
git diff --name-only SHA1 SHA2
```
### Undo last commit
```
git reset --soft HEAD~
```
## Branches
### List merged branches
```
git branch --merged relevant-branch-name
```

### Undo a merge
```
git reset --hard SHA
```

## Stash
```
git stash
git stash list
git stash apply
git stash apply stash@{0}
git stash drop stash@{0}
```




