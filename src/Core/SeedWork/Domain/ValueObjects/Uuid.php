<?php

namespace Core\SeedWork\Domain\ValueObjects;

use Ramsey\Uuid\Uuid as UuidUuid;

class Uuid
{
    public function __construct(
        protected string $value
    )
    {
        $this->ensureIsValid($value);
    }

    public static function random(): self
    {
        return new self(UuidUuid::uuid4()->toString());
    }   

    public function ensureIsValid(string $value): void
    {
        if(!UuidUuid::isValid($value)){
            throw new \InvalidArgumentException("Invalid UUID");
        }
        
    }

    public function __tostring(): string
    {
        return $this->value;
    }

}
