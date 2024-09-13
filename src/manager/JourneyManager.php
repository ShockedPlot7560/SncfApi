<?php

namespace ShockedPlot7560\SncfApi\manager;

use Psr\SimpleCache\CacheInterface;
use ShockedPlot7560\SncfApi\client\HttpGateway;
use ShockedPlot7560\SncfApi\response\JourneyResponse;

class JourneyManager {
    public function __construct(
        private HttpGateway $httpGateway,
        private CacheInterface $cache
    ){ }

    public function get(string $from, string $to, ?\DateTime $date = null): JourneyResponse{
        $params = [
            "from" => $from,
            "to" => $to,
            "date" => $date ? $date->format("Y-m-dTH:i:s") : null
        ];
        $value = $this->cache->get($this->cacheKey($params));
        if($value !== null){
            return $value;
        }

        $response = $this->httpGateway->get("journeys", $params);

        if($response->getStatusCode() !== 200){
            throw new \Exception("Error while fetching places");
        }

        $ret = json_decode($response->getBody()->getContents(), true);
        if(!is_array($ret)){
            throw new \Exception("Invalid response");
        }

        $ret = JourneyResponse::fromArray($ret);

        $this->cache->set($this->cacheKey($params), $ret, 3600);

        return $ret;
    }

    private function cacheKey(array $params): string {
        return "journey_" . md5(serialize($params));
    }
}