<?php

declare(strict_types = 1);

namespace Puzzle\ValueObjects;

use PHPUnit\Framework\TestCase;

class SelfValidatedUuidTest extends TestCase
{
    public function testCompareNewUuid()
    {
        $uuid1 = new Uuid();
        $uuid2 = new Uuid();

        $this->assertFalse($uuid1 == $uuid2);
    }

    public function testCompareSameUuid()
    {
        $uuidValue = (string) \Ramsey\Uuid\Uuid::uuid4();

        $uuid1 = new Uuid($uuidValue);
        $uuid2 = new Uuid($uuidValue);

        $this->assertTrue($uuid1 == $uuid2);
    }

    public function testCompareDifferentUuid()
    {
        $uuidValue1 = (string) \Ramsey\Uuid\Uuid::uuid4();
        $uuidValue2 = (string) \Ramsey\Uuid\Uuid::uuid4();

        $uuid1 = new Uuid($uuidValue1);
        $uuid2 = new Uuid($uuidValue2);

        $this->assertFalse($uuid1 == $uuid2);
    }

    public function testToString()
    {
        $uuid1 = new Uuid();
        $uuid2 = new Uuid((string) $uuid1);

        $this->assertTrue($uuid1 == $uuid2);
    }

    public function testValue()
    {
        $uuid1 = new Uuid();

        $this->assertInternalType('string', $uuid1->value());
    }

    /**
     * @expectedException \Puzzle\ValueObjects\Exceptions\InvalidUuid
     */
    public function testInvalidUuid()
    {
        new Uuid('oui');
    }
}
