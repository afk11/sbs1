<?php

declare(strict_types=1);

namespace Afk11\Sbs1\TransmissionType;

use Afk11\Sbs1\TransmissionType\TransmissionTypeRegistry;

interface TransmissionTypeRegistryFactoryInterface
{
    public function create(): TransmissionTypeRegistry;
}
