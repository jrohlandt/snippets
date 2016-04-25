var fs = require("fs");
var readline = require("readline");
var rl = readline.createInterface(process.stdin, process.stdout);

var virtualHost = {serverName: "", documentRoot: "", fileName: ""};

rl.question("Create VirtualHost (y/n)? ", function(answer) {
    if (answer !== "y") {
        process.exit();
    }

    rl.setPrompt("ServerName: ");
    rl.prompt();

    rl.on('line', function(server) {

        if (!server) {
            rl.setPrompt("cannot be empty ");
            rl.prompt();
        } else {
            if (!virtualHost.serverName) {
                virtualHost.serverName = server.toLowerCase().trim();
                virtualHost.fileName = server.toLowerCase().trim() + ".conf";
            } else if (!virtualHost.documentRoot) {
                virtualHost.documentRoot = server.toLowerCase().trim();
                console.log("Creating VirtualHost...");
                var content = `
<VirtualHost *:80>
        ServerAdmin webmaster@example.com
        ServerName  ${virtualHost.serverName}
        ServerAlias ${virtualHost.serverName}

        # Indexes + Directory Root.
        DocumentRoot ${virtualHost.documentRoot}

         <Directory ${virtualHost.documentRoot} >
                DirectoryIndex index.php
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
`;
                fs.writeFileSync(virtualHost.fileName, content);
                console.log(content);

                console.log("VirtualHost file created. Please run sudo a2ensite to enable.");
                process.exit();
            } else {
                console.log("Failed");
                process.exit();
            }


            rl.setPrompt("DocumentRoot: ");
            rl.prompt();
        }

    });

});
