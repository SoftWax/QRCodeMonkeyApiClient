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

namespace SoftWax\QRCodeMonkeyApiClient\Api;

use Http\Client\HttpClient;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use SoftWax\QRCodeMonkeyApiClient\Exception\JsonException;
use SoftWax\QRCodeMonkeyApiClient\Exception\QRCodeMonkeyApiClientException;
use SoftWax\QRCodeMonkeyApiClient\Exception\ResponseException;
use SoftWax\QRCodeMonkeyApiClient\Helper\Json;
use SoftWax\QRCodeMonkeyApiClient\Model\AbstractQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\CustomQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\TransparentQRCode;
use SoftWax\QRCodeMonkeyApiClient\Model\UploadImageResponse;

final class QRCodeMonkey implements QRCodeMonkeyInterface
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @param HttpClient $httpClient
     * @param RequestFactoryInterface $requestFactory
     * @param StreamFactoryInterface $streamFactory
     */
    public function __construct(
        HttpClient $httpClient,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function createCustom(CustomQRCode $QRCode): StreamInterface
    {
        return $this->createQRCode($QRCode, self::CREATE_CUSTOM_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function createTransparent(TransparentQRCode $QRCode): StreamInterface
    {
        return $this->createQRCode($QRCode, self::CREATE_TRANSPARENT_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function uploadImage($imageFile): UploadImageResponse
    {
        $builder = new MultipartStreamBuilder($this->streamFactory);
        $builder->addResource('file', $imageFile);
        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();

        $request = $this->requestFactory->createRequest('POST', self::UPLOAD_IMAGE_URL);
        $request = $request->withHeader('Content-Type', \sprintf('multipart/form-data; boundary="%s"', $boundary));
        $request = $request->withBody($multipartStream);

        $response = $this->sendRequest($request);

        $this->assertResponseStatus($response, 200);

        return UploadImageResponse::denormalize(
            Json::decode($response->getBody()->__toString())
        );
    }

    /**
     * @param AbstractQRCode $QRCode
     * @param string $url
     * @return StreamInterface
     * @throws QRCodeMonkeyApiClientException
     */
    private function createQRCode(AbstractQRCode $QRCode, string $url): StreamInterface
    {
        $response = $this->sendRequest($this->createJsonRequest($url, $QRCode->normalize()));
        $this->assertResponseStatus($response, 200);

        return $response->getBody();
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws QRCodeMonkeyApiClientException
     */
    private function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->httpClient->sendRequest($request);
        } catch (\Exception $e) {
            throw new QRCodeMonkeyApiClientException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $url
     * @param array $body
     * @return RequestInterface
     * @throws JsonException
     */
    private function createJsonRequest(string $url, array $body): RequestInterface
    {
        $request = $this->requestFactory->createRequest('POST', $url);
        $request = $request->withHeader('Content-Type', 'application/json');
        $request = $request->withBody($this->streamFactory->createStream(Json::encode($body)));

        return $request;
    }

    /**
     * @param ResponseInterface $response
     * @param int $expectedStatusCode
     * @throws ResponseException
     */
    private function assertResponseStatus(ResponseInterface $response, int $expectedStatusCode)
    {
        if ($response->getStatusCode() !== $expectedStatusCode) {
            throw ResponseException::create($response);
        }
    }
}
