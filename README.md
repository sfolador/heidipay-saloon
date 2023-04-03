<img src="https://banners.beyondco.de/HeidiPay%20-%20Saloon.png?theme=light&packageManager=composer+require&packageName=sfolador%2Fheidipay-saloon&pattern=architect&style=style_1&description=Integrate+your+application+with+HeidiPay+using+Saloon&md=1&showWatermark=1&fontSize=100px&images=shopping-cart">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfolador/heidipay-saloon?style=flat-square)](https://packagist.org/packages/sfolador/heidipay-saloon)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sfolador/heidipay-saloon/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sfolador/heidipay-saloon/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sfolador/heidipay-saloon/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sfolador/heidipay-saloon/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sfolador/heidipay-saloon.svg?style=flat-square)](https://packagist.org/packages/sfolador/heidipay-saloon)

# Integrate your application with HeidiPay API using Saloon

This package provides a simple way to integrate your application with the [HeidiPay API](https://heidipay.com).


```php

use Sfolador\HeidiPaySaloon\Services\HeidiPay;
use Sfolador\HeidiPaySaloon\Dto\AuthDto;

$apiUrl = 'https://api.heidipay.com';

$heidipay = new HeidiPay(apiUrl: $apiUrl);

$authDto = AuthDto::from(merchantKey: "merchant-key");
$heidipay->auth($authDto);

//The next requests will use the token returned by the `auth` API


$contractResponse = $heidipay->contract($contractInitDto);

// the response is a `Response` object, you can get the DTO using the `dtoOrFail` method
$contractResponseDto = $contractResponse->dtoOrFail();

```

## Installation

You can install the package via composer:

```bash
composer require sfolador/heidipay-saloon
```

## Usage

### Auth

Before calling any of the API endpoint it is necessary to authenticate with the HeidiPay API and obtain a token.
Please read the official documentation at [HeidiPay API](https://heidipay.com) for more information.

```php

use Sfolador\HeidiPaySaloon\Services\HeidiPay;

$apiUrl = 'https://sandbox-origination.heidipay.com';

//for production use $apiUrl = 'https://api.heidipay.com'; 

$heidipay = new HeidiPay(apiUrl: $apiUrl);

$authDto = AuthDto::from(merchantKey: "merchant-key"); // the merchant key is provided by HeidiPay
$token = $heidipay->auth($authDto);

```

### Contract init

Initialize a new contract for a user. Please read the official documentation at [HeidiPay API](https://heidipay.com) for more information.

```php

use Sfolador\HeidiPaySaloon\Services\HeidiPay;

$heidipay = new HeidiPay(apiUrl: $apiUrl);

 $amount = new Amount(100, 'BRL', AmountFormat::MINOR_UNIT);
 $customer = new Customer(
        email: '', title: '', firstname: '', lastname: '', dateOfBirth: '', contactNumber: '', companyName: '', residence: ''
 );

$webhooks = new Webhooks(
    success: 'https://www.example.com',
    failure: 'https://www.example.com',
    cancel: 'https://www.example.com',
    status: 'https://www.example.com',
    mappingScheme: 'default'
);

$products = [new CreditInitProduct(
    sku: null,
    name: '',
    quantity: 1,
    price: '1.00',
    imageThumbnailUrl: null,
    imageOriginalUrl: null,
    description: null
)];

$contractInitDto = new ContractInitDto($this->amount, $this->customer, $this->webhooks, $this->products);

$contractResponse = $heidipay->contract($contractInitDto);

// the response is a `Response` object, you can get the DTO using the `dtoOrFail` method
$contractResponseDto = $contractResponse->dtoOrFail();

```


## Credits

- [sfolador](https://github.com/sfolador)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


