# Git

### Ingore all glb files 
1. add .gitignore in Assets folder with *.glb inside
2. git rm --cached Assets/*.glb
3. Commit and push

## Staging
### Remove file from staging:
```
git reset HEAD filename.php (and then to ignore it git rm --cached <file>)

git reset HEAD -- .
```

### Discard unstaged changes
```
git checkout -- .
```

## Remote
### Change remote url
```
git set-url origin ssh://yourrepo.git
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

## Clone
```
git clone -b mybranch --single-branch git://sub.domain.com/repo.git
```


