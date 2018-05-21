<?php

declare(strict_types=1);

namespace Afk11\Sbs1\TransmissionType;

use Afk11\Sbs1\TransmissionType\TransmissionType;

class TransmissionTypeRegistry
{
    /**
     * @var TransmissionType[]
     */
    private $mapById = [];

    public function __construct(TransmissionType ...$transmissionTypes)
    {
        foreach ($transmissionTypes as $transmissionType) {
            $this->mapById[$transmissionType->getValue()] = $transmissionType;
        }
    }

    public function isKnownType(int $value): bool
    {
        return array_key_exists($value, $this->mapById);
    }

    public function getKnownTypes(): array
    {
        return array_keys($this->mapById);
    }

    public function getTypes(): array
    {
        return $this->mapById;
    }

    public function getType(int $value): TransmissionType
    {
        if (!array_key_exists($value, $this->mapById)) {
            throw new \InvalidArgumentException("Unknown transmission type");
        }
        return $this->mapById[$value];
    }
}
