<?php

namespace ShockedPlot7560\SncfApi\client;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HttpGateway{
    public function __construct(
        private ClientInterface $httpClient
    ) {
    }

    public function get(string $url, array $params = []): ResponseInterface {
        return $this->httpClient->sendRequest($this->createRequest($url, $params));
    }

    private function createRequest(string $url, array $params = []): RequestInterface {
        return new Request('GET', $url . '?' . $this->paramsToQuery($params));
    }

    private function paramsToQuery(array $params): string {
        return http_build_query($params);
    }
}