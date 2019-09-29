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

namespace SoftWax\QRCodeMonkeyApiClient\Model;

use SoftWax\QRCodeMonkeyApiClient\Exception\InvalidDenormalizationDataException;

class UploadImageResponse
{
    /**
     * @var string
     */
    private $file;

    /**
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param array $data
     * @return UploadImageResponse
     * @throws InvalidDenormalizationDataException
     */
    public static function denormalize(array $data): UploadImageResponse
    {
        if (!isset($data['file']) || !\is_string($data['file'])) {
            throw InvalidDenormalizationDataException::create('file key not found or is not a string', $data);
        }

        return new self($data['file']);
    }
}
