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

- CSS Files: will be automatically reloaded without a page refresh
- JS Files: will force a page refresh

:warning: If You are running multiple instances please make sure to change the ports in `/src/build.config.js` and `/Modules/Dev/Config.xml`.

