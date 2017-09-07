<?php

namespace Puzzle\ValueObjects;

use Puzzle\Pieces\ConvertibleToString;

class SelfValidatedUuid implements ConvertibleToString, \JsonSerializable
{
    private
        $uuid;

    public function __construct($uuid = null)
    {
        if($uuid === null)
        {
            $uuid = (string) \Ramsey\Uuid\Uuid::uuid4();
        }
        else
        {
            $this->validateUuid($uuid);
        }

        $this->uuid = $uuid;
    }

    public function value()
    {
        return $this->uuid;
    }

    public function equals(SelfValidatedUuid $uuid)
    {
        return $this->uuid === $uuid->value();
    }

    public function __toString()
    {
        return $this->uuid;
    }

    private function validateUuid($string)
    {
        if(! is_string($string))
        {
            throw new Exceptions\InvalidUuid($string);
        }

        $validator = \Symfony\Component\Validator\Validation::createValidator();

        $errors = $validator->validate(
            $string,
            new \Symfony\Component\Validator\Constraints\Uuid()
        );

        if (count($errors) > 0)
        {
            throw new Exceptions\InvalidUuid($string);
        }
    }

    public function jsonSerialize()
    {
        return $this->value();
    }
}
