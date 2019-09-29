<?php

/*
 * This file is part of the QR Code Monkey Api Client package.
 *
 * (c) SoftWax https://www.github.com/SoftWax
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoftWax\QRCodeMonkeyApiClient\Tests\Helper;

use SoftWax\QRCodeMonkeyApiClient\Exception\JsonException;
use PHPUnit\Framework\TestCase;
use SoftWax\QRCodeMonkeyApiClient\Helper\Json;

class JsonTest extends TestCase
{
    /**
     * @test
     */
    public function encodeThrowsException(): void
    {
        $this->expectException(JsonException::class);

        Json::encode(\fopen(__DIR__ . '/JsonTest.php', 'rb'));
    }

    /**
     * @test
     */
    public function successfullyEncodesValue(): void
    {
        $this->assertSame(
            '{"0":"test","new":[123]}',
            Json::encode(['test', 'new' => [123]])
        );
    }

    /**
     * @test
     */
    public function decodeThrowsException(): void
    {
        $this->expectException(JsonException::class);

        Json::decode('invalid json string');
    }

    public function successfullyDecodesJson(): void
    {
        $this->assertSame(
            ['test', 'new' => [123]],
            Json::decode('{"0":"test","new":[123]}')
        );
    }
}
