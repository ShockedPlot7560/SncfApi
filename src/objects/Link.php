<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Link {
	private function __construct(
		public readonly string $href,
		public readonly string $rel,
		public readonly string $type,
		public readonly bool $templated
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['href'],
			$data['rel'],
			$data['type'],
			$data['templated']
		);
	}
}
