# Use Prettier in old PhpStorm 2018 (or webstorm):
https://prettier.io/docs/en/webstorm.html

Running Prettier on save using File Watcher
To automatically format your files using Prettier on save in WebStorm 2019.* or earlier, you can use a File Watcher.

Go to Preferences | Tools | File Watchers and click + to add a new watcher.

In Webstorm 2018.2, select Prettier from the list, review the configuration, add any additional arguments if needed, and click OK.

In older IDE versions, select Custom and do the following configuration:

Name: Prettier or any other name
File Type: JavaScript (or Any if you want to run Prettier on all files)
Scope: Project Files
Program: full path to .bin/prettier or .bin\prettier.cmd in the project’s node_module folder. Or, if Prettier is installed globally, select prettier on macOS and Linux or C:\Users\user_name\AppData\Roaming\npm\prettier.cmd on Windows (or whatever npm prefix -g returns).
I just installed prettier globaly and then used that path E.g. /home/me/.nvm/versions/node/v12.18.3/bin/prettier
Arguments: --write [other options] $FilePath$ // I used --write $FilePath$
Output paths to refresh: $FilePathRelativeToProjectRoot$
Working directory: $ProjectFileDir$
Environment variables: add COMPILE_PARTIAL=true if you want to run Prettier on partials (like _component.scss)
Auto-save edited files to trigger the watcher: Uncheck to reformat on Save only.
