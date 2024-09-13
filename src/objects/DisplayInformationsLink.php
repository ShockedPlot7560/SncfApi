<?php

namespace ShockedPlot7560\SncfApi\objects;

final class DisplayInformationsLink
{
    private function __construct(
        public readonly bool $templated,
        public readonly Rel $rel,
        public readonly bool $internal,
        public readonly string $type,
        public readonly string $id
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['templated'],
            Rel::from($data['rel']),
            $data['internal'],
            $data['type'],
            $data['id']
        );
    }
}