<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Terminus
{
    /**
     * @param Code[] $codes
     * @param mixed[] $links
     * @param AdministrativeRegion[] $administrativeRegions
     * @param mixed[] $equipments
     */
    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $codes,
        public readonly ?string $timezone,
        public readonly string $label,
        public readonly Coord $coord,
        public readonly array $links,
        public readonly array $administrativeRegions,
        public readonly ?Terminus $stopArea,
        public readonly array $equipments,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            array_map(fn(array $code) => Code::fromArray($code), $data['codes']),
            $data['timezone'] ?? null,
            $data['label'],
            Coord::fromArray($data['coord']),
            $data['links'] ?? [],
            array_map(fn(array $administrativeRegion) => AdministrativeRegion::fromArray($administrativeRegion), $data['administrative_regions'] ?? []),
            isset($data['stop_area']) ? self::fromArray($data['stop_area']) : null,
            $data['equipments'] ?? [],
        );
    }
}