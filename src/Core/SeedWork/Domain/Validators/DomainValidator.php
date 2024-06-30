<?php

namespace Core\SeedWork\Domain\Validators;

use Core\SeedWork\Domain\Excepetions\EntityValidationException;

class DomainValidator{
    public static function validateString(string $value, ?string $fieldName = null,?string $message = null ): void
    {
        if (empty($value)) {
                
                if (is_null($message)) {
                    throw new EntityValidationException("The field $fieldName is required");
                }
    
                throw new EntityValidationException($message);
        }
    }

    public static function notNull($value, ?string $fieldName = null, ?string $message = null): void
    {
        if (is_null($value)) {

            if (is_null($message)) {
                throw new EntityValidationException("The field $fieldName is required");
            }

            throw new EntityValidationException($message);

        }
    }

    public static function validateEmail(string $value, ?string $fieldName = null, ?string $message = null): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            if (is_null($message)) {
                throw new EntityValidationException("The field $fieldName is invalid");
            }

            throw new EntityValidationException($message);
        }
    }

    public static function validateLenght(string $value, int $min, int $max, ?string $fieldName = null, ?string $message = null): void
    {
        if (strlen($value) < $min || strlen($value) > $max) {
            if (is_null($message)) {
                throw new EntityValidationException("The field $fieldName must be between $min and $max characters");
            }

            throw new EntityValidationException($message);
        }
    }
}
