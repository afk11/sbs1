<?php

declare(strict_types=1);

namespace Afk11\Sbs1\Message;

use Afk11\Sbs1\MessageType\MessageType;
use Afk11\Sbs1\TransmissionType\TransmissionType;

abstract class Message
{
    /**
     * @var MessageType
     */
    protected $messageType;

    /**
     * @var TransmissionType|null
     */
    protected $transmissionType;

    /**
     * @var int
     */
    protected $sessionId;

    /**
     * @var int
     */
    protected $aircraftId;

    /**
     * @var string
     */
    protected $hexIdent;

    /**
     * @var string
     */
    protected $flightId;

    /**
     * @var \DateTimeImmutable
     */
    protected $generationTime;

    /**
     * @var \DateTimeImmutable
     */
    protected $recordTime;

    /**
     * An eight digit flight ID - can be flight number or registration (or even nothing).
     *
     * @var string|null
     */
    protected $callsign;

    /**
     * Mode C altitude. Height relative to 1013.2mb (Flight Level). Not height AMSL..
     *
     * @var int|null
     */
    protected $altitude;

    /**
     * Speed over ground (not indicated airspeed)
     *
     * @var float|null
     */
    protected $groundSpeed;

    /**
     * Track of aircraft (not heading). Derived from the velocity E/W and velocity N/S
     *
     * @var float|null
     */
    protected $track;

    /**
     * North and East positive. South and West negative.
     *
     * @var float|null
     */
    protected $latitude;

    /**
     * North and East positive. South and West negative.
     *
     * @var float|null
     */
    protected $longitude;

    /**
     * 64ft resolution
     *
     * @var int|null
     */
    protected $verticalRate;

    /**
     * Assigned Mode A squawk code.
     *
     * @var string|null
     */
    protected $squawk;

    /**
     * Flag to indicate squawk has changed.
     *
     * @var bool|null
     */
    protected $squawkAlert;

    /**
     * Flag to indicate emergency code has been set
     *
     * @var bool|null
     */
    protected $emergency;

    /**
     * Flag to indicate transponder Ident has been activated.
     *
     * @var bool|null
     */
    protected $spi;

    /**
     * Flag to indicate ground squat switch is active
     *
     * @var bool|null
     */
    protected $onGround;

    /**
     * @return MessageType
     */
    public function getMessageType(): MessageType
    {
        return $this->messageType;
    }

    /**
     * @return TransmissionType|null
     */
    public function getTransmissionType()
    {
        return $this->transmissionType;
    }

    /**
     * @return int
     */
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /**
     * @return int
     */
    public function getAircraftId(): int
    {
        return $this->aircraftId;
    }

    /**
     * can be null in CLK message
     * @return string|null
     */
    public function getHexIdent()
    {
        return $this->hexIdent;
    }

    /**
     * @return string
     */
    public function getFlightId(): string
    {
        return $this->flightId;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getGenerationTime(): \DateTimeImmutable
    {
        return $this->generationTime;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getRecordTime(): \DateTimeImmutable
    {
        return $this->recordTime;
    }

    /**
     * @return null|string
     */
    public function getCallsign()
    {
        return $this->callsign;
    }

    /**
     * @return int|null
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * @return float|null
     */
    public function getGroundSpeed()
    {
        return $this->groundSpeed;
    }

    /**
     * @return float|null
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return int|null
     */
    public function getVerticalRate()
    {
        return $this->verticalRate;
    }

    /**
     * @return null|string
     */
    public function getSquawk()
    {
        return $this->squawk;
    }

    /**
     * @return bool|null
     */
    public function isSquawkAlert()
    {
        return $this->squawkAlert;
    }

    /**
     * @return bool|null
     */
    public function isEmergency()
    {
        return $this->emergency;
    }

    /**
     * @return bool|null
     */
    public function isSPI()
    {
        return $this->spi;
    }

    /**
     * @return bool|null
     */
    public function isOnGround()
    {
        return $this->onGround;
    }
}
