<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

/**
 * Message subtype 1-8. Only used for transmission messages (MSG)
 */
class TransmissionType
{
    const DF17_BSD_0_8 = 1;
    const DF17_BSD_0_6 = 2;
    const DF17_BSD_0_5 = 3;
    const DF17_BSD_0_9 = 4;
    const DF4_DF20 = 5;
    const DF5_DF21 = 6;
    const DF16 = 7;
    const DF11 = 8;

    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $spec;

    /**
     * @var string
     */
    private $description;

    public function __construct(int $value, string $spec, string $description)
    {
        $this->value = $value;
        $this->spec = $spec;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getSpec(): string
    {
        return $this->spec;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
