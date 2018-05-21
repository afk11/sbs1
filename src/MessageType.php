<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

/**
 * The message type: MSG, STA, ID, AIR, SEL or CLK. Usually only messages of type MSG (transmission messages)
 * are of interest. Most softwares (e.g. :program:`dump1090`) do not even support any other message types.
 */
class MessageType
{
    const SEL = 'SEL';
    const ID = 'ID';
    const AIR = 'AIR';
    const STA = 'STA';
    const CLK = 'CLK';
    const MSG = 'MSG';

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description;

    public function __construct(string $id, string $type, string $description)
    {
        $this->id = $id;
        $this->type = $type;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
