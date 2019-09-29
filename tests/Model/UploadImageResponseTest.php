<?php

/*
 * This file is part of the QR Code Monkey Api Client package.
 *
 * (c) SoftWax https://www.github.com/SoftWax
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoftWax\QRCodeMonkeyApiClient\Tests\Model;

use SoftWax\QRCodeMonkeyApiClient\Exception\InvalidDenormalizationDataException;
use SoftWax\QRCodeMonkeyApiClient\Model\UploadImageResponse;
use PHPUnit\Framework\TestCase;

class UploadImageResponseTest extends TestCase
{
    /**
     * @test
     * @dataProvider invalidDataProvider
     *
     * @param array $data
     */
    public function throwsExceptionOnInvalidDenormalizationData(array $data): void
    {
        $this->expectException(InvalidDenormalizationDataException::class);

        UploadImageResponse::denormalize($data);
    }

    /**
     * @return iterable
     */
    public function invalidDataProvider(): iterable
    {
        yield [[]];
        yield [['test']];
        yield [['file' => null]];
        yield [['file' => false]];
        yield [['file' => new \stdClass()]];
        yield [['file' => []]];
        yield [['file' => 1]];
        yield [['file' => 1.9]];
    }

    /**
     * @test
     */
    public function denormalizesDataToObject(): void
    {
        $response = UploadImageResponse::denormalize(['file' => 'random.png']);
        $this->assertSame('random.png', $response->getFile());
    }
}
