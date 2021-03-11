# Electron

## Electron Builder

### Building on Windows

```
electron-builder -w --x64
```

### Generate a self signed cert on windows
```
electron-builder create-self-signed-cert -p myPublisherName
```

After running the above command the .pfx certificate file will be placed in root of project, move it to a directory who's content is ignored by git.

Then in the package.json:
```
build: { 
    "win": {
        "target": // default is already nsis
        "certificateFile": "private/myPublisherName.pfx",
        "certificatePassword: "", // leave blank
        "verifyUpdateCodeSignature": false, // false when running build on mac in dev but true for production
        "publisherName": "myPublisherName"
    }
}
```

### Building on Mac

```
electron-builder -m --x64
```

Use Xcode to create a developer certificate, Electron-builder will automatically find the correct certificate to use.


## Auto updater:

Install electron-updater package:
```
npm i electron-updater
```

Write updater code and call updater when app is ready.

## Using Github releases for auto updates:

1. Create a public repo to use for releases.
2. Create a draft release
3. Update the repository field in package.json to that repo url.
4. Run:

### First set Github access token:

Windows: 
```
setx GH_TOKEN mytoken
```
Mac/Linux: 
```
export GH_TOKEN=mytoken
```
```
electron-builder -wm --publish 'onTagOrDraft'
```

When done and command finished uploading files to Github, go to release and publish it.



