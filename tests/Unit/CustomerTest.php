<?php

use Sfolador\HeidiPaySaloon\Models\Customer;

beforeEach(function () {
    $this->firstName = 'firstname';
    $this->lastName = 'lastname';
    $this->email = 'example@example.com';
    $this->title = 'mr.';
    $this->dateOfBirth = '2020-02-02';
    $this->contactNumber = '123456789';
    $this->companyName = 'companyName';
    $this->residence = 'residence';

    $this->customer = new Customer(
        email: $this->email, title: $this->title, firstname: $this->firstName, lastname: $this->lastName, dateOfBirth: $this->dateOfBirth, contactNumber: $this->contactNumber, companyName: $this->companyName, residence: $this->residence
    );
});

it('has a firstname', function () {
    expect($this->customer->firstname)->toBe($this->firstName);
});

it('has a lastname', function () {
    expect($this->customer->lastname)->toBe($this->lastName);
});

it('has an email', function () {
    expect($this->customer->email)->toBe($this->email);
});

it('can have a title', function () {
    expect($this->customer->title)->toBe($this->title);
});

it('can have a date of birth', function () {
    expect($this->customer->dateOfBirth)->toBe($this->dateOfBirth);
});

it('can have a contact number', function () {
    expect($this->customer->contactNumber)->toBe($this->contactNumber);
});

it('can have a company name', function () {
    expect($this->customer->companyName)->toBe($this->companyName);
});

it('can have a residence', function () {
    expect($this->customer->residence)->toBe($this->residence);
});

it('can be instantiated statically', function () {
    $customer = Customer::from(
        email: $this->email,
        title: $this->title,
        firstname: $this->firstName,
        lastname: $this->lastName,
        dateOfBirth: $this->dateOfBirth,
        contactNumber: $this->contactNumber,
        companyName: $this->companyName,
        residence: $this->residence
    );

    expect($customer->firstname)->toBe($this->firstName)
        ->and($customer->lastname)->toBe($this->lastName)
        ->and($customer->email)->toBe($this->email)
        ->and($customer->title)->toBe($this->title)
        ->and($customer->dateOfBirth)->toBe($this->dateOfBirth)
        ->and($customer->contactNumber)->toBe($this->contactNumber)
        ->and($customer->companyName)->toBe($this->companyName)
        ->and($customer->residence)->toBe($this->residence);
});
