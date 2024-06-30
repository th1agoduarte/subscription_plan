<?php

use Core\SeedWork\Domain\Validators\DomainValidator;
use Core\SeedWork\Domain\ValueObjects\EntityValidationException;

test('not should be empty', function () {  
    DomainValidator::validateString(value: '', fieldName: 'name');
})->throws(EntityValidationException::class, 'The field name is required');

test('not should be null', function () {  
    DomainValidator::notNull(value: null,fieldName: 'name');
})->throws(EntityValidationException::class, 'The field name is required');  

test('should be a valid email', function () {  
    DomainValidator::validateEmail(value: 'invalid-email',fieldName: 'email');
})->throws(EntityValidationException::class, 'The field email is invalid');

test('should be between 3 and 10 characters', function () {  
    DomainValidator::validateLenght(value: 'aa', min: 3, max: 10, fieldName: 'name');
})->throws(EntityValidationException::class, 'The field name must be between 3 and 10 characters');

test('should show customer message', function () {  
    DomainValidator::validateString(value: '', fieldName: 'name', message: 'Name is required');
})->throws(EntityValidationException::class, 'Name is required');
    
