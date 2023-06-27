## 














## electron-builder config
see: https://docs.digicert.com/en/digicert-keylocker/signing-tools/sign-java-with-electron-builder-using-pkcs11-integration.html


Delegate signing to a custom script
In package.json add
```
"win": {
  "sign": "./customSign.js"
}
```

Create customSign.js file:
```
'use strict';

exports.default = async function(configuration) {
   
    if(configuration.path){

    
      require("child_process").execSync(
     
        `smctl sign --keypair-alias=${keypair3} --config-file "${C:\Program Files\DigiCert\DigiCert One Signing Manager Tools\pkc11.cfg}" --input "${String(configuration.path)}"`

      );
    }
  };
```

If there are errors about WIN_CSC_LINK being incorrect then delete the CSC_LINK environment variables.
Here is how to remove them from the current powershell session:
```
// Check if variables exist
dir env:

// Remvove them from current session:
rm env:WIN_CSC_LINK
rm env:CSC_LINK
```
