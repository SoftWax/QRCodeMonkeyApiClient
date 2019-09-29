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

namespace SoftWax\QRCodeMonkeyApiClient\Exception;

use Psr\Http\Message\ResponseInterface;

class ResponseException extends QRCodeMonkeyApiClientException
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     * @return ResponseException
     */
    public static function create(ResponseInterface $response): ResponseException
    {
        $exception = new static($response->getReasonPhrase(), $response->getStatusCode());
        $exception->response = $response;

        return $exception;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
