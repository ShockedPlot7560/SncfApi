<?php

namespace ShockedPlot7560\SncfApi\objects;

final class DisplayInformations
{
    /**
     * @param DisplayInformationsLink[] $links
     * @param mixed[] $equipments
     */
    private function __construct(
        public readonly string $commercialMode,
        public readonly string $network,
        public readonly string $direction,
        public readonly string $label,
        public readonly string $color,
        public readonly string $code,
        public readonly string $name,
        public readonly array $links,
        public readonly string $textColor,
        public readonly string $description,
        public readonly string $physicalMode,
        public readonly array $equipments,
        public readonly string $headsign,
        public readonly string $tripShortName
    ){}

    public static function fromArray(array $data): self
    {
        $links = array_map(fn(array $link) => DisplayInformationsLink::fromArray($link), $data['links'] ?? []);
        $equipments = array_map(fn(array $equipment) => $equipment, $data['equipments'] ?? []);
        return new self(
            $data['commercial_mode'],
            $data['network'],
            $data['direction'],
            $data['label'],
            $data['color'],
            $data['code'],
            $data['name'],
            $links,
            $data['text_color'],
            $data['description'],
            $data['physical_mode'],
            $equipments,
            $data['headsign'],
            $data['trip_short_name']
        );
    }
}