<?php

namespace ShockedPlot7560\SncfApi\objects;

class ImpactedObject
{
    /**
     * @param ImpactedStop[] $impactedStops
     */
    private function __construct(
        public PtObject $ptObject,
        public array $impactedStops
    ) {}

    public static function fromArray(array $data): self
    {
        $impactedStops = [];
        foreach ($data['impacted_stops'] as $impactedStop) {
            $impactedStops[] = ImpactedStop::fromArray($impactedStop);
        }
        return new self(
            PtObject::fromArray($data['pt_object']),
            $impactedStops
        );
    }
}