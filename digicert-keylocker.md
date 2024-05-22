#### Create api token and auth certifcate
In digicert one create api token, as well as auth certificate and password

See https://docs.digicert.com/en/digicert-keylocker/get-started.html


#### Install the DigiCert​​®​​ Software Trust Manager PKCS11 library
see: https://docs.digicert.com/en/software-trust-manager/tools/cryptographic-libraries-and-frameworks/pkcs11-library.html

1. Install the library 
Which in this case is the "Digicert Click to Sign" tool.

Download Keylocker installer from your account at one.digicert.com.
After installing you will see Click to sign in C:\Program Files\Digicert. Run the .exe and complete the wizard.

Also install SignTool https://docs.digicert.com/en/digicert-keylocker/sign-with-digicert-signing-tools/third-party-signing-tool-integrations/signtool.html


3. Run the configuration wizard:  
When I installed it at first nothing happened. It just installed and then went away.
Eventually I found it in  C:\Program Files\DigiCert\Click-to-sign (along with the Keylocker installation) and I ran it from there.
It presented a configuration wizard and I had to supply my one.digicert.com api key as well as my client certificate and certificate password.

5. Then create a config file named **pkcs11properties.cfg**:
```
name=signingmanager 
library="C:\\Program Files\\DigiCert\\DigiCert Keylocker Tools\\smpkcs11.dll"
slotListIndex=0
```

3. Put **pkcs11properties.cfg** in the same directory as the PKCS11 library. 
In my case it was C:\Program Files\DigiCert\Click-to-sign


#### Add path/s
1. In windows search bar search for environment variables. 
2. Choose edit environment values and under system select path then edit.

Add the following paths:
1. Most importantly **C:\Program Files\DigiCert\DigiCert Keylocker Tools** (which contains smctl.exe).

2. Other paths I added are:
* C:\Program Files\DigiCert\Click-to-sign
* C:\Program Files (x86)\Windows Kits\10\bin\10.0.19041.0\x64 (for Windows SDK signtool).

#### Check if smctl is working
Run the following command from anywere in Powershell:
```
smctl healthcheck
```

To check if smctl is working and in path run smctl healthcheck from anywhere in powershell.
#### sign a file
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
     
        `smctl sign --keypair-alias=${process.env.SM_KP} --config-file "${C:\Program Files\DigiCert\DigiCert One Signing Manager Tools\pkc11.cfg}" --input "${String(configuration.path)}"`
        // I had to use --config-file "C:\\Program Files\\DigiCert\\Click-to-sign\\pkc11.cfg"
        // Also when you installed the PKCS11 library and ran the config wizard
        // it should create a bunch of environment variables
        // the keypair alias is in SM_KP
        // run "dir env:" to view variables
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
Then 
