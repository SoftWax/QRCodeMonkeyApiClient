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

final class Arr
{
    /**
     * @param array $data
     * @return array
     */
    public static function removeNullValues(array $data): array
    {
        return \array_filter(
            $data,
            static function ($value): bool {
                return $value !== null;
            }
        );
    }
}
