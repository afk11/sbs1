<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

class LineReader
{
    /**
     * @var MessageTypeRegistry
     */
    private $messageTypeRegistry;

    /**
     * @var TransmissionTypeRegistry
     */
    private $transmissionTypeRegistry;

    /**
     * LineReader constructor.
     * @param MessageTypeRegistry $messageTypeRegistry
     * @param TransmissionTypeRegistry $transmissionTypeRegistry
     */
    public function __construct(
        MessageTypeRegistry $messageTypeRegistry,
        TransmissionTypeRegistry $transmissionTypeRegistry
    ) {
        $this->messageTypeRegistry = $messageTypeRegistry;
        $this->transmissionTypeRegistry = $transmissionTypeRegistry;
    }

    public function read(string $line): BasestationLine
    {
        $mutableLine = new MutableBasestationLine();
        $elements = explode(",", $line);
        if ($elements[0] !== "") {
            $mutableLine->setMessageTypeFromString($this->messageTypeRegistry, strtoupper($elements[0]));
        }
        if ($elements[1] !== "") {
            $mutableLine->setTransmissionType($this->transmissionTypeRegistry, (int) $elements[1]);
        }
        if ($elements[2] !== "" && $elements[2] !== "111") {
            $mutableLine->setSessionId((int) $elements[2]);
        }
        if ($elements[3] !== "" && $elements[3] !== "11111") {
            $mutableLine->setAircraftId((int)$elements[3]);
        }
        if ($elements[4] !== "") {
            $mutableLine->setHexIdent(strtoupper($elements[4]));
        }
        if ($elements[5] && $elements[5] !== "111111") {
            $mutableLine->setFlightId(strtoupper($elements[5]));
        }
        if (strlen($elements[6]) > 0 && $elements[7] !== "") {
            $mutableLine->setGenerationTime($elements[6], $elements[7]);
        }
        if (strlen($elements[8]) > 0 && $elements[9] !== "") {
            $mutableLine->setRecordTime($elements[8], $elements[9]);
        }
        if (count($elements) > 10 && $elements[10] !== "") {
            $mutableLine->setCallsign($elements[10]);
        }

        if ($mutableLine->getMessageType() && $mutableLine->getMessageType()->getId() === MessageType::MSG) {
            if ($elements[11] !== "") {
                $mutableLine->setAltitude((int) $elements[11]);
            }

            if (($transmissionType = $mutableLine->getTransmissionType()) && $transmissionType->getValue() === TransmissionType::DF16 && count($elements) === 21) {
                if ($elements[20]) {
                    $mutableLine->setOnGround(Helper::parseBool($elements[20]));
                }
                return $mutableLine->immutable();
            }

            if ($elements[12] !== "") {
                $mutableLine->setGroundSpeed((float) $elements[12]);
            }

            if ($elements[13] !== "") {
                $mutableLine->setTrack((float) $elements[13]);
            }

            if ($elements[14] !== "") {
                $mutableLine->setLatitude((float) $elements[14]);
            }

            if ($elements[15] !== "") {
                $mutableLine->setLongitude(((float) $elements[15]));
            }

            if ($elements[16] !== "") {
                $mutableLine->setVerticalRate((int) $elements[16]);
            }

            if ($elements[17] !== "") {
                $mutableLine->setSquawk((int) $elements[17]);
            }

            if ($elements[18] !== "") {
                $mutableLine->setSquawkAlert(Helper::parseBool($elements[18]));
            }

            if ($elements[19] !== "") {
                $mutableLine->setEmergency(Helper::parseBool($elements[19]));
            }

            if ($elements[20] !== "") {
                $mutableLine->setSPI(Helper::parseBool($elements[20]));
            }

            if ($elements[21] !== "") {
                $mutableLine->setOnGround(Helper::parseBool($elements[21]));
            }
        }

        return $mutableLine->immutable();
    }
}
