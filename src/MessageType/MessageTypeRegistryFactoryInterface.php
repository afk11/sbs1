<?php

declare(strict_types=1);

namespace Afk11\Sbs1\MessageType;

interface MessageTypeRegistryFactoryInterface
{
    /**
     * Creates a MessageTypeRegistry.
     *
     * @return MessageTypeRegistry
     */
    public function create(): MessageTypeRegistry;
}
