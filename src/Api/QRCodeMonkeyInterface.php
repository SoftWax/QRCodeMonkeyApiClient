<?php

/*
 * This file is part of the QR Code Monkey Api Client package.
 *
 * (c) SoftWax https://www.github.com/SoftWax
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace SoftWax\QRCodeMonkeyApiClient\Api;

use Psr\Http\Message\StreamInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use SoftWax\QRCodeMonkeyApiClient\Exception\QRCodeMonkeyApiClientException;
use SoftWax\QRCodeMonkeyApiClient\Model\CustomQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\TransparentQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\UploadImageResponse;

interface QRCodeMonkeyInterface
{
    public const RAPID_API_HOST = 'qrcode-monkey.p.rapidapi.com';
    public const BASE_URL = 'https://qrcode-monkey.p.rapidapi.com';
    public const CREATE_CUSTOM_URL = self::BASE_URL . '/qr/custom';
    public const CREATE_TRANSPARENT_URL = self::BASE_URL . '/qr/transparent';
    public const UPLOAD_IMAGE_URL = self::BASE_URL . '/qr/uploadImage';

    /**
     * @param CustomQRCode $QRCode
     * @return StreamInterface
     * @throws QRCodeMonkeyApiClientException
     */
    public function createCustom(CustomQRCode $QRCode): StreamInterface;

    /**
     * @param TransparentQRCode $QRCode
     * @return StreamInterface
     * @throws QRCodeMonkeyApiClientException
     */
    public function createTransparent(TransparentQRCode $QRCode): StreamInterface;

    /**
     * @param string $imageFilePath
     * @return UploadImageResponse
     * @throws QRCodeMonkeyApiClientException
     */
    public function uploadImage(string $imageFilePath): UploadImageResponse;

    /**
     * @param LoggerInterface|null $logger
     * @param string $level
     */
    public function logTo(?LoggerInterface $logger, string $level = LogLevel::DEBUG);
}
