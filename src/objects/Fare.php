<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Fare {
	/**
	 * @param mixed[] $links
	 */
	private function __construct(
		public bool $found,
		public Total $total,
		public array $links
	) {
	}

	public static function fromArray(array $data) : self {
		$total = Total::fromArray($data['total']);

		return new self(
			$data['found'],
			$total,
			$data['links'] ?? []
		);
	}
}
