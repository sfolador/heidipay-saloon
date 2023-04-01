<?php

use Sfolador\HeidiPaySaloon\Models\Customer;

it('has a firstname', function () {
    $firstName = "firstname";
    $customer = new Customer(
        email: "",title: "",firstname: $firstName,lastname: "",dateOfBirth: "",contactNumber: "",companyName: "",residence: ""
    );

    expect($customer->firstname)->toBe($firstName);
});

it('has a lastname', function () {
    $lastname = "lastname";
    $customer = new Customer(
        email: "",title: "",firstname: "",lastname: $lastname,dateOfBirth: "",contactNumber: "",companyName: "",residence: ""
    );

    expect($customer->lastname)->toBe($lastname);
});

it('has an email', function () {
    $email = "email@example.com";
    $customer = new Customer(
        email: $email,title: "",firstname: "",lastname: "",dateOfBirth: "",contactNumber: "",companyName: "",residence: ""
    );

    expect($customer->email)->toBe($email);
});

it('can have a title', function () {
    $title = "mr.";
    $customer = new Customer(
        email: "",title: $title,firstname: "",lastname: "",dateOfBirth: "",contactNumber: "",companyName: "",residence: ""
    );

    expect($customer->title)->toBe($title);
});

it('can have a date of birth', function () {
    $dateOfBirth = "2020-02-02";
    $customer = new Customer(
        email: "",title: "",firstname: "",lastname: "",dateOfBirth: $dateOfBirth,contactNumber: "",companyName: "",residence: ""
    );

    expect($customer->dateOfBirth)->toBe($dateOfBirth);
});

it('can have a contact number', function () {
    $contact = "+000000000000";
    $customer = new Customer(
        email: "",title: "",firstname: "",lastname: "",dateOfBirth: "",contactNumber: $contact,companyName: "",residence: ""
    );

    expect($customer->contactNumber)->toBe($contact);
});

it('can have a company name', function () {

    $companyName = "company";
    $customer = new Customer(
        email: "",title: "",firstname: "",lastname: "",dateOfBirth: "",contactNumber: "",companyName: $companyName,residence: ""
    );

    expect($customer->companyName)->toBe($companyName);

});
it('can have a residence', function () {
    $residence = "italy";
    $customer = new Customer(
        email: "",title: "",firstname: "",lastname: "",dateOfBirth: "",contactNumber: "",companyName: "",residence: $residence
    );

    expect($customer->residence)->toBe($residence);
});
