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

namespace SoftWax\QRCodeMonkeyApiClient\Logger;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger
{
    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * @var string
     */
    private $level;

    /**
     * @param LoggerInterface|null $logger
     * @param string $level
     */
    public function __construct(
        ?LoggerInterface $logger = null,
        string $level = LogLevel::DEBUG
    ) {
        $this->logger = $logger;
        $this->level = $level;
    }

    /**
     * @return LoggerInterface|null
     */
    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param LoggerInterface|null $logger
     * @return self
     */
    public function setLogger(?LoggerInterface $logger): self
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @param string $level
     * @return self
     */
    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @param $message
     * @param array $context
     */
    public function log($message, array $context = array())
    {
        if ($this->logger === null) {
            return;
        }

        $this->logger->log(
            $this->level,
            $message,
            $context
        );
    }

    /**
     * @param RequestInterface $request
     */
    public function logRequest(RequestInterface $request)
    {
        $this->log(
            'QR Monkey API Request',
            [
                'url' => $request->getRequestTarget(),
                'method' => $request->getMethod(),
                'headers' => $request->getHeaders(),
                'body' => $request->getBody()
            ]
        );
    }

    /**
     * @param ResponseInterface $response
     */
    public function logResponse(ResponseInterface $response)
    {
        $this->log(
            'QR Monkey API Response',
            [
                'code' => $response->getStatusCode(),
                'headers' => $response->getHeaders(),
                'body' => $response->getBody()
            ]
        );
    }
}
