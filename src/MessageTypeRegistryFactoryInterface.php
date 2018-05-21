<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

interface MessageTypeRegistryFactoryInterface
{
    public function create(): MessageTypeRegistry;
}
