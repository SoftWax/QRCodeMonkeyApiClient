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

use SoftWax\QRCodeMonkeyApiClient\Helper\Arr;

class TransparentQRCode extends AbstractQRCode
{
    /** @var string|null */
    private $image;

    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /** @var bool */
    private $crop;

    /**
     * @param string|null $image
     * @return TransparentQRCode
     */
    public function setImage(?string $image): TransparentQRCode
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param int $x
     * @return TransparentQRCode
     */
    public function setX(int $x): TransparentQRCode
    {
        $this->x = $x;

        return $this;
    }

    /**
     * @param int $y
     * @return TransparentQRCode
     */
    public function setY(int $y): TransparentQRCode
    {
        $this->y = $y;

        return $this;
    }

    /**
     * @param bool $crop
     * @return TransparentQRCode
     */
    public function setCrop(bool $crop): TransparentQRCode
    {
        $this->crop = $crop;

        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return Arr::removeNullValues(
            \array_merge(
                parent::normalize(),
                [
                    'image' => $this->image,
                    'x' => $this->x,
                    'y' => $this->y,
                    'crop' => $this->crop,
                ]
            )
        );
    }
}
