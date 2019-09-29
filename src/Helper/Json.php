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

namespace SoftWax\QRCodeMonkeyApiClient\Helper;

use SoftWax\QRCodeMonkeyApiClient\Exception\JsonException;

final class Json
{
    /**
     * @param mixed $value
     * @return string
     * @throws JsonException
     */
    public static function encode($value): string
    {
        $json = \json_encode($value);

        $jsonLastError = \json_last_error();
        if ($jsonLastError !== JSON_ERROR_NONE || $json === false) {
            throw new JsonException(\json_last_error_msg(), $jsonLastError);
        }

        return $json;
    }

    /**
     * @param string $json
     * @return array
     * @throws JsonException
     */
    public static function decode(string $json): array
    {
        $value = \json_decode($json, true);

        $jsonLastError = \json_last_error();
        if ($jsonLastError !== JSON_ERROR_NONE) {
            throw new JsonException(\json_last_error_msg(), $jsonLastError);
        }

        return $value;
    }
}
