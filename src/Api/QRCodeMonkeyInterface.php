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
use SoftWax\QRCodeMonkeyApiClient\Exception\QRCodeMonkeyApiClientException;
use SoftWax\QRCodeMonkeyApiClient\Model\CustomQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\TransparentQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\UploadImageResponse;

interface QRCodeMonkeyInterface
{
    public const BASE_URL = 'https://qr-generator.qrcode.studio';
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
     * @param string|resource|StreamInterface $imageFile
     * @return UploadImageResponse
     * @throws QRCodeMonkeyApiClientException
     */
    public function uploadImage($imageFile): UploadImageResponse;
}
