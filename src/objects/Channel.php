<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Channel
{
    /**
     * @param string[] $types
     */
    private function __construct(
        public readonly string $contentType,
        public readonly string $id,
        public readonly string $name,
        public readonly array $types
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['content_type'],
            $data['id'],
            $data['name'],
            $data['types']
        );
    }
}