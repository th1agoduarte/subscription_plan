<?php

namespace Core\Plan\Domain;

use Core\SeedWork\Domain\ValueObjects\Uuid;

class Plan
{
    public function __construct(
        protected ?Uuid $id,
        protected string $name,
        protected string $description,
    )
    {
        $this->id = $id ?? Uuid::random();
    }

    public function __get($name)
    {
        return $this->{$name};
    }

    public function id():string
    {
        return $this->id;
    }

    
}
