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

class CustomQRCodeConfig
{
    /** @var string */
    private $body;

    /** @var string */
    private $eye;

    /** @var string */
    private $eyeBall;

    /** @var array */
    private $erf1;

    /** @var array */
    private $erf2;

    /** @var array */
    private $erf3;

    /** @var array */
    private $brf1;

    /** @var array */
    private $brf2;

    /** @var array */
    private $brf3;

    /** @var string */
    private $bodyColor;

    /** @var string */
    private $bgColor;

    /** @var string */
    private $eye1Color;

    /** @var string */
    private $eye2Color;

    /** @var string */
    private $eye3Color;

    /** @var string */
    private $eyeBall1Color;

    /** @var string */
    private $eyeBall2Color;

    /** @var string */
    private $eyeBall3Color;

    /** @var string|null */
    private $gradientColor1;

    /** @var string|null */
    private $gradientColor2;

    /** @var string */
    private $gradientType;

    /** @var bool */
    private $gradientOnEyes;

    /** @var string|null */
    private $logo;

    /** @var string */
    private $logoMode;

    /**
     * @param string $body
     * @return CustomQRCodeConfig
     */
    public function setBody(string $body): CustomQRCodeConfig
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string $eye
     * @return CustomQRCodeConfig
     */
    public function setEye(string $eye): CustomQRCodeConfig
    {
        $this->eye = $eye;

        return $this;
    }

    /**
     * @param string $eyeBall
     * @return CustomQRCodeConfig
     */
    public function setEyeBall(string $eyeBall): CustomQRCodeConfig
    {
        $this->eyeBall = $eyeBall;

        return $this;
    }

    /**
     * @param array $erf1
     * @return CustomQRCodeConfig
     */
    public function setErf1(array $erf1): CustomQRCodeConfig
    {
        $this->erf1 = $erf1;

        return $this;
    }

    /**
     * @param array $erf2
     * @return CustomQRCodeConfig
     */
    public function setErf2(array $erf2): CustomQRCodeConfig
    {
        $this->erf2 = $erf2;

        return $this;
    }

    /**
     * @param array $erf3
     * @return CustomQRCodeConfig
     */
    public function setErf3(array $erf3): CustomQRCodeConfig
    {
        $this->erf3 = $erf3;

        return $this;
    }

    /**
     * @param array $brf1
     * @return CustomQRCodeConfig
     */
    public function setBrf1(array $brf1): CustomQRCodeConfig
    {
        $this->brf1 = $brf1;

        return $this;
    }

    /**
     * @param array $brf2
     * @return CustomQRCodeConfig
     */
    public function setBrf2(array $brf2): CustomQRCodeConfig
    {
        $this->brf2 = $brf2;

        return $this;
    }

    /**
     * @param array $brf3
     * @return CustomQRCodeConfig
     */
    public function setBrf3(array $brf3): CustomQRCodeConfig
    {
        $this->brf3 = $brf3;

        return $this;
    }

    /**
     * @param string $bodyColor
     * @return CustomQRCodeConfig
     */
    public function setBodyColor(string $bodyColor): CustomQRCodeConfig
    {
        $this->bodyColor = $bodyColor;

        return $this;
    }

    /**
     * @param string $bgColor
     * @return CustomQRCodeConfig
     */
    public function setBgColor(string $bgColor): CustomQRCodeConfig
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    /**
     * @param string $eye1Color
     * @return CustomQRCodeConfig
     */
    public function setEye1Color(string $eye1Color): CustomQRCodeConfig
    {
        $this->eye1Color = $eye1Color;

        return $this;
    }

    /**
     * @param string $eye2Color
     * @return CustomQRCodeConfig
     */
    public function setEye2Color(string $eye2Color): CustomQRCodeConfig
    {
        $this->eye2Color = $eye2Color;

        return $this;
    }

    /**
     * @param string $eye3Color
     * @return CustomQRCodeConfig
     */
    public function setEye3Color(string $eye3Color): CustomQRCodeConfig
    {
        $this->eye3Color = $eye3Color;

        return $this;
    }

    /**
     * @param string $eyeBall1Color
     * @return CustomQRCodeConfig
     */
    public function setEyeBall1Color(string $eyeBall1Color): CustomQRCodeConfig
    {
        $this->eyeBall1Color = $eyeBall1Color;

        return $this;
    }

    /**
     * @param string $eyeBall2Color
     * @return CustomQRCodeConfig
     */
    public function setEyeBall2Color(string $eyeBall2Color): CustomQRCodeConfig
    {
        $this->eyeBall2Color = $eyeBall2Color;

        return $this;
    }

    /**
     * @param string $eyeBall3Color
     * @return CustomQRCodeConfig
     */
    public function setEyeBall3Color(string $eyeBall3Color): CustomQRCodeConfig
    {
        $this->eyeBall3Color = $eyeBall3Color;

        return $this;
    }

    /**
     * @param string|null $gradientColor1
     * @return CustomQRCodeConfig
     */
    public function setGradientColor1(?string $gradientColor1): CustomQRCodeConfig
    {
        $this->gradientColor1 = $gradientColor1;

        return $this;
    }

    /**
     * @param string|null $gradientColor2
     * @return CustomQRCodeConfig
     */
    public function setGradientColor2(?string $gradientColor2): CustomQRCodeConfig
    {
        $this->gradientColor2 = $gradientColor2;

        return $this;
    }

    /**
     * @param string $gradientType
     * @return CustomQRCodeConfig
     */
    public function setGradientType(string $gradientType): CustomQRCodeConfig
    {
        $this->gradientType = $gradientType;

        return $this;
    }

    /**
     * @param bool $gradientOnEyes
     * @return CustomQRCodeConfig
     */
    public function setGradientOnEyes(bool $gradientOnEyes): CustomQRCodeConfig
    {
        $this->gradientOnEyes = $gradientOnEyes;

        return $this;
    }

    /**
     * @param string|null $logo
     * @return CustomQRCodeConfig
     */
    public function setLogo(?string $logo): CustomQRCodeConfig
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @param string $logoMode
     * @return CustomQRCodeConfig
     */
    public function setLogoMode(string $logoMode): CustomQRCodeConfig
    {
        $this->logoMode = $logoMode;

        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return Arr::removeNullValues(
            [
                'body' => $this->body,
                'eye' => $this->eye,
                'eyeBall' => $this->eyeBall,
                'erf1' => $this->erf1,
                'erf2' => $this->erf2,
                'erf3' => $this->erf3,
                'brf1' => $this->brf1,
                'brf2' => $this->brf2,
                'brf3' => $this->brf3,
                'bodyColor' => $this->bodyColor,
                'bgColor' => $this->bgColor,
                'eye1Color' => $this->eye1Color,
                'eye2Color' => $this->eye2Color,
                'eye3Color' => $this->eye3Color,
                'eyeBall1Color' => $this->eyeBall1Color,
                'eyeBall2Color' => $this->eyeBall2Color,
                'eyeBall3Color' => $this->eyeBall3Color,
                'gradientColor1' => $this->gradientColor1,
                'gradientColor2' => $this->gradientColor2,
                'gradientType' => $this->gradientType,
                'gradientOnEyes' => $this->gradientOnEyes,
                'logo' => $this->logo,
                'logoMode' => $this->logoMode,
            ]
        );
    }
}
