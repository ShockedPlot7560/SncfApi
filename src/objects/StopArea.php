<?php

namespace ShockedPlot7560\SncfApi\objects;

final class StopArea{
    /**
     * @param Code[] $codes
     * @param mixed[] $links
     * @param AdministrativeRegion[] $administrativeRegions
     */
    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $codes,
        public readonly string $timezone,
        public readonly string $label,
        public readonly Coord $coord,
        public readonly array $links,
        public readonly array $administrativeRegions,
    ) {}

    public static function fromArray(array $data): StopArea
    {
        return new StopArea(
            $data['id'],
            $data['name'],
            array_map(fn($code) => Code::fromArray($code), $data['codes']),
            $data['timezone'],
            $data['label'],
            Coord::fromArray($data['coord']),
            $data['links'],
            array_map(fn($administrativeRegion) => AdministrativeRegion::fromArray($administrativeRegion), $data['administrative_regions']),
        );
    }
}