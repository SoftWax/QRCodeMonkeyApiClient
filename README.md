# QR Code Monkey API Client

PHP client implementation of [QR Code Monkey API](https://www.qrcode-monkey.com)

## Installation

```bash
composer require softwax/qr-code-monkey-api-client php-http/guzzle6-adapter ^1.0
```

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
