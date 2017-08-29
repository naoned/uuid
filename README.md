Puzzle Assert  ![PHP >= 5.6](https://img.shields.io/badge/php-%3E%3D%205.6-blue.svg)
=============

Assertions for PHPUnit 

QA
--

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c22e1773-23cb-431c-bf22-78be3046cb1d/big.png)](https://insight.sensiolabs.com/projects/c22e1773-23cb-431c-bf22-78be3046cb1d)

Service | Result
--- | ---
**Travis CI** (PHP 5.6 .. 7.1) | [![Build Status](https://travis-ci.org/puzzle-org/assert.svg?branch=master)](https://travis-ci.org/puzzle-org/assert)
**Scrutinizer** | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/puzzle-org/assert/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/puzzle-org/assert/?branch=master)
**Code coverage** | [![codecov](https://codecov.io/gh/puzzle-org/assert/branch/master/graph/badge.svg)](https://codecov.io/gh/puzzle-org/assert)
**Packagist** | [![Latest Stable Version](https://poser.pugx.org/puzzle/assert/v/stable.png)](https://packagist.org/packages/puzzle/assert) [![Total Downloads](https://poser.pugx.org/puzzle/assert/downloads.svg)](https://packagist.org/packages/puzzle/assert)


Example
-------

```php
<?php

class PonyTest extends \PHPUnit_Framework_TestCase
{
    use \Puzzle\Assert\ArrayRelated;
    
    public function testRetrieveUnicorn()
    {
        // ...
        $this->assertSameArrayExceptOrder([1, 2, 3, 4], $result);
    }
}
```


Changelog
---------

No BC breaks yet
