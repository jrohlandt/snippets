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



## Apple Notarization:

Notarization is where you upload your signed app to Apple and then they attach an ticket to the app which lets Gatekeeper know the app is safe.

To check that Gatekeeper is enabled run:
```
sudo spctl --status
```
If the result is "assessments enabled" then Gatekeeper is enabled.
If it is not enabled the you can enabled it by running:
```
sudo spctl --master-enable
```
And if for any reason you need to disable Gatekeeper, run:
```
sudo spctl --master-disable
```

To check if the installed app is notarized, run:
```
sudo spctl -v --assess /Applications/myapp.app
```
If it is not notarized the result will be "rejected".
Note: apps are installed in /Applications not ~/Applications

Also: Don't run the command on the .dmg file. The dmg doesn't get notarized only the app itself.

Install electron-notarize as a dev dependency
```
npm i -D electron-notarize
```

For electron-notarize to work you need:
1. Xcode (+v10)
2. An Apple developer account
3. An app-specific-password for your Apple Developer Account Apple ID
    - Create password in Apple ID dashboard https://appleid.apple.com
        - In security section generate a new password (this password is only shown once so keep it somewhere safe)
4. Sign app with hardened-runtime and the following entitlements :
    * com.apple.security.cs.allow-jit
    * com.apple.security.cs.allow-unsigned-executable-memory
Note: electron-builder already uses hardened-runtime by default so this is just for reference.
Also see https://developer.apple.com/documentation/security/hardened_runtime if access to mic or camera is needed.

Add to package.json  (only run for final build as it takes a long time)
```
"build": {
    "afterSign": "build/notarize.js"
}
```

In notarize.js:
```
const { notarize } = require("electron-notarize");

console.log("Notarizing APP........");

module.exports = async function (context) {
  if (process.platform !== "darwin") return;

  let appName = context.packager.appInfo.productFilename;
  let appDir = context.appOutDir;

  return await notarize({
    appBundleId: "com.digitalkickstart.easyvsl",
    appPath: `${appDir}/${appName}.app`,
    appleId: process.env.appleId,
    appleIdPassword: process.env.appleIdPassword,
  });
};
```

Then run:
```
appleId='me@example.com' appleIdPassword='myappleidpassword' electron-builder -m
```

Then reinstall app from dist dir and run:
```
sudo spctl -v --assess /Applications/myapp.app
```
If all went well the result should say "accepted"

To check which entitlements the app has been signed with run:
```
codesign -d --entitlements :- /Applications/myapp.app
```