<?php

namespace ShockedPlot7560\SncfApi\manager;

use Psr\SimpleCache\CacheInterface;
use ShockedPlot7560\SncfApi\client\HttpGateway;
use ShockedPlot7560\SncfApi\objects\EmbeddedType;
use ShockedPlot7560\SncfApi\response\PlacesResponse;

class PlacesManager {
    public function __construct(
        private HttpGateway $httpGateway,
        private CacheInterface $cache
    ){ }

    public function get(string $q, EmbeddedType $embeddedType = null): PlacesResponse {
        $params = [
            "q" => $q
        ];
        if($embeddedType !== null){
            $params["type[]"] = $embeddedType->value;
        }

        $value = $this->cache->get($this->cacheKey($params));
        if($value !== null){
            return $value;
        }
        $response = $this->httpGateway->get("places", $params);

        if($response->getStatusCode() !== 200){
            throw new \Exception("Error while fetching places");
        }

        $ret = json_decode($response->getBody()->getContents(), true);

        if(!is_array($ret) || !array_key_exists("places", $ret)){
            throw new \Exception("Invalid response");
        }

        $ret = PlacesResponse::fromArray($ret);

        $this->cache->set($this->cacheKey($params), $ret, 3600);

        return $ret;
    }

    private function cacheKey(array $params): string {
        return "places_" . md5(serialize($params));
    }
}