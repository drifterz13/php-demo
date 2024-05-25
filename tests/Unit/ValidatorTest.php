<?php

use Core\Validator;

it('validate strings', function () {
    expect(Validator::string('foo'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
});

it('validate minimum length', function () {
    expect(Validator::string('foo', 20))->toBeFalse();
    expect(Validator::string('foo', 3))->toBeTrue();
});

it('validate email', function () {
    expect(Validator::email('test@test.com'))->toBeTrue();
    expect(Validator::email('notemail'))->toBeFalse();
});
