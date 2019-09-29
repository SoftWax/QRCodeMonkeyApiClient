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

use SoftWax\QRCodeMonkeyApiClient\Helper\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    /**
     * @test
     * @dataProvider arrayProvider
     *
     * @param array $input
     * @param array $expectedOutput
     */
    public function removesNullValuesFromArray(array $input, array $expectedOutput): void
    {
        $this->assertSame($expectedOutput, Arr::removeNullValues($input));
    }

    /**
     * @return iterable
     */
    public function arrayProvider(): iterable
    {
        $obj = new \stdClass();

        yield [[], []];
        yield [[null], []];
        yield [[3 => null], []];
        yield [[3 => null, 'test'], [4 => 'test']];
        yield [['test'], ['test']];
        yield [[true, false, 1, 1.2, 'string', $obj, []], [true, false, 1, 1.2, 'string', $obj, []]];
        yield [['test' => [null, 123]], ['test' => [null, 123]]];
    }
}
