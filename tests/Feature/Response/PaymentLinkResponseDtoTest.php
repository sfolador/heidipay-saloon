<?php

use Sfolador\HeidiPaySaloon\Dto\Response\PaymentLinkResponseDto;

beforeEach(function () {
    $this->payment_link_url = 'payment_link_url';
    $this->paymentLinkResponseDto = new PaymentLinkResponseDto(payment_link_url: $this->payment_link_url);
});

it('has a payment link', function () {
    expect($this->paymentLinkResponseDto->payment_link_url)->toBe($this->payment_link_url);
});
