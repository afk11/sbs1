<?php

require __DIR__ . "/../vendor/autoload.php";

use Afk11\Sbs1\Helper;
use Afk11\Sbs1\LineReader;
use Afk11\Sbs1\MessageType\MessageTypeRegistryFactory;
use Afk11\Sbs1\TransmissionType\TransmissionTypeRegistryFactory;

$input = "MSG,3,111,11111,484F2E,111111,2018/05/21,13:07:28.754,2018/05/21,13:07:28.692,,1700,,,52.36522,4.76658,,,,,,0";

$lineReader = new LineReader(
    (new MessageTypeRegistryFactory())->create(),
    (new TransmissionTypeRegistryFactory())->create()
);

$line = $lineReader->read($input);

print_r($line);
var_dump(Helper::formatDate($line->getRecordTime()));
