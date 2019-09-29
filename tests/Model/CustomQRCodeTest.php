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

use SoftWax\QRCodeMonkeyApiClient\Model\CustomQRCode;
use PHPUnit\Framework\TestCase;

class CustomQRCodeTest extends TestCase
{
    /**
     * @test
     */
    public function normalizesMinimumDataObject(): void
    {
        $code = new CustomQRCode('test data');

        $this->assertSame(
            [
                'data' => 'test data',
                'size' => 300,
                'file' => 'png',
                'download' => false,
                'config' => [],
            ],
            $code->normalize()
        );
    }

    /**
     * @test
     */
    public function normalizesObject(): void
    {
        $code = new CustomQRCode('test data', 1000, 'svg', true);
        $codeConfig = $code->getConfig();
        $codeConfig->setBody('mosaic');
        $codeConfig->setEye('frame3');
        $codeConfig->setEyeBall('ball7');
        $codeConfig->setErf1(['fv', 'fh']);
        $codeConfig->setErf2(['fh']);
        $codeConfig->setErf3(['fv']);
        $codeConfig->setBrf1(['fh', 'fv']);
        $codeConfig->setBrf2(['fv']);
        $codeConfig->setBrf3(['fh']);
        $codeConfig->setBodyColor('#ff0000');
        $codeConfig->setBgColor('#00ff00');
        $codeConfig->setEye1Color('#111111');
        $codeConfig->setEye2Color('#222222');
        $codeConfig->setEye3Color('#333333');
        $codeConfig->setEyeBall1Color('#ff1111');
        $codeConfig->setEyeBall2Color('#ff2222');
        $codeConfig->setEyeBall3Color('#ff3333');
        $codeConfig->setGradientColor1('#11ff11');
        $codeConfig->setGradientColor2('#22ff22');
        $codeConfig->setGradientType('linear');
        $codeConfig->setGradientOnEyes(true);
        $codeConfig->setLogo('logo_img.png');
        $codeConfig->setLogoMode('clean');

        $this->assertSame(
            [
                'data' => 'test data',
                'size' => 1000,
                'file' => 'svg',
                'download' => true,
                'config' => [
                    'body' => 'mosaic',
                    'eye' => 'frame3',
                    'eyeBall' => 'ball7',
                    'erf1' => ['fv', 'fh'],
                    'erf2' => ['fh'],
                    'erf3' => ['fv'],
                    'brf1' => ['fh', 'fv'],
                    'brf2' => ['fv'],
                    'brf3' => ['fh'],
                    'bodyColor' => '#ff0000',
                    'bgColor' => '#00ff00',
                    'eye1Color' => '#111111',
                    'eye2Color' => '#222222',
                    'eye3Color' => '#333333',
                    'eyeBall1Color' => '#ff1111',
                    'eyeBall2Color' => '#ff2222',
                    'eyeBall3Color' => '#ff3333',
                    'gradientColor1' => '#11ff11',
                    'gradientColor2' => '#22ff22',
                    'gradientType' => 'linear',
                    'gradientOnEyes' => true,
                    'logo' => 'logo_img.png',
                    'logoMode' => 'clean',
                ],
            ],
            $code->normalize()
        );
    }
}
