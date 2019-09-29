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

abstract class AbstractQRCode
{
    /** @var string */
    private $data;

    /** @var int */
    private $size;

    /** @var string */
    private $file;

    /** @var bool */
    private $download;

    /**
     * @param string $data
     * @param int $size
     * @param string $file
     * @param bool $download
     */
    public function __construct(string $data, int $size = 300, string $file = 'png', bool $download = false)
    {
        $this->data = $data;
        $this->size = $size;
        $this->file = $file;
        $this->download = $download;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'data' => $this->data,
            'size' => $this->size,
            'file' => $this->file,
            'download' => $this->download,
        ];
    }
}
