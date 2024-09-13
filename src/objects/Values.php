<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Values {
	private function __construct(
		public readonly float $nox,
		public readonly float $pm
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['nox'],
			$data['pm']
		);
	}
}
