<?php

declare(strict_types=1);

namespace Afk11\Test\Sbs1;

use Afk11\Sbs1\Helper;

class HelperTest extends TestCase
{
    public function getConsistentTimeFixtures()
    {
        return [
            ["2018/05/21", "13:05:28.692"],
        ];
    }

    /**
     * @dataProvider getConsistentTimeFixtures
     * @param string $datePart
     * @param string $timePart
     */
    public function testTimeHandlingIsConsistent(string $datePart, string $timePart)
    {
        $dt = Helper::decodeTimeSegments($datePart, $timePart);
        $this->assertEquals("$datePart $timePart", $dt->format("Y/m/d H:m:s.v"));
        $this->assertEquals($datePart, Helper::formatDate($dt));
        $this->assertEquals($timePart, Helper::formatTime($dt));
    }

    /**
     * @return array
     */
    public function getParseBoolFixtures(): array
    {
        return [
            ['-1', true],
            ['0', false],
        ];
    }

    /**
     * @param string $input
     * @param bool $expectedValue
     * @dataProvider getParseBoolFixtures
     */
    public function testParseBoolFixtures(string $input, bool $expectedValue)
    {
        $this->assertEquals($expectedValue, Helper::parseBool($input));
    }
}
