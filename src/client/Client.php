<?php

namespace ShockedPlot7560\SncfApi\client;

use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\Psr16CacheStorage;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;
use Phpfastcache\Helper\Psr16Adapter;
use Psr\Http\Client\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use ShockedPlot7560\SncfApi\manager\JourneyManager;
use ShockedPlot7560\SncfApi\manager\PlacesManager;

class Client {
	private HttpGateway $httpGateway;
	private CacheInterface $cache;

	public function __construct(
		private string $token
	) {
		$this->cache = new Psr16Adapter("Files");
		$this->httpGateway = new HttpGateway($this->createClient($token));
	}

	public function journey() : JourneyManager {
		return new JourneyManager($this->httpGateway, $this->cache);
	}

	public function places() : PlacesManager {
		return new PlacesManager($this->httpGateway, $this->cache);
	}

	private function createClient(string $token) : ClientInterface {
		$stack = HandlerStack::create();
		$stack->push(new CacheMiddleware(
			new PrivateCacheStrategy(
				new Psr16CacheStorage($this->cache)
			)
		), 'cache');

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://api.sncf.com/v1/coverage/sncf/',
			'headers' => [
				'Authorization' => $token
			],
			'handler' => $stack
		]);

		return $client;
	}
}
