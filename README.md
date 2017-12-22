[![Build Status](https://travis-ci.org/dridi-walid/micro-framework-skeleton.svg?branch=master)](https://travis-ci.org/dridi-walid/micro-framework-skeleton)
[![codecov](https://codecov.io/gh/dridi-walid/micro-framework-skeleton/branch/master/graph/badge.svg)](https://codecov.io/gh/dridi-walid/micro-framework-skeleton)

micro-framework-skeleton
----------------

Build your own micro framework using composer components from packagist.org

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
    
    ./vendor/bin/propel model:build --config-dir config/propel.php --schema-dir src/Model/Config --output-dir src
    ./vendor/bin/propel config:convert --config-dir config/propel.php --output-dir src/Model/Config
    
Load environment variables from .env
------------------------------------

    cp .env.dist .env
        
Run application
---------------

Using the PHP built-in server for development purposes with the command:

    composer serve
    
    // composer.json
    ...
    "scripts": {
        "server": "php -S localhost:7000 -t public -d display_errors=1"
    }
    ...

Go to localhost:7000/demo

Result -->
    
    {
        "method": "demoAction",
        "hash": "020f61d1c4e647c1a5563bec87821a9c5c328292edbb782f86f34fac86039573"
    }
    
Continuous Integration PRE-COMMIT
---------------------------------

    // copy pre-commit to .git/hooks directory to ensure that tests pass before
    // commit changes
    cp pre-commit .git/hooks
    
Project Structure
-----------------
    .
    ├── bin
    │   └── console
    ├── build.xml
    ├── composer.json
    ├── composer.lock
    ├── config
    │   ├── propel.php
    │   ├── routes.php
    │   └── services.php
    ├── phpcs.xml
    ├── phpunit.xml
    ├── public
    │   └── index.php
    ├── README.md
    ├── src
    │   ├── Command
    │   │   └── RandomInteger.php
    │   ├── Controller
    │   │   └── DemoController.php
    │   ├── Model
    │   │   ├── Base
    │   │   │   ├── User.php
    │   │   │   └── UserQuery.php
    │   │   ├── Config
    │   │   │   ├── config.php
    │   │   │   └── schema.xml
    │   │   ├── Map
    │   │   │   └── UserTableMap.php
    │   │   ├── Sql
    │   │   │   ├── micro_framework.sql
    │   │   │   └── sqldb.map
    │   │   ├── User.php
    │   │   └── UserQuery.php
    │   └── Service
    │       └── Crypto.php
    └── tests
        └── Service
            └── CryptoTest.php

Enjoy!
