Puzzle Uuid  ![PHP >= 5.6](https://img.shields.io/badge/php-%3E%3D%205.6-blue.svg)
=========== 

Branch 1.x is for PHP 5.6 users

QA
--

Service | Result
--- | ---
**Travis CI** (PHP 5.6) | [![Build Status](https://travis-ci.org/puzzle-org/uuid.svg?branch=php56)](https://travis-ci.org/puzzle-org/uuid)
**Scrutinizer** | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/puzzle-org/uuid/badges/quality-score.png?b=php56)](https://scrutinizer-ci.com/g/puzzle-org/uuid/?branch=php56)
**Code coverage** | [![codecov](https://codecov.io/gh/puzzle-org/uuid/branch/php56/graph/badge.svg)](https://codecov.io/gh/puzzle-org/uuid)
**Packagist** | [![Latest Stable Version](https://poser.pugx.org/puzzle/uuid/v/stable.png)](https://packagist.org/packages/puzzle/uuid) [![Total Downloads](https://poser.pugx.org/puzzle/uuid/downloads.svg)](https://packagist.org/packages/puzzle/uuid)


Example
-------

Value object for Uuids

```php
<?php

// Generate a valid uuid
$uuid = new Uuid();

// Force uuid value
$uuid = new Uuid('b85873d1-7968-4f83-94f7-3bb6bc111828');

function foo(Uuid $uuid)
{
    // $uuid is valid !
}

```

Make your own uuid classes : 

```php
<?php

final class PonyId extends SelfValidatedUuid {}

class Pony
{
    private $id;

    public function __construct(PonyId $id = null)
    {
        if($id === null)
        {
            $id = new PonyId();
        }
        
        $this->id = $id;
    }
    
    //...
}

```


Changelog
---------

No BC breaks yet
