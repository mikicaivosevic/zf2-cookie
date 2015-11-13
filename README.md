#Simple controller plugin for reading and writing cookie.

##Installation
`composer install mikica/zf2-cookie`

You need to register new module. Add in file config/application.config.php: 

```
'modules' => array(
    '...',
    'ZfCookie'
),
```

Voila! The module is ready to use. 

##Using in Controller

```php
<?php

$this->cookie('key'); //Read cookie
$this->cookie('key', 'value'); //Write cookie
$this->cookie($key, $value, $expires);

$this->cookie->setCookie(new SetCookie(...)); //Set cookie Zend\Http\Header\SetCookie
```
