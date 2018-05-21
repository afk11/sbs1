<?php

declare(strict_types=1);

namespace Afk11\Sbs1\TransmissionType;

use Afk11\Sbs1\TransmissionType\TransmissionType;
use Afk11\Sbs1\TransmissionType\TransmissionTypeRegistry;
use Afk11\Sbs1\TransmissionType\TransmissionTypeRegistryFactoryInterface;

class TransmissionTypeRegistryFactory implements TransmissionTypeRegistryFactoryInterface
{
    public function createESIdentificationAndCategory(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF17_BSD_0_8, 'DF17 BDS 0,8', 'ES Identification and Category');
    }

    public function createESSurfacePositionMessage(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF17_BSD_0_6, 'DF17 BDS 0,6', 'ES Surface Position Message (Triggered by nose gear squat switch.)');
    }

    public function createESAirbornePositionMessage(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF17_BSD_0_5, 'DF17 BDS 0,5', 'ES Airborne Position Message');
    }

    public function createESAirborneVelocityMessage(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF17_BSD_0_9, 'DF17 BDS 0,9', 'ES Airborne Velocity Message');
    }

    public function createSurveillanceAltMessage(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF4_DF20, 'DF4, DF20', 'Surveillance Alt Message (Triggered by ground radar. Not CRC secured.)');
    }

    public function createSurveillanceIDMessage(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF5_DF21, 'DF5, DF21', 'Surveillance ID Message (Triggered by ground radar. Not CRC secured.)');
    }

    public function createAirToAirMessage(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF16, 'DF16', 'Air To Air Message (Triggered from TCAS)');
    }

    public function createAllCallReply(): TransmissionType
    {
        return new TransmissionType(TransmissionType::DF11, 'DF11', 'All Call Reply (Broadcast but also triggered by ground radar)');
    }

    public function create(): TransmissionTypeRegistry
    {
        return new TransmissionTypeRegistry(
            $this->createESIdentificationAndCategory(),
            $this->createESSurfacePositionMessage(),
            $this->createESAirbornePositionMessage(),
            $this->createESAirborneVelocityMessage(),
            $this->createSurveillanceAltMessage(),
            $this->createSurveillanceIDMessage(),
            $this->createAirToAirMessage(),
            $this->createAllCallReply()
        );
    }
}
