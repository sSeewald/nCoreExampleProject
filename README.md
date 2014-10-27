#nCoreExampleProject

>

##Setup and get running:


Install
-------

> Step 1: Clone the repo

```bash
    git clone https://github.com/sSeewald/nCoreExampleProject.git [your project name - directory to clone]
```

    
> Step 2: Install Vendor Files including the nCore Framework

Get into the project directory and download the latest [composer]

```bash
    cd [directory]
    php -r "readfile('https://getcomposer.org/installer');" | php
```

Install [composer] vendor files

```bash
    php composer.phar install
```

Use `composer dump-autoload --optimize` to optimize autoloading before deployment.




