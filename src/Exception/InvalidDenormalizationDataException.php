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

namespace SoftWax\QRCodeMonkeyApiClient\Exception;

class InvalidDenormalizationDataException extends QRCodeMonkeyApiClientException
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param string $message
     * @param array $data
     * @return InvalidDenormalizationDataException
     */
    public static function create(string $message, array $data): InvalidDenormalizationDataException
    {
        $exception = new static($message);
        $exception->data = $data;

        return $exception;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
