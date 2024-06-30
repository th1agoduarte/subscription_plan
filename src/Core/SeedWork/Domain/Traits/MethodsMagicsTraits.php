<?php

namespace Core\SeedWork\Domain\Traits;

trait MethodsMagicsTraits{
    
    public function __get($name)
    {
        return $this->{$name};
    }

    public function id():string
    {
        return $this->id;
    }
}
