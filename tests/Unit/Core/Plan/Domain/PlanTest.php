<?php

use Core\Plan\Domain\Plan;
use Core\SeedWork\Domain\ValueObjects\Uuid;

test('should create a plan', function () {
    $uuid = Uuid::random();
    $plan = new Plan(
        id: $uuid,
        name: 'Plan 1',
        description: 'Description of plan 1',
    );

    expect($plan->id)->toBe($uuid);
    expect($plan->id())->toBeString();
    expect($plan->name)->toBe('Plan 1');
    expect($plan->description)->toBe('Description of plan 1');
    
});

test('should create a plan without id', function () {
    $plan = new Plan(
        id: null,
        name: 'Plan 1',
        description: 'Description of plan 1',
    );

    expect($plan->id)->toBeInstanceOf(Uuid::class);
    expect($plan->id())->toBeString();
    expect($plan->name)->toBe('Plan 1');
    expect($plan->description)->toBe('Description of plan 1');
    
});
