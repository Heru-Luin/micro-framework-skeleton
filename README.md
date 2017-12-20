no-framework-skeleton
----------------


Install dependencies
--------------------

    composer install
    
Setup models
------------

    ./vendor/bin/propel sql:build --config-dir config/propel.php --schema-dir src/Model/Config --output-dir src/Model/Sql
    ./vendor/bin/propel model:build --config-dir config/propel.php --schema-dir src/Model/Config --output-dir src/Model
    ./vendor/bin/propel config:convert --config-dir config/propel.php --output-dir src/Model/Config
    
Dump schema & data to MySQL
---------------------------

    mysqladmin -u root -p create bookstore
    ./vendor/bin/propel sql:insert --config-dir config/propel.php --sql-dir src/Model/Sql
        
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
