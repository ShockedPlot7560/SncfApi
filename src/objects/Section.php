<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Section {
	/**
	 * @param SectionLink[] $links
	 * @param StopDateTime[] $stopDateTime
	 * @param mixed[] $additionnalInformations
	 */
	private function __construct(
		public readonly string $id,
		public readonly float $duration,
		public readonly Co2Emission $co2Emission,
		public readonly string $departureDateTime,
		public readonly string $arrivalDateTime,
		public readonly From $to,
		public readonly From $from,
		public readonly GeoJson $geojson,
		public readonly ?string $mode,
		public readonly string $type,
		public readonly array $links,
		public readonly ?string $baseDepartureDateTime,
		public readonly ?string $baseArrivalDateTime,
		public readonly ?string $dataFreshness,
		public readonly array $additionnalInformations,
		public readonly ?DisplayInformations $displayInformations,
		public readonly array $stopDateTime,
	) {
	}

	public static function fromArray(array $data) : self {
		$links = array_map(fn (array $link) => SectionLink::fromArray($link), $data['links'] ?? []);
		$stopDateTime = array_map(fn (array $stopDateTime) => StopDateTime::fromArray($stopDateTime), $data['stop_date_times'] ?? []);

		return new self(
			$data['id'],
			$data['duration'],
			Co2Emission::fromArray($data['co2_emission']),
			$data['departure_date_time'],
			$data['arrival_date_time'],
			From::fromArray($data['to']),
			From::fromArray($data['from']),
			GeoJson::fromArray($data['geojson']),
			$data['mode'] ?? null,
			$data['type'],
			$links,
			$data['base_departure_date_time'] ?? null,
			$data['base_arrival_date_time'] ?? null,
			$data['data_freshness'] ?? null,
			$data['additionnal_informations'] ?? [],
			isset($data['display_informations']) ? DisplayInformations::fromArray($data['display_informations']) : null,
			$stopDateTime
		);
	}
}
