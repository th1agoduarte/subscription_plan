<?php

use Core\SeedWork\Domain\ValueObjects\EntityValidationException;
use Core\SeedWork\Domain\ValueObjects\Uuid;
use Ramsey\Uuid\Uuid as RamseyUuid;

test('can be instantiated with a valid UUID', function () {
    $validUuid = RamseyUuid::uuid4()->toString();
    $uuid = new Uuid($validUuid);
    expect($uuid->__tostring())->toBe($validUuid);
});

test('throws an exception when instantiated with an invalid UUID', function () {
    new Uuid('invalid-uuid');
})->throws(EntityValidationException::class, 'Invalid UUID');

test('can generate a random UUID', function () {
    $uuid = Uuid::random();
    expect(RamseyUuid::isValid((string)$uuid))->toBeTrue();
});

test('returns the UUID as a string', function () {
    $uuidString = RamseyUuid::uuid4()->toString();
    $uuid = new Uuid($uuidString);
    expect((string)$uuid)->toBe($uuidString);
});
