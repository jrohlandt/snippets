## 











## Install the DigiCert​​®​​ Software Trust Manager PKCS11 library
see: https://docs.digicert.com/en/software-trust-manager/tools/cryptographic-libraries-and-frameworks/pkcs11-library.html

Install the library 
Which in this case is the Digicert Click to Sign tool.
When I installed it at first nothing happened. It just installed and then went away.
Eventually I found it in  C:\Program Files\DigiCert\Click-to-sign (along with the Keylocker installation) and I ran it from there.
It presented a configuration wizard and I had to supply my one.digicert.com api key as well as my client certificate and certificate password.

Then create a config file named pkcs11properties.cfg:
```
name=signingmanager 
library="C:\\Program Files\\DigiCert\\DigiCert Keylocker Tools\\smpkcs11.dll"
slotListIndex=0
```

Put it in the same directory as the PKCS11 library. 
In my case it was C:\Program Files\DigiCert\Click-to-sign

The path also needs to be added.
In windows search bar search for environment variables. 
Choose edit environment values and then edit the path variable by adding e.g C:\Program Files\DigiCert\Click-to-sign
## singn a file
Right click a file in windows explorer then choose more options and then click to sign.

## Logs
Can be found in C:\Users\jrohl\.signingmanager\logs (but looks like it only shows logs from when the smctl.exe is run from powershell).

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
        // I had to use --config-file "C:\\Program Files\\DigiCert\\Click-to-sign\\pkc11.cfg"
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

If there are errors about "'smctl' is not recognized as an internal or external command,
operable program or batch file."
Then point then specify the full file path to smctl.exe:
```
`"C:\\Program Files\\DigiCert\\DigiCert Keylocker Tools\\smctl.exe" sign --keypair-alias=${keypair3} --config-file "C:\\Program Files\\DigiCert\\Click-to-sign\\pkc11.cfg" --input "${String(
        configuration.path
      )}"`
```
