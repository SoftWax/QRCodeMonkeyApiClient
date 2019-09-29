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

class CustomQRCode extends AbstractQRCode
{
    /** @var CustomQRCodeConfig */
    private $config;

    /**
     * {@inheritdoc}
     */
    public function __construct(string $data, int $size = 300, string $file = 'png', bool $download = false)
    {
        parent::__construct($data, $size, $file, $download);
        $this->config = new CustomQRCodeConfig();
    }

    /**
     * @return CustomQRCodeConfig
     */
    public function getConfig(): CustomQRCodeConfig
    {
        return $this->config;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return \array_merge(
            parent::normalize(),
            [
                'config' => $this->config->normalize(),
            ]
        );
    }
}
