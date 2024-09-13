<?php

namespace ShockedPlot7560\SncfApi\response;

use ShockedPlot7560\SncfApi\objects\FeedPublisher;
use ShockedPlot7560\SncfApi\objects\Place;

final class PlacesResponse {
	/**
	 * @param FeedPublisher[] $feedPublisher
	 * @param Place[] $places
	 */
	private function __construct(
		public readonly array $feedPublisher,
		public readonly array $places
	) {
	}

	public static function fromArray(array $data) : self {
		$places = [];
		foreach ($data["places"] as $place) {
			$places[] = Place::fromArray($place);
		}
		$feedPublisher = [];
		foreach ($data["feed_publishers"] as $publisher) {
			$feedPublisher[] = FeedPublisher::fromArray($publisher);
		}

		return new self($feedPublisher, $places);
	}
}
