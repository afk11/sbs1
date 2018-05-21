<?php

declare(strict_types=1);

namespace Afk11\Sbs1\MessageType;

class MessageTypeRegistry
{
    /**
     * @var MessageType[]
     */
    private $mapById = [];

    public function __construct(MessageType ...$messageTypes)
    {
        foreach ($messageTypes as $messageType) {
            $this->mapById[$messageType->getId()] = $messageType;
        }
    }

    public function isKnownType(string $id): bool
    {
        return array_key_exists($id, $this->mapById);
    }

    public function getKnownTypes(): array
    {
        return array_keys($this->mapById);
    }

    public function getTypes(): array
    {
        return $this->mapById;
    }

    public function getType(string $id): MessageType
    {
        if (!array_key_exists($id, $this->mapById)) {
            throw new \InvalidArgumentException("Unknown message type");
        }
        return $this->mapById[$id];
    }
}
