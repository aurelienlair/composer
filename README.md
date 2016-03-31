# Composer usage clarifications
In this repository I will use and explain composer main autoloadings: PSR-0, PSR-4, Classmap...
###### To see the modifications
`composer status -v` 

###### Read composer.json install/update packages and its dependencies and update/create composer.lock
`composer update`

###### Read composer.json install/update only PHPUnit package and its dependencies and update/create composer.lock
`composer update "phpunit/phpunit"`

###### Will install the packages specified in composer.lock if not exists reads composer.json, install and write composer.lock
`composer install`

###### Instruction to remove a package
`composer remove`

###### Remove PHPUnit package and its dependencies
`composer remove "phpunit/phpunit" --update-with-dependencies`

###### Will add PHPUnit package into composer.json and install/update the package and its dependencies
`composer require "phpunit/phpunit"`

###### Creates a "classmap" mapping having each class to its file in a big array (vendor/composer/autoload_classmap.php)
`composer dump-autoload --optimize`

###### The instructions below defines to use stable versions following this order stable, dev or alpha packages searching to use the more stable (dev, stable, beta..)
```
"minimum-stability": "dev",
"prefer-stable" : true
```

###### Autoload of functions or classes by specifying file path (array is mandatory)
###### it includes in memory the code within the file (usually functions) so can be very nasty
```
"autoload": {
    "files": ["src/functions/list.php"]
}
```
###### Autoload of classes by specifying the classmap (composer dump-autoload is necessary everytime you had a new class). Array is mandatory
###### vendor/composer/autoload_classmap.php will content an array with Namespace\Package\Class => FILE_PATH_OF_CLASS
###### when invoking new Class() php will search within the classmap register
```
"autoload": {
    "classmap": ["lib/"],
}
```

###### Autoload by using PSR-0 standard. 
###### WordWrapper is the Namespace from which will be performed the autoload eg. new \WordWrap/Class() 
###### src is the parent directory of the location of the classes under namepace WordWrapper
###### Everytime a new Instance of WordWrap will be invoked, class file will be search within src/*
###### `composer install` will refresh vendor/composer/autoload_namespaces.php file which is read by vendor/composer/autoload_real.php
```
"autoload": {
    "psr-0": {
        "WordWrapper": ["src/"],
    }
}
```

###### Same thing but for a specific package of the namespace (classes of package Counter within the namespace Utils will be searched and loaded from src
###### When specifying a Namespace vendor/composer/autoload_namespaces.php will be update container Namespace\Package => DIRECTORY
```
"autoload": {
    "psr-0": {
        "Utils\\Counter": ["src/"]
    }
}
```

###### Autoload by using PSR-4 standard. 
###### When requiring Class from namespace `Utils\Log\' composer will search under src/Class.php
###### It is compatible with PSR-0 but doesn't oblige to have under src/ a tree src/Utils/Log like in PSR-0
```
"psr-4": {
    "Utils\\Log\\": ["src/"]
}
```
