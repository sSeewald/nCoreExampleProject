#nCoreExampleProject



##Setup and get running:


Install
-------

> Step 1: Clone the repo

```bash
git clone https://github.com/sSeewald/nCoreExampleProject.git [your project name - directory to clone]
```

    
> Step 2: Install vendor files including the nCore framework

Go into the project directory and download the latest [composer](https://getcomposer.org).

```bash
cd [directory]
php -r "readfile('https://getcomposer.org/installer');" | php
```

Install [composer](https://getcomposer.org) vendor files.

```bash
php composer.phar install
```

Use `composer dump-autoload --optimize` to optimize autoloading before deployment.

    
> Step 3: Install NPM modules and required files

```bash
cd src/
npm install
```

Using Grunt to start a local server
------------------------------------

> First check /src/build.config.js - if you need to use a specific PHP binary or change the ports.

Just go into the '/src' directory and use the "watchAll" task to start a local server.

```bash
    cd src/
    grunt watchAll
```

Grunt watches for changes in your src directory and will automatically recompile CSS and JS files.

- CSS files gets reloaded without a page refresh
- JS files will force a page refresh

:warning: If You are running multiple instances please make sure to change the ports in `/src/build.config.js` and `/Modules/Dev/Config.xml`.

#Using the Example-Project and create your first Website

Folder-Structure
----------------

```
project/
├── etc
│   ├── cache (the cache folder for the application)
│   ├── log (this is where log files are stored)
│   │   bootstrap.php 
│   │   dev.config.xml
│   │   [env].config.xml
│   │   ...
│
├── Modules (a project is organized in modules - put them here)
│
└── public (all requests will be served from the public folder)
│   ├── content
│   ├── css
│   ├── js
│   ├── img
│   │
│   │   index.php (the main entrance for the application/website)
│   │   robots.txt
│   │   ...
│   
├── src (the source files that needs pre-compilation)
│   ├── node_modules (required node modules - installed by npm)
│   ├── sass (sass files to compile the projects CSS files)
│   ├── ts (typescript files to compile app.js)
│   ├── typings (typescript definition files - installed by tsd)
│   ├── vendor (javascript libraries - installed by bower)
│   │
│   │   .bowerrc
│   │   bower.json
│   │   build.config.js
│   │   Gruntfile.js
│   │   package.json
│   │   tsd.json 
│   │   ...
│
├── vendor (will be installed with composer)
│
│   .htaccess (all requests are forwarded to /public/[index.php])
│   boot.php
│   composer.json
│   routing.php (this File is needed if you are using grunt and php's build in webserver 'grunt watchAll')
│   ...
```
