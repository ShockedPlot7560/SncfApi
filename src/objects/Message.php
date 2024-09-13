<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Message {
	private function __construct(
		public readonly string $text,
		public readonly Channel $channel,
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['text'],
			Channel::fromArray($data['channel'])
		);
	}
}
