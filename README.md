# QR Code Monkey API Client

[![Build Status](https://travis-ci.org/SoftWax/QRCodeMonkeyApiClient.svg?branch=master)](https://travis-ci.org/SoftWax/QRCodeMonkeyApiClient)

PHP client implementation of [QR Code Monkey API](https://www.qrcode-monkey.com)

## Installation

```bash
composer require softwax/qr-code-monkey-api-client php-http/guzzle6-adapter ^1.0
```

`softwax/qr-code-monkey-api-client:^1.0` version is using base qr code studio endpoint which is not suitable for live/production usage and has requests limit.
For live/production please use `softwax/qr-code-monkey-api-client:^2.0` version which requires [rapid api key](https://rapidapi.com).

## Usage

```php
use SoftWax\QRCodeMonkeyApiClient\Api\QRCodeMonkeyInterface;
use SoftWax\QRCodeMonkeyApiClient\Api\QRCodeMonkeyFactory;
use SoftWax\QRCodeMonkeyApiClient\Model\CustomQRCode;
use Psr\Http\Message\StreamInterface;

/** @var QRCodeMonkeyInterface $api */
$api = QRCodeMonkeyFactory::create():

/** @var StreamInterface $qrCodeImageStream */
$qrCodeImageStream = $api->createCustom(new CustomQRCode('my qr code data'));
```

## License

[The MIT License](LICENSE)
