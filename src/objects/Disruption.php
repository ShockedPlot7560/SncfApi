<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Disruption
{
    /**
     * @param ApplicationPeriod[] $applicationPeriods
     * @param Message[] $messages
     * @param ImpactedObject[] $impactedObjects
     */
    private function __construct(
        public readonly string $id,
        public readonly string $disruptionId,
        public readonly string $impactId,
        public readonly array $applicationPeriods,
        public readonly string $status,
        public readonly string $updatedAt,
        public readonly string $cause,
        public readonly Severity $severity,
        public readonly array $messages,
        public readonly array $impactedObjects,
        public readonly string $uri,
        public readonly string $disruptionUri,
        public readonly string $contributor
    ) {}

    public static function fromArray(array $data): self
    {
        $applicationPeriods = array_map(
            fn(array $applicationPeriod) => ApplicationPeriod::fromArray($applicationPeriod),
            $data['application_periods']
        );
        $messages = array_map(
            fn(array $message) => Message::fromArray($message),
            $data['messages']
        );
        $impactedObjects = array_map(
            fn(array $impactedObject) => ImpactedObject::fromArray($impactedObject),
            $data['impacted_objects']
        );
        return new self(
            $data['id'],
            $data['disruption_id'],
            $data['impact_id'],
            $applicationPeriods,
            $data['status'],
            $data['updated_at'],
            $data['cause'],
            Severity::fromArray($data['severity']),
            $messages,
            $impactedObjects,
            $data['uri'],
            $data['disruption_uri'],
            $data['contributor']
        );
    }
}