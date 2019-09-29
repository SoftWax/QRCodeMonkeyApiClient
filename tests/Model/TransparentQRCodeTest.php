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

use SoftWax\QRCodeMonkeyApiClient\Model\TransparentQRCode;
use PHPUnit\Framework\TestCase;

class TransparentQRCodeTest extends TestCase
{
    /**
     * @test
     */
    public function normalizesMinimumDataObject(): void
    {
        $code = new TransparentQRCode('test data');

        $this->assertSame(
            [
                'data' => 'test data',
                'size' => 300,
                'file' => 'png',
                'download' => false,
            ],
            $code->normalize()
        );
    }

    /**
     * @test
     */
    public function normalizesObject(): void
    {
        $code = new TransparentQRCode('test data', 1000, 'svg', true);
        $code->setImage('image.png');
        $code->setCrop(true);
        $code->setX(19);
        $code->setY(12);

        $this->assertSame(
            [
                'data' => 'test data',
                'size' => 1000,
                'file' => 'svg',
                'download' => true,
                'image' => 'image.png',
                'x' => 19,
                'y' => 12,
                'crop' => true,

            ],
            $code->normalize()
        );
    }
}
