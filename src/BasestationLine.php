<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

abstract class BasestationLine
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
     * @var int
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
     * @var string|null
     */
    protected $callsign;

    /**
     * @var int|null
     */
    protected $altitude;

    /**
     * @var float|null
     */
    protected $groundSpeed;

    /**
     * @var float|null
     */
    protected $track;

    /**
     * @var float|null
     */
    protected $latitude;

    /**
     * @var float|null
     */
    protected $longitude;

    /**
     * @var int|null
     */
    protected $verticalRate;

    /**
     * @var string|null
     */
    protected $squawk;

    /**
     * @var bool|null
     */
    protected $squawkAlert;

    /**
     * @var bool|null
     */
    protected $emergency;

    /**
     * @var bool|null
     */
    protected $spi;

    /**
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
     * @return string
     */
    public function getHexIdent(): string
    {
        return $this->hexIdent;
    }

    /**
     * @return int
     */
    public function getFlightId(): int
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
    public function getSquawkAlert()
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
