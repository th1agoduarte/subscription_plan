<?php

namespace Core\Plan\Domain;

use Core\SeedWork\Domain\ValueObjects\Uuid;
use Core\SeedWork\Domain\Traits\MethodsMagicsTraits;

class Plan
{

    use MethodsMagicsTraits;

    public function __construct(
        protected ?Uuid $id,
        protected string $name,
        protected string $description,
    )
    {
        $this->id = $id ?? Uuid::random();
    }


    
}
