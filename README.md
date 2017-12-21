no-framework-skeleton
----------------


Install dependencies
--------------------

    composer install
    
    
Dump schema & data to MySQL
---------------------------

    mysqladmin -u root -p create micro_framework
    ./vendor/bin/propel sql:build --config-dir config/propel.php --schema-dir src/Model/Config --output-dir src/Model/Sql
    ./vendor/bin/propel sql:insert --config-dir config/propel.php --sql-dir src/Model/Sql
    
Setup models
------------
    
    ./vendor/bin/propel model:build --config-dir config/propel.php --schema-dir src/Model/Config --output-dir src/Model
    ./vendor/bin/propel config:convert --config-dir config/propel.php --output-dir src/Model/Config
        
Run application
---------------

Using the PHP built-in server for development purposes with the command:

    composer serve
    
    // composer.json
    ...
    "scripts": {
        "server": "php -S localhost:8000 -t public -d display_errors=1"
    }
    ...

Go to localhost:8000

Enjoy!
