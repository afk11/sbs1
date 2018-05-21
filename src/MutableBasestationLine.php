<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

use Afk11\Sbs1\Exception\ValidationError;

class MutableBasestationLine extends BasestationLine
{
    public function setMessageTypeFromString(MessageTypeRegistry $messageTypeRegistry, string $messageType)
    {
        if (!$messageTypeRegistry->isKnownType($messageType)) {
            throw new ValidationError("Invalid message type ({$messageType})");
        }
        $this->messageType = $messageTypeRegistry->getType($messageType);
    }
    public function setTransmissionType(TransmissionTypeRegistry $transmissionTypeRegistry, int $transmissionType)
    {
        if (!$transmissionTypeRegistry->isKnownType($transmissionType)) {
            throw new ValidationError("Invalid transmission type ({$transmissionType})");
        }
        $this->transmissionType = $transmissionTypeRegistry->getType($transmissionType);
    }
    public function setSessionId(int $sessionId)
    {
        $this->sessionId = $sessionId;
    }
    public function setAircraftId(int $aircraftId)
    {
        $this->aircraftId = $aircraftId;
    }
    public function setHexIdent(string $hexIdent)
    {
        $this->hexIdent = $hexIdent;
    }
    public function setFlightId(string $flightId)
    {
        $this->flightId = $flightId;
    }
    public function withGenerationTime(\DateTimeImmutable $genTime)
    {
        $this->generationTime = $genTime;
    }
    public function withRecordTime(\DateTimeImmutable $recordTime)
    {
        $this->recordTime = $recordTime;
    }
    public function setGenerationTime($datePart, $timePart)
    {
        $this->withGenerationTime(\DateTimeImmutable::createFromMutable(Helper::decodeTimeSegments($datePart, $timePart)));
    }
    public function setRecordTime($datePart, $timePart)
    {
        $this->withRecordTime(\DateTimeImmutable::createFromMutable(Helper::decodeTimeSegments($datePart, $timePart)));
    }
    public function setCallsign(string $callsign)
    {
        $this->callsign = $callsign;
    }
    public function setAltitude(int $altitude)
    {
        $this->altitude = $altitude;
    }

    public function setGroundSpeed(float $groundSpeed)
    {
        $this->groundSpeed = $groundSpeed;
    }
    public function setTrack(float $track)
    {
        $this->track = $track;
    }
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }
    public function setVerticalRate(float $verticalRate)
    {
        $this->verticalRate = $verticalRate;
    }
    public function setSquawk(int $squawk)
    {
        $this->squawk = $squawk;
    }
    public function setSquawkAlert(bool $squawkAlert)
    {
        $this->squawkAlert = $squawkAlert;
    }
    public function setOnGround(bool $onGround)
    {
        $this->onGround = $onGround;
    }
    public function setSPI(bool $spi)
    {
        $this->spi = $spi;
    }
    public function setEmergency(bool $emergency)
    {
        $this->emergency = $emergency;
    }
    public function immutable(): ImmutableBaseStationLine
    {
        $immutable = new ImmutableBaseStationLine();
        $immutable->messageType = $this->messageType;
        $immutable->transmissionType = $this->transmissionType;
        $immutable->sessionId = $this->sessionId;
        $immutable->aircraftId = $this->aircraftId;
        $immutable->hexIdent = $this->hexIdent;
        $immutable->flightId = $this->flightId;
        $immutable->generationTime = $this->generationTime;
        $immutable->recordTime = $this->recordTime;
        $immutable->callsign = $this->callsign;
        $immutable->altitude = $this->altitude;
        $immutable->groundSpeed = $this->groundSpeed;
        $immutable->track = $this->track;
        $immutable->latitude = $this->latitude;
        $immutable->longitude = $this->longitude;
        $immutable->verticalRate = $this->verticalRate;
        $immutable->squawk = $this->squawk;
        $immutable->squawkAlert = $this->squawkAlert;
        $immutable->onGround = $this->onGround;
        $immutable->spi = $this->spi;
        $immutable->emergency = $this->emergency;
        return $immutable;
    }
    public static function fromImmutable(ImmutableBaseStationLine $immutable): MutableBasestationLine
    {
        $mutable = new MutableBasestationLine();
        $mutable->messageType = $immutable->messageType;
        $mutable->transmissionType = $immutable->transmissionType;
        $mutable->sessionId = $immutable->sessionId;
        $mutable->aircraftId = $immutable->aircraftId;
        $mutable->hexIdent = $immutable->hexIdent;
        $mutable->flightId = $immutable->flightId;
        $mutable->generationTime = $immutable->generationTime;
        $mutable->recordTime = $immutable->recordTime;
        $mutable->callsign = $immutable->callsign;
        $mutable->altitude = $immutable->altitude;
        $mutable->groundSpeed = $immutable->groundSpeed;
        $mutable->track = $immutable->track;
        $mutable->latitude = $immutable->latitude;
        $mutable->longitude = $immutable->longitude;
        $mutable->verticalRate = $immutable->verticalRate;
        $mutable->squawk = $immutable->squawk;
        $mutable->squawkAlert = $immutable->squawkAlert;
        $mutable->onGround = $immutable->onGround;
        $mutable->spi = $immutable->spi;
        $mutable->emergency = $immutable->emergency;
        return $mutable;
    }
}
