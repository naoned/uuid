<?php

declare(strict_types = 1);

namespace Puzzle\ValueObjects;

use PHPUnit\Framework\TestCase;
use Puzzle\ValueObjects\Exceptions\InvalidUuid;

class SelfValidatedUuidTest extends TestCase
{
    public function testCompareNewUuid(): void
    {
        $uuid1 = new Uuid();
        $uuid2 = new Uuid();

        $this->assertFalse($uuid1->equals($uuid2));
    }

    public function testCompareSameUuid(): void
    {
        $uuidValue = (string) \Ramsey\Uuid\Uuid::uuid4();

        $uuid1 = new Uuid($uuidValue);
        $uuid2 = new Uuid($uuidValue);

        $this->assertTrue($uuid1->equals($uuid2));
    }

    public function testCompareDifferentUuid(): void
    {
        $uuidValue1 = (string) \Ramsey\Uuid\Uuid::uuid4();
        $uuidValue2 = (string) \Ramsey\Uuid\Uuid::uuid4();

        $uuid1 = new Uuid($uuidValue1);
        $uuid2 = new Uuid($uuidValue2);

        $this->assertFalse($uuid1->equals($uuid2));
    }

    public function testToString(): void
    {
        $uuid1 = new Uuid();
        $uuid2 = new Uuid((string) $uuid1);

        $this->assertTrue($uuid1->equals($uuid2));
    }

    public function testValue()
    {
        $uuid1 = new Uuid('0e53559b-7149-43a4-8666-f9802d759580');

        $this->assertSame('0e53559b-7149-43a4-8666-f9802d759580', $uuid1->value());
    }

    /**
     * @dataProvider providerTestInvalidUuid
     */
    public function testInvalidUuid(string $uuid): void
    {
        $this->expectException(InvalidUuid::class);
        new Uuid($uuid);
    }

    public function providerTestInvalidUuid(): array
    {
        return [
            'empty' => [''],
            'blank' => ['   '],
            'random string' => ['pony'],
            'illegal char' => ['e41157f8-9555-486e-a4f4-4890392224ay'],
            'too short' => ['e41157f8-9555-486e-a4f4-48'],
        ];
    }

    /**
     * @dataProvider providerTestEquals
     */
    public function testEquals(bool $expected, ?string $id1, ?string $id2): void
    {
        $uuid1 = new Uuid($id1);
        $uuid2 = new Uuid($id2);

        $this->assertSame($expected, $uuid1->equals($uuid2));
    }

    public function providerTestEquals(): array
    {
        return [
            [false, null, null],
            [false, null, '1163c8e7-4a15-452a-8026-88bdc6e12a80'],
            [false, '1163c8e7-4a15-452a-8026-88bdc6e12a80', null],
            [false, '1163c8e7-4a15-452a-8026-88bdc6e12a80', '8c804f96-5e81-491c-9543-dca9212a76af'],
            [true, '1163c8e7-4a15-452a-8026-88bdc6e12a80', '1163c8e7-4a15-452a-8026-88bdc6e12a80'],
        ];
    }

    public function testJsonSerialize(): void
    {
        $uuid = new Uuid();
        $this->assertSame($uuid->value(), $uuid->jsonSerialize());
    }
}
