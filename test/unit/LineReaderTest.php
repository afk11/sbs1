<?php

declare(strict_types=1);

namespace Afk11\Test\Sbs1;

use Afk11\Sbs1\LineReader;
use Afk11\Sbs1\MessageType\MessageTypeRegistryFactory;
use Afk11\Sbs1\TransmissionType\TransmissionTypeRegistryFactory;

class LineReaderTest extends TestCase
{
    public function testShouldAcceptNegativeOneAsFalse()
    {
        // this line requires that -1 be treated as false in when parsing a boolean value
        $line = "MSG,6,1,1,4848F2,1,2018/05/21,18:08:55.093,2018/05/21,18:08:55.136,,,,,,,,1040,-1,0,0,";
        $lineReader = new LineReader(
            (new MessageTypeRegistryFactory())->create(),
            (new TransmissionTypeRegistryFactory())->create()
        );
        $msg = $lineReader->read($line);
        $this->assertFalse($msg->getSquawkAlert());
    }
}
