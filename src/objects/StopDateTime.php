<?php

namespace ShockedPlot7560\SncfApi\objects;

final class StopDateTime {
	/**
	 * @param mixed[] $additionalInformations
	 * @param mixed[] $links
	 */
	private function __construct(
		public readonly string $departureDateTime,
		public readonly string $baseDepartureDateTime,
		public readonly string $arrivalDateTime,
		public readonly string $baseArrivalDateTime,
		public readonly StopPoint $stopPoint,
		public readonly array $additionalInformations,
		public readonly array $links
	) {
	}

	public static function fromArray(array $data) : self {
		$stopPoint = StopPoint::fromArray($data['stop_point']);
		$additionalInformations = $data['additional_informations'] ?? [];
		$links = $data['links'] ?? [];

		return new self(
			$data['departure_date_time'],
			$data['base_departure_date_time'],
			$data['arrival_date_time'],
			$data['base_arrival_date_time'],
			$stopPoint,
			$additionalInformations,
			$links
		);
	}
}
